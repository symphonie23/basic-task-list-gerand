@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <center><h2>Edit Task List</h2>
      </div>
      <div class="card-body">
        <form action="{{ url('tasklists/' .$tasklist->id) }}" method="post">
          {!! csrf_field() !!}
          @method("PATCH")
          <label>Task List Name:</label>
          <input type="text" name="name" id="name" placeholder="{{ $tasklist->name }}" class="form-control"><br>
          <!--button to go back to the tasklists page-->
          <a href="{{ url('/tasklists') }}" class="btn btn-outline-secondary btn-md" title="Back to Task Lists">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Close
          </a>
          <!--save button-->
          <input type="submit" value="Save" class="btn" style="background-color: #2AAA8A; color:white;">
        </form>
      </div>
    </div>
  </div>
</div>
@stop