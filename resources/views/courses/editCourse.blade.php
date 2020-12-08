
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pb-4">
            <h1>Edit course information</h1>
        </div>
        {!! Form::open(['action' => ['CourseController@update', $course->id],'method'=>'POST']) !!}
        <h4>
            <div class="form-group">
                {{Form::label('title','Course name')}}
                {{Form::text('title', $course->title,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description', $course->description,['class' => 'form-control'])}}
            </div>
            <div class="form-row">
                <div class="col">
                    {{Form::label('beginningDate','Beginning date')}}
                    {{Form::date('beginningDate',$course->beginDate,['class' => 'form-control'])}}
                </div>
                <div class="col">
                    {{Form::label('endingDate','Ending date')}}
                    {{Form::date('endingDate',$course->endingDate,['class' => 'form-control'])}}
                </div>
            </div>
        </h4>
        {{Form::hidden('_method', 'PUT')}}
        <div class="text-center pt-3">
            {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block'])}}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

