@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Courses</h1>
        @if(count($courses) > 0)
            @foreach($courses as $course)
                <div class ="pb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <a href="/courses/{{$course->id}}" class="stretched-link">
                                    <h2>{{$course->title}}</h2>
                                </a>
                            </div>
                            <div class="card-text">
                                <h4>{{$course->description}}</h4>
                                <small>{{$course->beginDate}} to {{$course->endingDate}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$courses->links()}}
        @else
            <p>No courses found</p>
        @endif
    </div>
@endsection
