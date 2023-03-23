@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">

<div class="col-sm-12">
  <div class="card">
  <div class="card-header">
        <div class="table_header">
            <h2>Task Lists</h2>
            <div>
                
                <a href="{{ url('/tasklists/create') }}" class="btn btn-md" style="background-color: #2AAA8A;" title="Add New Task">
                    <i class="fa fa-plus" aria-hidden="true"></i> Create Task List
                </a>
            </div>
        </div>
        <div class="card">
                     <div class="table_section">
                        <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-sm-1">ID</th>
                                        <th class="col-sm-8">Task List Name</th>
                                        <th class="col-sm-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasklists as $tasklist)
                                <tr>
                                <td class="text-center">{{ $tasklist->id }}</td>
                                    <td>{{ $tasklist->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/tasklists/' . $tasklist->id) }}" title="View Task"><button class="btn btn-outline-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/tasklists/' . $tasklist->id . '/edit') }}" title="Edit Task"><button class="btn btn-outline-primary btn-sm m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/tasklists/' . $tasklist->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-outline-danger btn-sm m-1" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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