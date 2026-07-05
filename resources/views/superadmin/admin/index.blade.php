@extends('layouts.app')

@section('title', 'Admin')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Admin</h2>

            <a href="{{ route('superadmin.admin.create') }}" class="btn btn-primary">
                + Add Admin
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($admin as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->company->name ?? '-' }}</td>

                        <td>

                            <a href="{{ route('superadmin.admin.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('superadmin.admin.destroy', $user->id) }}" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            No Admin Found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        {{ $admin->links() }}

    </div>

@endsection
