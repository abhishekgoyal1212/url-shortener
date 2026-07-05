@extends('layouts.app')

@section('title', 'Create Short URL')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Create Short URL</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('short-urls.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Original URL
                </label>

                <input
                    type="url"
                    name="original_url"
                    value="{{ old('original_url') }}"
                    class="form-control @error('original_url') is-invalid @enderror">

                @error('original_url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button class="btn btn-primary">
                Save
            </button>

            <a href="{{ route('short-urls.index') }}"
                class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

@endsection