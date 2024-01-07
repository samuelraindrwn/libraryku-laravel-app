<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function addToCollection(Request $request, $bookId)
    {
        $user = $request->session()->get('user');
        $userId = $user ? $user->user_id : null;

        if ($userId) {
            $user = User::findOrFail($userId);
            // Tambahkan buku ke koleksi pengguna jika belum ada
            if (!$user->collections()->where('collections.book_id', $bookId)->exists()) {
                $user->collections()->attach($bookId);
            }
        }

        return redirect()->back()->with('success','Book Successfully Added to Collection.');
    }

    public function removeFromCollection(Request $request, $bookId)
    {
        $user = $request->session()->get('user');
        $userId = $user ? $user->user_id : null;

        if ($userId) {
            $user = User::findOrFail($userId);
            // Hapus buku dari koleksi pengguna jika ada
            if ($user->collections()->where('collections.book_id', $bookId)->exists()) {
                $user->collections()->detach($bookId);
            }
        }

        return redirect()->back()->with('success','Book Successfully deleted from Collection.');
    }

    public function showCollections(Request $request)
    {
        if(!session()->has('user')){
            return redirect('/login');
        }
        $title = 'Collections';
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
        
        $user = $request->session()->get('user');
        $userId = $user ? $user->user_id : null;

        if ($userId) {
            $user = User::findOrFail($userId);
            $collections = $user->collections;
        } else {
            $collections = collect(); // Koleksi kosong jika pengguna tidak terautentikasi
        }

        return view('user.collection', compact('collections','title', 'search','categories'));
    }
}