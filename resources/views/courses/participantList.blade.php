@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            @if (count($participants)-1 != 0)
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">contact email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div style="display:none;">{{$index = 0}}</div>
                        @foreach ($participants as $participant)
                            @if ($participant->id != $ownerID)
                                <div style="display:none;">{{$index = $index + 1}}</div>
                                <tr>
                                    <th scope="row">{{$index}}</th>
                                    <td>{{$participant->name}}</td>
                                    <td>{{$participant->surname}}</td>
                                    <td>{{$participant->email}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="card-body">
                <h3>There are no participants attending this course!</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
