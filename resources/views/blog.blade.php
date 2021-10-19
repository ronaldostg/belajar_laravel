@extends('layouts.main')

@section('container')

<article>
    
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3" >{{ $post->title }}</h1>
    
                {{-- menampilkan data category dari model post --}}
                {{-- <p>By : <a href="/authors/{{ $post->author->username }}" class="text-decoration-none" >{{ $post->author->name }}</a>  --}}
                <p>By : <a href="/blogs?author={{ $post->author->username }}" class="text-decoration-none" >{{ $post->author->name }}</a> 
                    
                    in 
                {{-- <a href="/categories/{{ $post->category->slug}}" class="text-decoration-none"> --}}
                <a href="/blogs?category={{ $post->category->slug}}" class="text-decoration-none">

                    {{ $post->category->name }}

                </a>
                
                </p>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name}}" class="img-fluid" alt="">


                <article class="my-3">


            {{-- mencetak menggunakan php echo  --}}
                    {{-- {{ $post->body }} --}}

                    {{-- ingin menampilkan semua isi variabel dan mengeksekusi --}}
                {{-- tidak melakukan escaping --}}
                {!! $post->body !!}
                </article>
                
                

                    <a href="/blogs" class="d-block mt-3">Back To Post</a>
            </div>
        </div>
    </div>


    

</article>


@endsection

