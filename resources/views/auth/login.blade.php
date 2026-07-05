@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

@extends('layouts.guest')

@section('title', 'Login')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('login.post') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label>Email</label>

                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
