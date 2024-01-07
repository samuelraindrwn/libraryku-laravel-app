<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ReservationController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/forgot-password', function () {
    return view('auth.forgot-password')->with('title', 'Forgot Password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? redirect()->with('success', __($status))
                : back()->with(['erorr' => [__($status)]]);
})->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token])->with('title', 'Reset Password');
})->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('success', __($status))
                : back()->with(['erorr' => [__($status)]]);
})->name('password.update');

// Index routes
Route::get('/', [AuthController::class, 'index'])->name('index');

// Auth routes
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('create.user');

Route::get('/login', [AuthController::class, 'signin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
// Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('forgot-password');
// Route::post('/reset-password', [AuthController::class, 'reset'])->name('reset-password');

//search routes
Route::get('/search', [UserController::class, 'searchAll'])->name('search');

// home routes
Route::get('/home', [BookController::class, 'index'])->name('home');

//books routes
Route::get('/books', [BookController::class, 'books'])->name('books');
Route::get('/details/{id}', [BookController::class, 'show'])->name('details.id');    
Route::post('/books/create', [BookController::class, 'store'])->name('book.create');
Route::post('/books/update', [BookController::class, 'update'])->name('book.update');
Route::get('/books/delete/{id}', [BookController::class, 'deleteBook'])->name('book.delete');
Route::post('/books/reserve', [ReservationController::class, 'reserve'])->name('reserve.book');

//Collection routes
Route::get('/collection', [CollectionController::class, 'showCollections'])->name('Collection.index');
Route::get('/collection/{bookId}/add', [CollectionController::class, 'addToCollection'])->name('collection.add');
Route::get('/collection/{bookId}/remove', [CollectionController::class, 'removeFromCollection'])->name('collection.remove');

//articles routes
Route::get('/article', [ArticleController::class, 'index'])->name('article');
Route::post('/article/create', [ArticleController::class, 'store'])->name('article.create');
Route::post('/article/update', [ArticleController::class, 'update'])->name('article.update');
Route::get('/article/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('article.delete');

//account routes
Route::get('/account', [UserController::class, 'account'])->name('account');

//Auth account page
Route::post('/account', [AuthController::class, 'changePassword'])->name('changePassword');
Route::post('/account/update', [AuthController::class, 'updateProfile'])->name('updateProfile');

//Admin routes
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/books', [AdminController::class, 'books'])->name('admin.books');
Route::get('/admin/articles', [AdminController::class, 'articles'])->name('admin.articles');
Route::get('/admin/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::post('/admin/reservations/{id}', [ReservationController::class, 'checkStatus'])->name('check.status');