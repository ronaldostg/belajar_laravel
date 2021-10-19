{{-- untuk print data bertipe object --}}
{{-- hampir mirip dengan var_dump--}}
{{-- @dd($posts) --}}

@extends('layouts.main')


@section('container')

<h1 class="mb-3 border-buttom pb-4 text-center">{{ $title }}</h1>

<div class="row mb-3 justify-content-center" >
    <div class="col-md-6">
        <form action="/blogs" > 

            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

{{-- hitung jumlah postingan --}}
@if ($posts->count())
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    <div class="card-body text-center">
      
        <h3 class="card-title">
            <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                {{ $posts[0]->title }}

            </a>
        </h3>
        <p>  
            <small class="text-muted">
        
                {{-- By : <a href="/authors{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a>  --}}
                By : <a href="/blogs?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> 
                in 
                
                {{-- <a class='text-decoration-none' href="/categories/{{ $posts[0]->category->slug}}"> --}}
                <a class='text-decoration-none' href="/blogs?category={{ $posts[0]->category->slug}}">

                {{ $posts[0]->category->name }}

                </a>

                    {{-- membuat perbedaan waktu yang ada dengan  waktu yang sekarang--}}
                {{ $posts[0]->created_at->diffForHumans() }}
            
            </small>    
        </p>
      



      <p class="card-text">{{ $posts[0]->excerpt }}</p>

        
      <a class='text-decoration-none btn btn-primary' href="/blog/{{ $posts[0]->slug }}">Read more....</a>

   

    </div>
  </div>



<div class="container">
    <div class="row">
        {{-- skip() ngulang semua kecuali postingan yang pertama --}}
        @foreach ($posts->skip(1) as $post )

        <div class="col-md-4 mb-3">
            <div class="card" >
                <div class="position-absolute bg-dark px-3 py-2  " style="background-color: rgba(0,0,0,0.7) ">
                    <a  href="/blogs?category={{ $post->category->slug}}" class="text-white text-decoration-none">
                        {{ $post->category->name }}
                        
                    </a>
                </div>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title}}</h5>
                  <p>  
                    <small class="text-muted">
                
                        {{-- By : <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>  --}}
                        By : <a href="/blogs?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
                       
                        {{ $post->category->name }}
        
                        </a>
        
                            {{-- membuat perbedaan waktu yang ada dengan  waktu yang sekarang--}}
                        {{ $post->created_at->diffForHumans() }}
                    
                    
                    </small>    
                </p>

                  <p class="card-text">{{ $post->excerpt}}</p>
                  <a  href="/blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
              </div>
        </div>
                 
        @endforeach   
    </div>
</div>


@else 

  <p class="text-center fs-4">No post Found</p>
@endif

{{-- template bawaan pagination dari laravel --}}

    <div class="d-flex justify-content-center"> 
        {{ $posts->links() }}
    </div>
@endsection


    