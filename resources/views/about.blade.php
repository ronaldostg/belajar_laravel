@extends('layouts.main')

@section('container')
        {{-- <h1>Hlaman About</h1>
    <h3></h3>
    <p></p>
    <img src="img/" alt="" width="200" height="200"/> --}}
    <h1>Hlaman About</h1>
    <h3> {{$name}} </h3>
    <p><?=$email?></p>
    
    <img src="img/<?=$image?>" alt="<?=$name ?>" width="200" height="200" class="img-thumbnail rounded-circle"/>
@endsection


