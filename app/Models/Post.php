<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    

    // menambah satu per satu berdasarkan kolom dan harus diisi satu per satu
    // protected $fillable = ['title','slug','excerpt', 'body'];

     // menambah satu per satu berdasarkan kolom dan tidak perlu satu per satu
    // menjaga kolom yang tak boleh diisi
    // biasanya digunakan untuk kolom id
     protected $guarded = ['id'];

     protected $with=['category', 'author'];


    //  method untk query scope
    // wajib menggunakan kata scope dan setelahnya bebas dibikin 
     public function scopeFilter($query, array $filters){
        
        // if(isset($filters['search']) ? $filters['search'] : false ){
        //     return $query->where('title', 'like','%'.request('search').'%')->orWhere('body', 'like','%'.request('search').'%');
        // }


        $query->when($filters['search']?? false, function($query, $search){
            return $query->where('title', 'like','%'.request('search').'%')->orWhere('body', 'like','%'.request('search').'%');
        });


        // QUERY UNTUK CATEGORY
        //null coalescing = sebagai pemanis dan biasanya sebagai pengganti pengecekan isset. kita butuhkan ini kesederhanaan dari ternary
        // jika $filters['search']gak ada plih false jika ada menampilkan data true
        $query->when($filters['category'] ?? false, function($query, $category){
            
            return $query->whereHas('category', function($query) use($category){
                $query->where('slug', $category);
            });
           
        });
        
        
        $query->when($filters['author'] ?? false, function($query, $author){
          
            return $query->whereHas('author', function($query) use ($author)    {
                $query->where('username', $author);
            });
           
        });



     }

    //  method untuk penghubung antara table post dengan category
    // method ini sangat berguna dan tidak perlu lagi join table
    // oenanda hubungan tabel
    public function category(){

        return $this->belongsTo(Category::class);
    
    }

    public function author(){
        // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id');
    }



    // setiap route mencari otomatis slug
    public function getRouteKeyName()
    {
        return 'slug';
    }


    // untuk membuat slug yang diambil dari data tabel
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

   
}
