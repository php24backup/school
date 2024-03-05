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
                <h2 class="card-title text-center">Register Here</h2>
                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" value="{{ old('password') }}" name="password" required>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="{{ route('login') }}" class="btn btn-link">Login</a>
                        <a href="{# route('password.request') #}" class="btn btn-link">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
