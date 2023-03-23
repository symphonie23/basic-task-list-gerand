@extends('tasks.layout')

@section('content')

<div class="container">
  <div class="col">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-center">
        <h2>Task</h2>
        </div>
        <div class="card-body">
        <label>Task Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{ $tasks->name }}" disabled></br>
          <a href="{{ url('/tasks') }}" class="btn btn-danger btn-md" title="Back to Task Lists">
            Close
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop