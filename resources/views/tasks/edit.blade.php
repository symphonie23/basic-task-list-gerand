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
          <form action="{{ url('tasks/' .$tasks->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Task List:</label></br>
            <input type="hidden" name="id" id="id" value="{{$tasks->id}}" id="id" />
            <select name="task_list_id" id="task_list_id" class="form-control">
              @foreach ($task_lists as $task_list)
                <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
              @endforeach
            </select></br>
            <label>Task Name:</label></br>
            <input type="text" name="name" id="name" value="{{$tasks->name}}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success">
            <!--button to go back to the tasklists page-->
            <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md" title="Back to Task Lists">
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Close
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop