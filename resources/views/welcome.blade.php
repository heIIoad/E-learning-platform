@extends('layouts.app')
@section('content')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
        }
    </style>
    <div style="height: 70vh; align-items: center; display: flex; position: relative; justify-content: center;">
        <div class="content" style="text-align: center;">
            <div style="font-size: 75px;">
                Welcome and get started!
            </div>
            <h1 class="mr-auto p-3"></h1>
            <div>
                <a href="{{ route('login') }}"class="btn btn-primary btn-xlarge">Login</a>
                <div class="pl-4 pull-right", style="display: inline">
                    <a href="{{ route('register') }}"class="btn btn-success btn-xlarge">Register</a>
                </div>
            </div>
        </div>
    </div>
@endsection
