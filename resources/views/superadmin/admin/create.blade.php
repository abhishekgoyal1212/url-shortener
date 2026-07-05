@extends('layouts.app')

@section('title', 'Create Admin')

@section('content')

    <div class="container">

        <h2>Create Admin</h2>

        <form action="{{ route('superadmin.admin.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">

                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Company</label>

                <select name="company_id" class="form-select">
                    <option value="">Select Company</option>

                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>

                            {{ $company->name }}

                        </option>
                    @endforeach

                </select>

                @error('company_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <button class="btn btn-success">Save</button>

            <a href="{{ route('superadmin.companies.index') }}" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

@endsection
