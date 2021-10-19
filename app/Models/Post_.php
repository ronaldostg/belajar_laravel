<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            'title' => 'Judul Post Pertama',
            'slug' => 'judul-post-pertama',
            'author' => 'Sandhika Galih',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Consequuntur vel maxime, ipsum debitis dolorum perferendis amet totam provident 
            laudantium quidem porro fuga. 
            Eum debitis quisquam dolorem veniam incidunt neque? Natus?
            '
        ],
        [
            'title' => 'Judul Post kedua',
            'slug' => 'judul-post-kedua',
            'author' => 'Dodi',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Consequuntur vel maxime, ipsum debitis dolorum perferendis amet totam provident 
            laudantium quidem porro fuga. 
            Eum debitis quisquam dolorem veniam incidunt neque? Natus?
            '
        ]

    ];

    public static function all()
    {

        // dipakai kalau properti biasa 
        // return $this->blog_posts; 

        // dipakai kalau properti static 
        // return self::$blog_posts;
        
        // penggunaan collection
        return collect(self::$blog_posts);



    }


    
    public static function find($slug)
    {
        // khusus untuk properti static
        // $posts = self::$blog_posts;

        // khusus untuk method static
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }

    // ambil data dari yang pertama
        // return $posts->first();

            // ambil data yang pertama dengan kondisi tertentu

            
        return $posts->firstWhere('slug', $slug);
    }
}
