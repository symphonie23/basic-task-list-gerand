@extends('tasks.layout')
@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        <!-- Create a container div to center the button -->
        <div class="container d-flex justify-content-center align-items-center vh-100" style="margin-top: -150px;">
            <!-- Add a button using Bootstrap classes -->
            <a href="{{ url('/tasklists') }}" class="btn btn-lg animate-btn" style="background-color: #2AAA8A; color:white;">Create Task Lists</a>
        </div>
        
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
@endsection