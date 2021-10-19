<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       

        User::create([
            'name'=> 'Ronaldo Sitanggang',
            'username'=> 'ronaldostg',
            'email'=>'sitanggang761@gmail.com',
            'password'=>bcrypt('ronaldo123')
        ]);

        User::create([
            'name'=> 'Diana Maulana',
            'username'=> 'diana_maul',
            'email'=>'diana@gmail.com',
            'password'=>bcrypt('diana123')
        ]);
        // User::create([
        //     'name'=> 'Dodi',
        //     'email'=>'dodi761@gmail.com',
        //     'password'=>bcrypt('12345')
        // ]);

        User::factory(3)->create();

        // factory(10) dimana ada 10 data yang di generate data palsu yang dimasukkan di tabel


        Category::create([
            'name'=>'Web Programming', 
            'slug'=>'web-programming'
        ]);


        Category::create([
            'name'=>'Web Design', 
            'slug'=>'web-design'
        ]);
        Category::create([
            'name'=>'Personal', 
            'slug'=>'personal'
        ]);

        Post::factory(20)->create();


        // Post::create([
        //    'title'=>'Judul Pertama', 
        //    'slug'=>'judul-pertama', 
        //    'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sequi culpa ab porro fuga error ipsam eius dolorum corrupti, hic quas vitae nostrum reiciendis incidunt necessitatibus aliquid assumenda quos numquam eligendi',
        //    'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sequi culpa ab porro fuga 
        //    error ipsam eius dolorum corrupti, hic quas vitae nostrum reiciendis incidunt necessitatibus aliquid assumenda quos numquam eligendi sit 
        //    soluta non eveniet enim accusantium? Assumenda expedita necessitatibus aspernatur eum voluptatibus optio eligendi deleniti repudiandae 
        //    veniam voluptatum magni ipsa, fugit libero nisi aut maxime quae saepe ratione quia mollitia reiciendis atque? Unde aliquid eveniet 
        //    corrupti, rerum perspiciatis recusandae asperiores doloribus excepturi dicta eaque quo, assumenda quis ipsa architecto sed cupiditate 
        //    voluptatem fugit explicabo commodi fuga, deleniti molestias adipisci tempora animi. Veritatis ea quam esse! Hic eum nisi ipsum.
        //    ' ,
        //    'category_id'=>1,
        //    'user_id'=>1
        // ]);
        // Post::create([
        //    'title'=>'Judul Kedua', 
        //    'slug'=>'judul-kedua', 
        //    'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sequi culpa ab porro fuga error ipsam eius dolorum corrupti, hic quas vitae nostrum reiciendis incidunt necessitatibus aliquid assumenda quos numquam eligendi',
        //    'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sequi culpa ab porro fuga 
        //    error ipsam eius dolorum corrupti, hic quas vitae nostrum reiciendis incidunt necessitatibus aliquid assumenda quos numquam eligendi sit 
        //    soluta non eveniet enim accusantium? Assumenda expedita necessitatibus aspernatur eum voluptatibus optio eligendi deleniti repudiandae 
        //    veniam voluptatum magni ipsa, fugit libero nisi aut maxime quae saepe ratione quia mollitia reiciendis atque? Unde aliquid eveniet 
        //    corrupti, rerum perspiciatis recusandae asperiores doloribus excepturi dicta eaque quo, assumenda quis ipsa architecto sed cupiditate 
        //    voluptatem fugit explicabo commodi fuga, deleniti molestias adipisci tempora animi. Veritatis ea quam esse! Hic eum nisi ipsum.
        //    ' ,
        //    'category_id'=>1,
        //    'user_id'=>1
        // ]);
        // Post::create([
        //    'title'=>'Judul Ketiga', 
        //    'slug'=>'judul-ketiga', 
        //    'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sequi culpa ab porro fuga error ipsam eius dolorum corrupti, hic quas vitae nostrum reiciendis incidunt necessitatibus aliquid assumenda quos numquam eligendi',
        //    'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sequi culpa ab porro fuga 
        //    error ipsam eius dolorum corrupti, hic quas vitae nostrum reiciendis incidunt necessitatibus aliquid assumenda quos numquam eligendi sit 
        //    soluta non eveniet enim accusantium? Assumenda expedita necessitatibus aspernatur eum voluptatibus optio eligendi deleniti repudiandae 
        //    veniam voluptatum magni ipsa, fugit libero nisi aut maxime quae saepe ratione quia mollitia reiciendis atque? Unde aliquid eveniet 
        //    corrupti, rerum perspiciatis recusandae asperiores doloribus excepturi dicta eaque quo, assumenda quis ipsa architecto sed cupiditate 
        //    voluptatem fugit explicabo commodi fuga, deleniti molestias adipisci tempora animi. Veritatis ea quam esse! Hic eum nisi ipsum.
        //    ' ,
        //    'category_id'=>2,
        //    'user_id'=>2
        // ]);


    }
}
