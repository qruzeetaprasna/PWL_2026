<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return 'Hello World';
});

Route::get('/world', function(){
    return 'World';
});

Route::get('/welcome', function(){
    return 'Selamat Datang';
});

// Route::get('/about', function(){
//     return 'NIM: 244107020084 Nama: Qruzeeta Prasna';
// });

Route::get('/user/{nama?}', function($nama='jhon'){
    return 'Nama saya '. $nama;
});

Route::get('/post/{post}/comments/{comments}', function($post, $comments){
    return 'Post ke-'. $post. 'komentar ke-'. $comments;
});

Route::get('/article/{id}',function($id){
    return 'Halaman Artikel dengan ID '. $id;
});

//Route Name
// Route::get('/user/profile', function(){

// })->name('profile');

// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');

// //generating urls
// $url = route('profile');

// //generating Redirects
// return redirect()->route('profile');

Route::middleware(['first', 'second'])->group(function(){
    Route::get('/', function(){
        // use first and second middleware
    });

    Route::get('/user/profile', function(){
        // uses second and first middleware
    });
});

Route::domain('{account}.exemple.com')->group(function(){
    Route::get('/user/{id}', function($account, $id){
        //
    });
});

// Route::middleware('auth')->group(function(){
//     Route::get('/user/', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

Route::redirect('/here', '/there');

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

Route:: get('/hello', [WelcomeController::class, 'hello']);

Route:: get('/', [HomeController::class, 'index']);
Route:: get('/about', [AboutController::class, 'about']);

Route:: get('/article', function(){
    //
});

Route::get('/article/{id}', [ArticleController::class, 'article']);

Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only(['index', 'show']);

Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);