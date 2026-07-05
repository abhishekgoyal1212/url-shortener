@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="card">
    <div class="card-body">
        <h2>Welcome, {{ auth()->user()->name }}</h2>

        <p><strong>Role:</strong> {{ auth()->user()->role }}</p>

        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    </div>
</div>

@endsection