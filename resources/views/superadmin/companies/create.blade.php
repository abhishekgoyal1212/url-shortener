@extends('layouts.app')

@section('title', 'Create Company')

@section('content')

<div class="container">

    <h2>Create Company</h2>

    <form action="{{ route('superadmin.companies.store') }}" method="POST">

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
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>

        <a href="{{ route('superadmin.companies.index') }}" class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection