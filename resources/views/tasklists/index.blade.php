@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task Lists</div>
                    
                    <div class="card-body">
                        <ul>
                            @foreach ($tasklists as $tasklist)
                                <li>
                                    <button>
                                    <a href="{{ route('tasklists.show', $tasklist->id) }}">{{ $tasklist->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
