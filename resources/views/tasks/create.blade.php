@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Add Tasks</div>
  <div class="card-body">
      
      <form action="{{ url('tasks') }}" method="post">
        {!! csrf_field() !!}
        <label>Task List</label></br>
        <select name="task_list_id" id="task_list_id" class="form-control">
          @foreach ($task_lists as $task_list)
            <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
          @endforeach
        </select></br>
        <label>Task Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop
