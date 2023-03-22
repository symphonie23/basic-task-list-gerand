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
        <!--button to go back to the tasklists page-->
        <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-sm" title="Back to Task Lists">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Close
        </a>
    </form>
  
  </div>
</div>
@stop
