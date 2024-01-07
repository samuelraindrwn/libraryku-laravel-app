<?php

namespace App\Http\Controllers;


use App\Models\Books;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if(!session()->has('user')){
            return redirect('/login');
        }
        $title = 'Home';
        $id = 2;
        $books = Books::limit(8)->get();
        $popularBooks = Books::orderBy('search_count', 'desc')->limit(8)->get();
        $bookschild = Books::where('category_id', $id)->limit(8)->get();
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
        
        return view('User.home', compact('books', 'title','bookschild','inCollection','popularBooks'));
    }

    public function books(Request $request){
        if(!session()->has('user')){
            return redirect('/login');
        }
        $title = 'Books';
        $search = $request->query('search');
        $categoryName = $request->query('category');
        $sort = $request->query('sort', 'asc');
        $categoryId = Category::where('categoryName', $categoryName)->first();
        $query = Books::query();
        if ($search) {
            $query->where('book_title', 'LIKE', "%$search%")
                ->orWhere('author', 'LIKE', "%$search%");
        }
        if ($categoryName) {
            $query->where('category_id', $categoryId->category_id);
        }
        if ($sort === 'Z - A') {
                $query->orderBy('book_title', 'desc');
            } else if($sort === 'Newest'){
                $query->orderBy('release_date', 'desc');
            } else{
                $query->orderBy('book_title', 'asc');
            }
        $books = $query->get();
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
        return view('user.books', compact('books', 'search', 'categories', 'title','inCollection'));
    }   
    
    public function store(Request $request)
    {
        $category = Category::where('categoryName', $request->categoryName)->first();
        $books = new Books([
            'book_id' => $request->book_id,
            'book_title' => $request->book_title,
            'publisher' => $request->publisher,
            'category_id' => $category->category_id,
            'release_date' => $request->release_date,
            'author' => $request->author,
            'page' => $request->page,
            'synopsis' => $request->synopsis,
            'cover' => $request->cover,
            'pdf' => $request->pdf]);
            
            $title = $request->input('book_title');
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = Str::slug($title) . '.' . $cover->getClientOriginalExtension();
            $coverPath = $cover->storeAs('cover', $filename, 'public');
            $books->cover = $coverPath;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $filename = Str::slug($title) . '.' . $pdf->getClientOriginalExtension();
            $pdfPath = $pdf->storeAs('pdfBook', $filename, 'public');
            $books->pdf = $pdfPath;
        }
        $books->save();
        return redirect()->back()->with('success', 'Book Successfully Added.');
    }

    public function update(Request $request){
    $book = Books::find($request->book_id);
    $title = $request->book_title;
    $category = Category::where('categoryName', $request->categoryName)->first();
    $book->book_title = $request->book_title;
    $book->author = $request->author;
    $book->publisher = $request->publisher;
    $book->release_date = $request->release_date;
    $book->page = $request->page;
    $book->category_id = $category->category_id;
    $book->synopsis = $request->synopsis;

    if ($request->hasFile('cover')) {
        Storage::disk('public')->delete($book->cover);
        
        $cover = $request->file('cover');
        $filename = Str::slug($title) . '.' . $cover->getClientOriginalExtension();
        $coverPath = $cover->storeAs('cover', $filename, 'public');
        $book->cover = $coverPath;
        
    }

    if ($request->hasFile('pdf')) {
        Storage::disk('public')->delete($book->pdf);

        $pdf = $request->file('pdf');
        $filename = Str::slug($title) . '.' . $pdf->getClientOriginalExtension();
        $pdfPath = $pdf->storeAs('pdfBook', $filename, 'public');
        $book->pdf = $pdfPath;
    }
    $book->save();
    return redirect()->back()->with('success', 'Book Successfully Updated.');
    }

    public function deleteBook($id){
        $books = Books::find($id);
        Storage::disk('public')->delete($books->cover);
        Storage::disk('public')->delete($books->pdf);
        $books->delete();
        return redirect()->back()->with('success', 'Book Successfully Deleted.');
    }

    public function show(Request $request,$id)
    {
        if(!session()->has('user')){
            return redirect('/login');
        }
        $title = 'Details';
        $user = $request->session()->get('user');
        $userId = $user ? $user->user_id : null;
        $book = Books::findOrFail($id);
        if ($userId) {
            $user = User::findOrFail($userId);
            $inCollection = $user->collections->contains('book_id', $id);
        } else {
            $inCollection = false;
        }
        return view('user.detailBook', compact('title','book', 'inCollection'));
    }
}