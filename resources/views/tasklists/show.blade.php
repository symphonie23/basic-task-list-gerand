@extends('tasklists.layout')
@section('content')
<div class="row d-flex justify-content-center">
     <div class="col-md-7">
      <div class="card">
        <div class="card-header">Tasklists</div>
        <div class="card-body">
            <h5 class="card-title">{{ $tasklist->name }}</h5>
       <div class="card-header">
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
