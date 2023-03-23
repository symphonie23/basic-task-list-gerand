@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
     <div class="col-12">
      <div class="card">
        <div class="card-header">
          <center><h2>Task Lists</h2>
          <div>
        <div class="card" >
        <div class="card-body">
            <h5 class="card-title">{{ $tasklist->name }}</h5>
        <div class="card-header">
           <table class="table">
        <thead class="col-12">
              <tr>
                  <th class="col-2">ID</th>
                  <th class="col-7">Task Names</th>
                    <center>
                        <a href="{{ url('/tasks/create') }}" class="btn btn-success btn-md" title="Add New Task">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create Task
                        </a>
                    </center>
                    <th class="text-center col-3">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>
                <!--Edit Button-->
                <a href="{{ url('/tasks/' . $task->id . '/edit') }}" title="Edit Task">
                    <button class="btn btn-outline-primary btn-md m-1">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </button>
                </a>
                <!--Delete Button-->
                <form method="POST" action="{{ url('/tasks/' . $task->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-outline-danger btn-md m-1" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)">
                      <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!--go back to the tasklists page-->
        <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md" title="Back to Task Lists">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Task Lists
        </a>
      </div>
  </div>
</div>
@stop
