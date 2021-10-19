@extends('layouts.main')

@section('container')


<div class="row justify-content-center">
    <div class="col-md-5">
        
<main class="form-registration">
    <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
    @csrf
   
    <form action='/register' method="post">
  


      <div class="form-floating">
        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" 
        
        {{-- saat terjadi error pada form akan ditampilkan data yang lama --}}
        value="{{ old('name') }}"
        
        id="floatingInput" placeholder="Name" required>
        <label for="floatingInput">Name</label>

        {{-- menampilkan error pada forms --}}
        <div class="invalid-feedback">
          @error('name')
            
          {{ $message }}
          @enderror
        </div>
      </div>
      
      <div class="form-floating">
        <input type="text" name="username" 
        value="{{ old('username') }}"
        class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Username" required>
        <label for="floatingInput">Username</label>

        {{-- menampilkan error pada forms --}}
        <div class="invalid-feedback">
          @error('username')
            
          {{ $message }}
          @enderror
        </div>
      </div>

      <div class="form-floating">
        <input type="email" name="email" 
        value="{{ old('email') }}"
        class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Email" required>
        <label for="floatingInput">Email</label>
        {{-- menampilkan error pada forms --}}
        <div class="invalid-feedback">
          @error('email')
            
          {{ $message }}
          @enderror
        </div>
      </div>


      <div class="form-floating">
        <input type="password" name="password" 
        value="{{ old('password') }}"
        class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
        {{-- menampilkan error pada forms --}}
        <div class="invalid-feedback">
          @error('password')
            
          {{ $message }}
          @enderror
        </div>
      </div>
  


      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>


    <small class="d-block text-center mt-3">
        Already login?<a href="/login"> Login Now</a>
    </small>
</main>
    </div>
</div>


  



  @endsection