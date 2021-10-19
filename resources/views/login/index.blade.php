@extends('layouts.main')

@section('container')


<div class="row justify-content-center">
    <div class="col-md-5">

      {{-- cek dalam session ada tidak sebuah key yang namanya success di registercontroller --}}
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    
      @endif
      
      {{-- cek dalam session ada tidak sebuah key yang namanya success di registercontroller --}}
      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    
      @endif
      
      


        
<main class="form-signin">
    <h1 class="h3 mb-3 fw-normal text-center">Please Log in</h1>
    <form action="/login" method="post">

      @csrf
  
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
         placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
        <label for="email">Email address</label>
        <div class="invalid-feedback">
          @error('email')
            
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password"  placeholder="Password" required>
        <label for="password">Password</label>
      </div>
  
      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>

    </form>
    <small class="d-block text-center mt-3">
        Not registered?<a href="/register"> Register Now</a>
    </small>
</main>
    </div>
</div>


  



  @endsection