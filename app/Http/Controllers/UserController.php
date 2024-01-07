<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BookCategory;
use App\Models\Books;
use App\Models\Category;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function account (Request $request){
        if(!session()->has('user')){
            return redirect('/login');
        }
        $title = 'Account';
        $user = $request->session()->get('user');
        $true = false;
        if($request->confirm){
            if(!Hash::check($request->password, $user->password)){
                return redirect('account')->with('error','Password is incorrect. Please try again.');
            }
            $true = true;
        }
        $category = Category::all();
        return view('User.account', compact('user', 'title','true','category'));
    }
    
    function searchAll (Request $request){
        if(!session()->has('user')){
            return redirect('/login');
        }
        $title = 'Search';
        $search = $request->query('search');
        $categoryName = $request->query('category');
        $sort = $request->query('sort', 'asc');
        $categoryId = Category::where('categoryName', $categoryName)->first();
        $query = Books::query();
        $query2 = Article::query();
        
        if ($search) {
            $query->where('book_title', 'LIKE', "%$search%")
                ->orWhere('author', 'LIKE', "%$search%");
            $query2->where('article_title', 'LIKE', "%$search%")
                ->orWhere('author', 'LIKE', "%$search%");
        }
        if ($categoryName) {
            $query->where('category_id', $categoryId->category_id);
            $query2->where('category_id', $categoryId->category_id);
        }
        if ($sort === 'Z - A') {
                $query->orderBy('book_title', 'desc');
                $query2->orderBy('article_title', 'desc');
            } else if($sort === 'Newest'){
                $query->orderBy('release_date', 'desc');
                $query2->orderBy('release_date', 'desc');
            } else{
                $query->orderBy('book_title', 'asc');
                $query2->orderBy('article_title', 'asc');
            }
            
        $books = $query->get();
        $articles = $query2->get();
        $categories = Category::all();
        $bookserch = Books::where('book_title', 'LIKE', "%{$search}%")->get();
        foreach ($bookserch as $bookes) {
            $bookes->search_count++;
            $bookes->save();
        }
        $user = $request->session()->get('user');
        $userId = $user ? $user->user_id : null;
        $book = Books::join('collections', 'books.book_id', '=', 'collections.book_id')
        ->where('collections.user_id', $userId)
        ->select('books.*', 'collections.user_id as pivot_user_id', 'collections.book_id as pivot_book_id')
        ->get();
        $inCollection = [];
        
            if ($userId) {
                $user = User::findOrFail($userId);
                $inCollection = $user->collections->pluck('book_id')->toArray();
            }
        return view('user.search', compact('books', 'search', 'sort', 'categories', 'inCollection', 'articles','title'));
    }
}