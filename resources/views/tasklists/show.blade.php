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
      </div>
  </div>
</div>