@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')

<div class="container">

    <h2>Edit Company</h2>

    <form action="{{ route('superadmin.companies.update', $company->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $company->name) }}">

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $company->email) }}">

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ old('phone', $company->phone) }}">

            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-success">Update</button>

        <a href="{{ route('superadmin.companies.index') }}" class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection