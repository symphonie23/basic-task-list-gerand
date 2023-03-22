@extends('tasklists.layout')
@section('content')
<div class="row d-flex justify-content-center">

     <div class="col-md-7">
      <div class="card">
      <div class="card-header">Create Tasklists</div>
      <div class="card-body">
      
         <form action="{{ url('tasklists') }}" method="post">
        {!! csrf_field() !!}
        <label>Tasklists Name:</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop
