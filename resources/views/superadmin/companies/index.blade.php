@extends('layouts.app')

@section('title', 'Companies')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Companies</h2>

        <a href="{{ route('superadmin.companies.create') }}" class="btn btn-primary">
            + Add Company
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($companies as $company)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->phone }}</td>

                    <td>

                        <a href="{{ route('superadmin.companies.edit', $company->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('superadmin.companies.destroy', $company->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center">
                        No Companies Found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    {{ $companies->links() }}

</div>

@endsection