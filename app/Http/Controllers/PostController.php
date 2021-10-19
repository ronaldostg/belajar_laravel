<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function index()
    {

        $title='';

        if(request('category')){
            // cek kategori apakah ada di dalam database
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '.$category->name;
        }
        
        if(request('author')){
            // cek kategori apakah ada di dalam database
            $author = User::firstWhere('username', request('author'));
            $title = ' by '. $author->name;
        }




        // dd(request('search'));


        return view('blogs',  [
            'title' => 'All Posts'. $title,
            'active'=>'blogs',
            // untuk mendapat dari model
            // 'posts' => Post::all()
            // yang tebaru dimasukin diletakin di atas
            // 'posts' => $posts->latest()->get()

            // filter dimana merupakan method unutk query scope di model post 
            // tanpa menggunakan paginate
            // 'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get()

            // menggunakan paginate
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            // withQueryString : apapun query di string nya , bawa saja

            // PENGGUNAAN EAGER LOADING 
            // mengambil data post dengan eager loading
            // mengambil data sekalian dari table user(author) dan category
            // eager dilakukan untuk meminimalisir jumlah query yang di eksekusi
            // tanpa menggunakan with() eksekusi query yang dijalankan lebih banyak dan membutuhkan waktu yang lama
            // author dan category merupakan method untuk mengambil data user dan category di model post

            // 'posts' => Post::with(['author', 'category'])->latest()->get()



        ]);
    }


    // public function show($slug){
    // di parameter harus sama baik penamaan  variabel di parameter show dan di routes

    public function show(Post $post)
    {

        return view(
            'blog',
            [
                'title' => 'Single Post',
                'active'=>'posts',
                // 'post' => Post::find($slug) 
                'post' => $post
            ]
        );
    }
}
