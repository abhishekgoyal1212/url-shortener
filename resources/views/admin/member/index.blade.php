@extends('layouts.app')

@section('title', 'Members')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Members</h2>

        <a href="{{ route('admin.members.create') }}" class="btn btn-primary">
            + Add Member
        </a>

    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($members as $member)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $member->name }}</td>

                    <td>{{ $member->email }}</td>

                    <td>

                        <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.members.destroy', $member) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this member?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        No Members Found
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

    {{ $members->links() }}

@endsection
