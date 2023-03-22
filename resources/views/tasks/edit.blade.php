@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Task</div>
  <div class="card-body">
      
      <form action="{{ url('tasks/' .$tasks->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$tasks->id}}" id="id" />
        <select name="task_list_id" id="task_list_id" class="form-control">
          @foreach ($task_lists as $task_list)
            <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
          @endforeach
        </select></br>
        <label>Task Name:</label></br>
        <input type="text" name="name" id="name" value="{{$tasks->name}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop