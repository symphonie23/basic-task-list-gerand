@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center><h2>Task Lists</h2>
                    </div>
                    <div class="card-body">
                        <center><a href="{{ url('/tasklists/create') }}" class="btn btn-success btn-md" title="Add New Task">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create Task List
                        </a>
                        <a href="{{ url('/tasks') }}" class="btn btn-secondary btn-sm" title="Back to Tasks">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Go to Tasks
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-2">ID</th>
                                        <th class="col-7">Task Name</th>
                                        <th class="col-8">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasklists as $tasklist)
                                <tr>
                                <td>{{ $tasklist->id }}</td>
                                        <td>{{ $tasklist->name }}</td>
                                        <td>
                                            <a href="{{ url('/tasklists/' . $tasklist->id) }}" title="View Task"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/tasklists/' . $tasklist->id . '/edit') }}" title="Edit Task"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/tasklists/' . $tasklist->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection