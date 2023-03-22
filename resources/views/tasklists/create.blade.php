@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Create tasklists</div>
  <div class="card-body">
      
      <form action="{{ url('tasklists') }}" method="post">
        {!! csrf_field() !!}
        <label>Task List Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-sm" title="Back to Task Lists">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel
        </a>
    </form>
  
  </div>
</div>
@stop
