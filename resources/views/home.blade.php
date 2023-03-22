@extends('tasks.layout')
@section('content')
	<!-- Create a container div to center the button -->
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<!-- Add a button using Bootstrap classes -->
		<a href="{{ url('/tasklists') }}" class="btn btn-primary btn-lg animate-btn">Create Tasks</a>
	</div>
@endsection
