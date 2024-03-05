@extends('layouts.master')

@section('content')

@if(session()->has('status'))
    <div class="alert alert-info">
        {{ session()->get('status') }}
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <div class="card" style="max-width: 500px; margin: 0 auto;">
            <div class="card-body">
                <h2 class="card-title text-center">Login Here</h2>
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                        <a href="{# route('password.request') #}" class="btn btn-link">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
