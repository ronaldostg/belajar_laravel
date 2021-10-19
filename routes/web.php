<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});
// Route::get('/about', function () {return view('about', 
//     array(
//         'name'=>'Ronaldo'
//         ,
//         'email'=>'sitanggang761@gmail.com',
//         'image'=>'image.png'
//     ));
// });
Route::view(
    '/about',
    'about',
    [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Ronaldo',
        'email' => 'sitanggang761@gmail.com',
        'image' => 'image.png'
    ]

);


Route::get('/blogs', [PostController::class, 'index']);


// Route::get('blog/{slug}', [PostController::class, 'show']);

// penamaan variabel di routes({post}) harus sama penamaan untuk method controller yang akan dikirim 
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title'=>'Post Categories',
        'active'=>'categories',
        'categories'=>Category::all()
        
    ]);
});


// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('blogs', [
//         'title'=>'Post By Category : '.$category->name,
//         'active'=>'categories',
//         'posts'=>$category->posts,
//         // 'category'=>$category->name
//     ]);
// });


// Route::get('/authors/{author:username}', function(User $author){
//     return view('blogs',[
//         'title'=>'Post By Author : '.$author->name,
//         'active'=>'blogs',


//         // 'posts'=>$author->posts,

//         // penggunaan langsung lazy eager loading   
//         'posts'=>$author->posts->load('category', 'author'),
//     ]);

// });


// route untuk login 
// middleware yag hanya bisa diakses oleh user yang belum melakukan otentikasi
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
// cek di Authenticate.php
// name(login) kasih tau bahwa name nya ini login dan juga untuk menamai route 


Route::post('/login',[LoginController::class, 'authenticate']);


Route::post('/logout',[LoginController::class, 'logout']);



// hanya bisa diakses oleh guest(tamu)
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');



Route::post('/register',[RegisterController::class, 'store']);

// ke halaman dashboard
// hanya boleh diakses oleh orang yang sudah login
// Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');




// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');




// routes yang biasanya digunakan untuk crud 
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


// Route::resource('user', UserController::class);


Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')
// ->middleware('admin');
// untuk deklarasi middleware dapat mengakses file kernel.php


// except('show') : kecuali mengakses method show dan gak bisa dipake
// middleware('auth') = otentikasi untuk cek apakah sudah login atau belum