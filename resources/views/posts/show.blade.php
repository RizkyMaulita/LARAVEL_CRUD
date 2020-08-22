@extends('adminlte.master')

@section('content')
<div class="mt-3 ml-3">
    <h4> {{ $post -> title}} </h4>
    <p> {{ $post -> body}} </p>
    <p> Author : {{ $post -> author -> name }} </p>
    <!-- ini semuanya dapat dari PostController@show, karena di compact ke $post, maka yang digunakan itu -->
</div>
  
@endsection