
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pb-4">
            <h1>Edit lesson information</h1>
        </div>
        {!! Form::open(['route'=>['posts.update', $course->id, $post->id]]) !!}
        <h4>

            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title',$post->title,['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('start_date','Date')}}
                {{Form::date('start_date',$post->start_date,['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('body','Content')}}
                {{Form::textarea('body',$post->body,['id' =>'article-ckeditor','class' => 'form-control'])}}
            </div>

        </h4>
        {{Form::hidden('_method', 'PUT')}}
        <div class="text-center pt-3">
            {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block'])}}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
