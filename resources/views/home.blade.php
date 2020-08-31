@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Materi Laravel </div>

                <div class="card-body">
                    <p> Silahkan klik link berikut untuk menjalankan materi laravel about Posting  </p>
                    <a href="/posts" class="btn btn-primary btn-sm m-1"> Post </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
