@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Tasklist</div>
  <div class="card-body">
      
      <form action="{{ url('tasklists/' .$tasklist->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Task List Name</label></br>
        <input type="text" name="name" id="name" placeholder="{{ $tasklist->name }}" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop
