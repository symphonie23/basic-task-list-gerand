@extends('tasks.layout')

@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <center><h2>Task</h2>
      </div>
      <div class="card-body">
      <label>Task Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{ $tasks->name }}" disabled></br>
        <label>Task Description</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{ $tasks->name }}" disabled></br>
          <a href="{{ url('/tasks') }}" class="btn btn-secondary btn-md" title="Back to Task Lists">
            Close
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
@stop