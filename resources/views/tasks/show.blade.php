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
        <h5 class="card-title">Task Name : {{ $tasks->name }}</h5>
      </div>
      <div class= "m-2">
      <a href="{{ url('/tasks') }}" class="btn btn-secondary btn-sm" title="Back to Task Lists">
      <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Tasks
      </a>
      </div>
      </hr>
    </div>
  </div>
</div>
@endsection
