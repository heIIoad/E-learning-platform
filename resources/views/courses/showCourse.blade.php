@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{$course->title}}</h1>
                <h4>{{$course->description}}</h4>
                <small>{{$course->beginDate}} to {{$course->endingDate}}</small>

                @if($course->ownerID == Auth::id())
                    <div class="pt-4">
                        <a href="/courses/{{$course->id}}/create" class="btn btn-primary btn-lg btn-block">
                            Create new lesson
                        </a>
                    </div>
                @endif

                @if(count($participant) == 0)
                    <div class="pt-4">
                        <a href="/participant/{{$course->id}}" class="btn btn-primary btn-lg btn-block">
                            Add this course to your dashboard
                        </a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class ="pb-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="/courses/{{$course->id}}/{{$post->id}}" class="stretched-link">
                                            <h2>{{$post->title}}</h2>
                                        </a>
                                    </div>
                                    <div class="card-text">
                                        <small>{{$post->start_date}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$posts->links()}}
                @else
                    <div class="pt-3">
                        <p>No lessons yet created</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
