@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h1>{{$course->title}}</h1>
                    <h1 class="mr-auto p-3"></h1>
                    <a href="/participants/{{$course->id}}/list" class="btn btn-primary">Participants</a>
                    <div class="pr-2"></div>
                    @if($course->ownerID == Auth::id())
                        <a href="/courses/{{$course->id}}/edit" class="btn btn-primary">Edit</a>
                        {!! Form::open(['action' => ['CourseController@destroy', $course->id], 'method' => 'POST', 'class' => 'pl-2 pull-right']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                    @endif
                </div>
                <h4>{{$course->description}}</h4>
                <br>
                <h5>Course created by <b>{{$ownerName}} {{$ownerSurname}}</b></h5>
                <h5>contact email: <b>{{$ownerEmail}}</b></h5>
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
                @else
                    @if($course->ownerID != Auth::id())
                        <div class="pt-4">
                            <a href="/participant/{{$course->id}}/remove" class="btn btn-primary btn-lg btn-block">
                                Remove this course from your dashboard
                            </a>
                        </div>
                    @endif
                @endif
            </div>
            <div class="card-body">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class ="pb-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="card-title">
                                            <a href="/courses/{{$course->id}}/{{$post->id}}" class="stretched-link">
                                                <h2>{{$post->title}}</h2>
                                            </a>
                                        </div>
                                        @if($course->ownerID == Auth::id())
                                            <h1 class="mr-auto p-3"></h1>
                                            <a href="/courses/{{$course->id}}/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                                            {!! Form::open(['action' => ['PostsController@destroy', $course->id, $post->id], 'method' => 'POST', 'class' => 'pl-2 pull-right']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        @endif
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
