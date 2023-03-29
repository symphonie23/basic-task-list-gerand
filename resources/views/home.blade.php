@extends('tasks.layout')
@section('content')
	<!-- Create a container div to center the button -->
	<div class="container d-flex justify-content-center align-items-center vh-100" style="margin-top: -150px;">
		<!-- Add a button using Bootstrap classes -->
		<a href="{{ url('/tasklists') }}" class="btn btn-lg animate-btn" style="background-color: #2AAA8A; color:white;">Create Task Lists</a>
	</div>
@endsection