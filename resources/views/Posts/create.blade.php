@extends('components.main')
@section('title')
    add New Task
@endsection()
@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('store') }}">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" value="{{ old('desc') }}" name="desc" class="form-control" id="description">
                @error('desc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>
@endsection
