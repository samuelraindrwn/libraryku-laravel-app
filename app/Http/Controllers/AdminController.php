<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Books;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        if(!session()->has('user')){
            return redirect('/login');
        }
        if(session()->get('user')->role !== 'admin'){
            return redirect('/home');
        }
        
        $students = User::where('role', 'student')->count();
        $teachers = User::where('role', 'teacher')->count();
        $users = $students + $teachers;
        $books = Books::count();
        $articles = Article::count();
        $reservations = Reservation::where('status_id', '0')->count();
        return view('Admin.dashboard',compact('users', 'books', 'articles','reservations'));
    }

    public function users (){
        if(!session()->has('user')){
            return redirect('/login');
        }
        if(session()->get('user')->role !== 'admin'){
            return redirect('/home');
        }
        
        $students = User::where('role', 'student')->paginate(5);
        $teachers = User::where('role', 'teacher')->paginate(5);
        $admins = User::where('role', 'admin')->paginate(5);
        return view('Admin.users',compact('admins','students','teachers'));
    }

    public function books (){
        if(!session()->has('user')){
            return redirect('/login');
        }
        if(session()->get('user')->role !== 'admin'){
            return redirect('/home');
        }
        $books = Books::join('categories', 'books.category_id', '=', 'categories.category_id')
        ->select('books.*', 'categories.categoryName as categoryName')
        ->orderBy('book_title', 'asc')
        ->paginate(10);
        
        $categories = Category::all();
        return view('Admin.book',compact('books','categories'));
    }

    public function articles (){
        if(!session()->has('user')){
            return redirect('/login');
        }
        if(session()->get('user')->role !== 'admin'){
            return redirect('/home');
        }
        $articles = Article::join('categories', 'articles.category_id', '=', 'categories.category_id')
        ->select('articles.*', 'categories.categoryName as categoryName')
        ->orderBy('article_title', 'asc')
        ->paginate(10);
        
        $categories = Category::all();
        return view('Admin.article',compact('articles','categories'));
    }
    
    public function reservations (){
        $reservationsINL = Reservation::join('reservation_details', 'reservations.reser_detail_id', '=', 'reservation_details.reser_detail_id')
    ->join('books', 'reservation_details.book_id', '=', 'books.book_id')
    ->select('reservations.*', 'books.book_title', 'reservation_details.*')
    ->where('reservation_details.library_name', '=', 'Indonesia National Library')
    ->paginate(5);

$reservationsBHK = Reservation::join('reservation_details', 'reservations.reser_detail_id', '=', 'reservation_details.reser_detail_id')
    ->join('books', 'reservation_details.book_id', '=', 'books.book_id')
    ->select('reservations.*', 'books.book_title', 'reservation_details.*')
    ->where('reservation_details.library_name', '=', 'Bunda Hati Kudus Senior High School Library')
    ->paginate(5);

$reservationsMBS = Reservation::join('reservation_details', 'reservations.reser_detail_id', '=', 'reservation_details.reser_detail_id')
    ->join('books', 'reservation_details.book_id', '=', 'books.book_id')
    ->select('reservations.*', 'books.book_title', 'reservation_details.*')
    ->where('reservation_details.library_name', '=', 'Mutiara Bangsa Senior High School Library')
    ->paginate(5);

$reservationsTVS = Reservation::join('reservation_details', 'reservations.reser_detail_id', '=', 'reservation_details.reser_detail_id')
    ->join('books', 'reservation_details.book_id', '=', 'books.book_id')
    ->select('reservations.*', 'books.book_title', 'reservation_details.*')
    ->where('reservation_details.library_name', '=', 'Tarsisius Viereta Senior High School Library')
    ->paginate(5);
        return view('Admin.reservation',compact('reservationsINL','reservationsBHK','reservationsMBS','reservationsTVS'));
    }

    public function profile (Request $request){
        $user = $request->session()->get('user');
        return view('Admin.profile',compact('user'));
    }
}