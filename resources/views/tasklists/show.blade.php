@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
     <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <center><h2>Task Lists</h2>
          <div>
        <div class="card" >
        <div class="card-body">
            <h5 class="card-title">{{ $tasklist->name }}</h5>
       <div class="card-header">
           <table class="table">
        <thead>
              <tr>
                  <th>Tasks</th>
                
                        <center><a href="{{ url('/tasks/create') }}" class="btn btn-success btn-md" title="Add New Task">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Task
                        </a>
                        
              </tr>
          </thead>
          <tbody>
              @foreach ($tasks as $task)
                  <tr>
                    
                      <td>
                        {{ $task->name }}
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
        <!--go back to the tasklists page-->
        <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md" title="Back to Task Lists">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Task Lists
        </a>
      </div>
  </div>
</div>
@stop
