<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    //  method untuk membuat factory nya
    public function definition()
    {
        return [

            // mt_rand() = method membuat kata random dari 2 sampai 8 kata
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),

            // membuat sebuah array yang didalamnya berapa paragraf 
            'body' => '<p>'.implode('</p><p>',  $this->faker->paragraphs(mt_rand(5,10))),
                        

            // implode = di join . setiap array nya dengan menambahkan delimiter/limit nya 
            // misal : kalo ketemu <p> ketemu </p> begitu juga selanjutnya dan di akhir kita gabung lagi dengan </p>



            // 'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
            // ->array(fn ($p) => "<p>$p</p>")
            // ->implode(''),
                
            
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 2)

        ];
    }
}
