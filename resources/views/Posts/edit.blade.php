@extends('components.main')
@section('title')
    Edit Task
@endsection()
@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('update', ['id' => $posts->id]) }}">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Edit Task Title</label>
                <input type="text" value="{{ old('title', $posts->title) }}" name="title" class="form-control"
                    id="title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Edit Description</label>
                <input type="text" value="{{ old('desc', $posts->description) }}" name="desc" class="form-control"
                    id="description">
                @error('desc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Task</button>
        </form>
    </div>
@endsection
