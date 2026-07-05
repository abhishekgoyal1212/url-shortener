@extends('layouts.app')

@section('title', 'Short URLs')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Short URLs</h2>

        <a href="{{ route('short-urls.create') }}" class="btn btn-primary">
            + Create Short URL
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Original URL</th>
                <th>Short URL</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($shortUrls as $url)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $url->original_url }}</td>

                    <td>
                        <a href="{{ url($url->short_code) }}" target="_blank">
                            {{ url($url->short_code) }}
                        </a>

                        <button type="button" class="btn btn-info btn-sm ms-2"
                            onclick="navigator.clipboard.writeText('{{ url($url->short_code) }}')">
                            Copy
                        </button>
                    </td>

                    <td>
                        <a href="{{ route('short-urls.edit', $url) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('short-urls.destroy', $url) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this URL?')">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No Short URL Found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $shortUrls->links() }}

@endsection
