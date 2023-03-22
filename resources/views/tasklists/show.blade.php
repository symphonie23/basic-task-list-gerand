@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Task List</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">{{ $tasklist->name }}</h5>

        <table class="table">
          <thead>
              <tr>
                  <th>Tasks</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($tasks as $task)
                  <tr>
                      <td>
                        {{ $task->name }}
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
        <!--go back to the tasklists page-->
        <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-sm" title="Back to Task Lists">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Task Lists
        </a>
      </div>
  </div>
</div>