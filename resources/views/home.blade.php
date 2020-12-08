@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Your courses</h2>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($courses) == 0)
                    <h5>Currently you do not have any courses!</h5>
                @endif
                @foreach($courses as $course)
                    <div class ="pb-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-title">
                                        <a href="/courses/{{$course->id}}" class="stretched-link">
                                            <h2>{{$course->title}}</h2>
                                        </a>
                                    </div>
                                    @if($course->ownerID == Auth::id())
                                        <h1 class="mr-auto p-3"></h1>
                                        <a href="/courses/{{$course->id}}/edit" class="btn btn-primary">Edit</a>
                                        {!! Form::open(['action' => ['CourseController@destroy', $course->id], 'method' => 'POST', 'class' => 'pl-2 pull-right']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    @else
                                        <h1 class="mr-auto p-3"></h1>
                                        <a href="/participant/{{$course->id}}/remove" class="btn btn-primary">
                                            Remove from dashboard
                                        </a>
                                    @endif
                                </div>
                                <div class="card-text">
                                    <h4>{{$course->description}}</h4>
                                    <small>{{$course->beginDate}} to {{$course->endingDate}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
