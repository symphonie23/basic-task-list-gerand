@extends('tasks.layout')
@section('content')

    <div class="container">
        <div class="col">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Task</h2>
                    </div>
                    <div class="card-body">
                    <center><a href="{{ url('/tasks/create') }}" class="btn btn-success btn-md" title="Add New Task">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create Task
                        </a>
                         <!--button to go back to the tasklists page-->
                        <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md" title="Back to Task Lists">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Tasklist
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table border border-dark">
                                <thead>
                                    <tr class= "text-center">
                                        <th>ID</th>
                                        <th>Task Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $item)
                                <tr>
                                    <td class= "col-sm-1 text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class= "col-sm-8 align-middle">{{ $item->name }}</td>
                                    <td class= "col-sm-3 ">
                                        <a href="{{ url('/tasks/' . $item->id) }}" title="View Task"><button class="btn btn-info btn-md m-1"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/tasks/' . $item->id . '/edit') }}" title="Edit Task"><button class="btn btn-primary btn-md m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ url('/tasks/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-md m-1" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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