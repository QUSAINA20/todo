@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $todo['title'] }}</div>
                    <div class="card-body">
                        <p>{{ $todo['description'] }}</p>
                        <p>
                            @if($todo['completed'])
                                <span class="badge badge-success">Completed</span>
                            @else
                                <span class="badge badge-warning">Incomplete</span>
                            @endif
                        </p>
                        <a href="{{ route('todos.index') }}" class="btn btn-primary">Back to Todo List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
