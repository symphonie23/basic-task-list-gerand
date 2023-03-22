@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Tasks List</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Task Name : {{ $tasks->name }}</h5>

  </div>

        <!--button to go back to the tasks page-->
        <a href="{{ url('/tasks') }}" class="btn btn-secondary btn-sm" title="Back to Task Lists">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Tasks
        </a>
      
    </hr>
  
  </div>
</div>