@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <center><h2>Edit Task</h2>
      </div>
      <div class="card-body">
      <form action="{{ url('tasks/' .$tasks->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Task List</label></br>
            <input type="hidden" name="id" id="id" value="{{$tasks->id}}" />

            <select name="task_list_id" id="task_list_id" class="form-control">
              @foreach ($task_lists as $task_list)
                <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
              @endforeach
            </select></br>

            <label for="name">Task Name</label></br>
            <input type="text" name="name" id="name" value="{{$tasks->name}}" class="form-control"></br>

            <label>Task Description</label></br>
            <input type="text" name="desc" id="desc" value="{{$tasks->desc}}" class="form-control"></br>
            <label for="deadline">Deadline:</label>
            <input type="datetime-local" name="deadline_at" id="deadline_at" class="form-control" value="{{ ('deadline_at') }}" /><br>
            <input class="mx-2 my-2" type="checkbox" name="done" {{ $tasks->finished_at ? 'checked' : '' }}>
            <label for="done" class= "leads">Task Done</label>
              <!--button to go back to the tasklists page-->
              <input type="submit" value="Update" class="btn float-end" style="background-color: #2AAA8A; color:white;">
              <a href="{{ url('/tasks') }}" class="btn btn-outline-danger float-end mx-2" title="Back to Tasks">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@stop