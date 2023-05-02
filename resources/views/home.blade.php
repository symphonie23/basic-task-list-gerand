@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
<div class="col-md-6">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="table_header">
                <h2>Log in</h2>
                <div>
                </div>
            </div>
                <div class="card-body">
                    @if (!Auth::check()) {{-- Check if user is not logged in --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
					@else
                        <p>You are already logged in.</p>
                    @endif

                	</div>
            	</div>
       		</div>
    	</div>
	</div>
</div>
<br>
<!-- Create a container div to center the button -->
<div class="container d-flex justify-content-center">
    @if (Auth::check()) {{-- Check if user is logged in --}}
        <!-- Add a button using Bootstrap classes -->
        <a href="{{ url('/tasklists') }}" class="btn btn-lg animate-btn" style="background-color: #2AAA8A; color:white;">Create Task Lists</a>
    @else
        <!-- Add a disabled button with tooltip for error message -->
        <button class="btn btn-lg animate-btn" style="background-color: #2AAA8A; color:white;" data-toggle="tooltip" data-placement="bottom" title="You must log in first before proceeding." disabled>Create Task Lists</button>
    @endif
</div>
@endsection
