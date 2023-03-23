@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
      <div class="col-md-">
      <div class="card">
      <div class="card-header">
        <center><h2>Create Task Lists<h2>
      </div>
      <div class="card-body">
      
         <form action="{{ url('tasklists') }}" method="post">
        {!! csrf_field() !!}
        <label>Task List Name:</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md" title="Back to Task Lists">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel
        </a>
        <input type="submit" value="Save" class="btn btn-success btn-md">
    </form>
  </div>
</div>
@stop
