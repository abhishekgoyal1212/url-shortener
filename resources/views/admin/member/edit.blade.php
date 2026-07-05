@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')

<div class="container">

    <h2 class="mb-3">Edit Member</h2>

    <form action="{{ route('admin.members.update', $member) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $member->name) }}">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>

            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $member->email) }}">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">
                Password <small>(Leave blank to keep current password)</small>
            </label>

            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror">

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection