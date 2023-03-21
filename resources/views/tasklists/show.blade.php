@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $tasklist->name }}</h1>
        <p>{{ $tasklist->description }}</p>

        <h2>Tasks</h2>
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task->name }}</li>
            @endforeach
        </ul>

        <a href="{{ route('tasklists.edit', $tasklist->id) }}" class="btn btn-primary">Edit</a>

        <form action="{{ route('tasklists.destroy', $tasklist->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
