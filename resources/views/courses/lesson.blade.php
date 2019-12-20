@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>{{$post->title}}</h1>
                <hr>
                <div class="pt-4">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection
