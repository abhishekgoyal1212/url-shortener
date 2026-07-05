@extends('layouts.app')

@section('title', 'Edit admin')

@section('content')

    <div class="container">

        <h2>Edit admin</h2>

        <form action="{{ route('superadmin.admin.update', $admin->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}">

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}">

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="password" class="form-control">

                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <small class="text-muted">
                Leave password blank if you don't want to change it.
            </small>

            <div class="mb-3">
                <label class="form-label">Company</label>

                <select name="company_id" class="form-select">

                    <option value="">Select Company</option>

                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}"
                            {{ old('company_id', $admin->company_id) == $company->id ? 'selected' : '' }}>

                            {{ $company->name }}

                        </option>
                    @endforeach

                </select>

                @error('company_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <button class="btn btn-success">Update</button>

            <a href="{{ route('superadmin.admin.index') }}" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

@endsection
