@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
<div class="col-md-12">
  <div class="card">
  <div class="card-header">
        <div class="table_header">
            <h2>Task Lists</h2>
            <div>
                <input placeholder="Search"/>
                <a href="{{ url('/tasklists/create') }}" class="btn btn-success btn-md" title="Add New Task">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create Task List
                        </a>
            </div>
        </div>
        <div class="card">
                     <div class="table_section">
                        <table>
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-2">ID</th>
                                        <th class="col-7">Task</th>
                                        <th class="col-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasklists as $tasklist)
                                <tr>
                                <td class="text-center">{{ $tasklist->id }}</td>
                                        <td class="text-center">{{ $tasklist->name }}</td>
                                        <td>
                                            <a href="{{ url('/tasklists/' . $tasklist->id) }}" title="View Task"><button class="btn btn-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/tasklists/' . $tasklist->id . '/edit') }}" title="Edit Task"><button class="btn btn-primary btn-sm m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/tasklists/' . $tasklist->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm m-1" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="pagination">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection