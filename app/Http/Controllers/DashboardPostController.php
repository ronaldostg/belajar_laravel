<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // menampilkan data pengguna berdasarkan id user dari auth 
        
        return view('dashboard.posts.index', [
            'posts'=>Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('dashboard.posts.create', [
            'categories'=>Category::all()
        ]);





    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // ddd($request);

        // function store digunakan untk mengembalikan path sekalian memalsukan atau upload file nya
    //    menyimpan file baik dokumen/foto ditempatkan di store/app/post-images
        // return $request->file('image')->store('post-images');

        // php artisan storage:link = berfungsi untuk menghubungkan folder public di aplikasi dengan folder storage 
        // 


        $validatedData = $request->validate([
            'title'=> 'required|max:255', 
            // menjaga user ketika input slug agar bersifat unique
            'slug'=> 'required|unique:posts', 
            'image'=>'image|file|max:1024',
            'category_id'=>'required',
            'body'=>'required'
        ]);


        // cek gambar apakah ada isinya atau tidak 
        if($request->file('image')){
            // ambil nama gambar nya
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // bkin data baru 
        $validatedData['user_id'] = auth()->user()->id;
        
        
        // membatasi limnit srtring sesuai dengan panjang yang ditentukan dan menambahkan karakter di akhir 
        // strip_tags() = berfungsi untuk mmenghilangkan tag html
        
        
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
    

        Post::create($validatedData);


        return redirect('/dashboard/posts')->with('success', 'New Post has been addicted');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // return $post;
        return view('dashboard.posts.show', [
            'post'=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('dashboard.posts.edit', [
            'post'=>$post,
            'categories'=>Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        $rules = [
            'title'=> 'required|max:255', 
            'category_id'=>'required',
            'image'=>'image|file|max:1024',
            'body'=>'required'
        ];


         

        // validasi untuk slug 
        // cek slug baru jika tidak sama dengan data yang lama 
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';   
        }



        
        $validatedData = $request->validate($rules);

        // cek gambar apakah ada isinya atau tidak 
        if($request->file('image')){

            // cek menambah gambar bru dan mengganti gambar yang lama
            
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            // ambil nama gambar nya
            $validatedData['image'] = $request->file('image')->store('post-images');
        }


        // bkin data baru 
        $validatedData['user_id'] = auth()->user()->id;
        
        
        // membatasi limnit srtring sesuai dengan panjang yang ditentukan dan menambahkan karakter di akhir 
        // strip_tags() = berfungsi untuk mmenghilangkan tag html
        
        
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
    

        Post::where('id',$post->id)
                ->update($validatedData)
        ;

        return redirect('/dashboard/posts')->with('success', 'New Post has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       

        // cek menambah gambar bru dan mengganti gambar yang lama
            
        if($post->image){
            Storage::delete($post->image);
        }
        //

        Post::destroy($post->id);


        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');


    }



     // mengambil request untuk mengambil isi inputan slug
    //  public function checkSlug(Request $request){
     public function checkSlug(Request $request){
 
        // mengambil data dari request ?title=
        $slug = SlugService::createSlug(Post::class, 'slug',$request->title);
        return response()->json(['slug'=>$slug]);

 
    }


}
