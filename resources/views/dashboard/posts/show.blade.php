@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3" >{{ $post->title }}</h1>

           <a href="/dashboard/posts" class="btn btn-success">
            <span data-feather="arrow-left"></span>   
            Back to all my post</a>
           
           {{-- {{ $post->slug }}/edit : harus membuat aturan /edit untuk pernyataan edit data --}}
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
            <span data-feather="edit"></span>   
            Edit</a>



           {{-- <a href="" class="btn btn-danger">
            <span data-feather="x-circle"></span>   
            Delete</a> --}}


            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                {{-- memperkenalkan method delete --}}
                @method('delete')
                @csrf
                  <button class="btn btn-danger border-0 " onclick="return confirm('Are you sure ?')"> <span data-feather='x-circle'></span>
                    Delete
                  </button>
                
              </form>


              @if ($post->image)

              <div style="max-height:350px; overflow:hidden;">
                  <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid mt-3" alt="">

              </div>

              @else
              <img src="https://source.unsplash.com/1200x400?{{ $post->category->name}}" class="img-fluid mt-3" alt="">

              @endif

           

            <article class="my-3">


        {{-- mencetak menggunakan php echo  --}}
                {{-- {{ $post->body }} --}}

                {{-- ingin menampilkan semua isi variabel dan mengeksekusi --}}
            {{-- tidak melakukan escaping --}}
            {!! $post->body !!}
            </article>
            
            

        </div>
    </div>
</div>


@endsection