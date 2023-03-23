@extends('tasks.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task Lists</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Tasks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasklists as $tasklist)
                                    <tr>
                                        <td>{{ $tasklist->id }}</td>
                                        <td>{{ $tasklist->name }}</td>
                                        <td>
                                            @foreach ($tasklist->tasks as $task)
                                                {{ $task->name }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('tasklists.edit', $tasklist->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('tasklists.destroy', $tasklist->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('tasklists.create') }}" class="btn btn-success">Add New Task List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

