@extends('adminlte.master')

@section('content')
<div class="mt-3 ml-3">
    <h4> {{ $post -> title}} </h4>
    <p> {{ $post -> body}} </p>
    <p> Author : {{ $post -> author -> name }} </p>
    <!-- ini semuanya dapat dari PostController@show, karena di compact ke $post, maka yang digunakan itu -->
    <div>
        Tags : 
        @forelse($post -> tags as $t)
            <button class="btn btn-primary btn-sm"> {{ $t -> tag_name }} </button>

            @empty
            No Tags
        @endforelse
    </div>
</div>
  
@endsection