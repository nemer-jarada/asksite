@extends('admin.master')
@section('title', 'Add New')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.Add New') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.categories.index') }}">All Categories</a>
    </div>
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"
                class="form-control @error('name')
            is-invalid
            @enderror" placeholder="Name"
                value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"
                class="form-control @error('image')
            is-invalid
            @enderror">
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success btn-lg px-5 mt-4">Add</button>
    </form>
@stop
