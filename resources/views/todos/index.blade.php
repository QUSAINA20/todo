@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todo List</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todos as $todo)
                                <tr>
                                    <td>{{ $todo['title'] }}</td>
                                    <td>{{ $todo['description'] }}</td>

                                    <td>
                                        @if($todo['completed'])
                                            <span class="badge badge-success">Completed</span>
                                        @else
                                            <span class="badge badge-warning">Incomplete</span>
                                        @endif
                                    </td>
                                    <td>{{ $todo['start_time'] }}</td>
                                    <td>{{ $todo['end_time'] }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Todo Actions">
                                            <a href="{{ route('todos.show', $todo['id']) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('todos.edit', $todo['id']) }}" class="btn btn-primary">Edit</a>
                                            <form method="POST" action="{{ route('todos.destroy', $todo['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
