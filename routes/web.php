<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// --- Basic Roating ---

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/welcome', function () {
    return 'Selamat Datang';
});

// Route::get('/about', function () {
//     return 'NIM : 2241720227 <br> Muhammad Irsyad Dany';
// });


// --- Route Parameter ---

// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya ' . $name;
// });

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Route::get('/articles/{id}', function ($Id) {
//     return 'Halaman Artikel dengan ID ' . $Id;
// });


// --- Optional Parameter ---

// Route::get('/user/{name?}', function ($name = null) {
//     return 'Nama saya ' . $name;
// });

// Route::get('/user/{name?}', function ($name = 'John') {
//     return 'Nama saya ' . $name;
// });


// --- Route Name ---

Route::get('/user/profile', function () {
    //
})->name('profile');


// --- Route Group dan Route Prefixed ---

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });


// --- Route Prefixed ---

// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });


// --- Redirect Route ---

Route::redirect('/here', '/there');


// --- View Routes ---

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


// --- Modifikasi Controller Hello ---
Route::get('/hello', [WelcomeController::class, 'hello']);

// --- Contoller page controller ---
// Route::get('/', [PageController::class, 'index']);
// Route::get('/about', [PageController::class, 'about']);
// Route::get('/articles/{id}', [PageController::class, 'articles']);

// --- Contoller home controller ---
Route::get('/', [HomeController::class, 'index']);

// --- Contoller about controller ---
Route::get('/about', [AboutController::class, 'about']);

// --- Contoller articles controller ---
Route::get('/articles/{id}', [ArticlesController::class, 'articles']);


// --- Route Resource Controller ---
Route::resource('photo', PhotoController::class);

Route::resource('photo', PhotoController::class)->only(['index', 'show']);
Route::resource('photo', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);


// --- Route View ---
Route::get('/greeting', function () {
    return view('hello', ['name' => 'Irsyad']);
});

// --- Route View Direktori ---
Route::get('/greeting', function () {
    return view('blog.hello', ['name' => 'Dany']);
});

// --- Route View Controller ---
Route::get('/greeting', [
    WelcomeController::class,
    'greeting'
]);
