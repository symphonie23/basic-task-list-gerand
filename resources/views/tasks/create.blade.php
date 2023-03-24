@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Add a Task</div>
    <div class="card-body">
      <form action="{{ url('tasks') }}" method="post">
        {!! csrf_field() !!}
        <label>Task List</label>
        <select name="task_list_id" id="task_list_id" class="form-control">
          @foreach ($task_lists as $task_list)
            <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
          @endforeach
        </select><br>
        <label>Task Name</label>
        <input type="text" name="name" id="name" class="form-control"><br>
        <!--go back to tasklists-->
        <a href="{{ url('/tasklists/') }}" class="btn btn-secondary" title="Back to Task Lists">
          <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel
        </a>
        <input type="submit" value="Save" class="btn" style="background-color: #2AAA8A; color:white;">
      </form>
    </div>
  </div>
</div>
@stop