<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        if(!session()->has('user')){
            return redirect('/login');
        }
        $title = 'article';
        $search = $request->query('search');
        $categoryName = $request->query('category');
        $sort = $request->query('sort', 'asc');
        $categoryId = Category::where('categoryName', $categoryName)->first();
        $query = Article::query();
        if ($search) {
            $query->where('article_title', 'LIKE', "%$search%")
                ->orWhere('author', 'LIKE', "%$search%");
        }
        if ($categoryId) {
            $query->where('category_id', $categoryId->category_id);
        }
        if ($sort === 'Z - A') {
                $query->orderBy('article_title', 'desc');
            } else if($sort === 'Newest'){
                $query->orderBy('release_date', 'desc');
            } else{
                $query->orderBy('article_title', 'asc');
            }
        $articles = $query->get();
        $categories = Category::all();

        return view('user.article', compact('title','articles', 'search', 'sort', 'categories'));
    }

    public function store(Request $request)
    {
    $category = Category::where('categoryName', $request->categoryName)->first();
    $article_id = str::uuid()->toString();
    $article = new Article([
        'article_id' => $article_id,
        'article_title' => $request->article_title,
        'author' => $request->author,
        'release_date' => $request->release_date,
        'category_id' => $category->category_id,
        'abstract' => $request->abstract,
        'pdf' => $request->pdf,
    ]);
    $title = $request->input('article_title');
    if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $filename = Str::slug($title) . '.' . $pdf->getClientOriginalExtension();
            $pdfPath = $pdf->storeAs('pdfArticle', $filename, 'public');
            $article->pdf = $pdfPath;
        }

    $article->save();
    return redirect()->back()->with('success', 'Journal Successfully Added.');
    }


    public function update(Request $request){
        
    $article = Article::find($request->article_id);
    $title = $request->article_title;
    $category = Category::where('categoryName', $request->categoryName)->first();
    $article->article_title = $title;
    $article->author = $request->author;
    $article->release_date = $request->release_date;
    $article->category_id = $category->category_id;
    $article->abstract = $request->abstract;

    if ($request->hasFile('pdf')) {
        
        Storage::disk('public')->delete($article->pdf);

        $pdf = $request->file('pdf');
        $filename = Str::slug($title) . '.' . $pdf->getClientOriginalExtension();
        $pdfPath = $pdf->storeAs('pdfArticle', $filename, 'public');
        $article->pdf = $pdfPath;
    }
    
    $article->save();
    return redirect()->back()->with('success', 'Journal Successfully Updated.');
    }

    public function deleteArticle($id){
        $articles = Article::find($id);
        Storage::disk('public')->delete($articles->pdf);
        $articles->delete();
        return redirect()->back()->with('success', 'Journal Successfully Deleted.');
    }
}