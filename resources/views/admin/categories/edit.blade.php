@extends('admin.master')
@section('title', 'Edit Category')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.Add New') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.categories.index') }}">All Categories</a>
    </div>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"
                class="form-control @error('name')
            is-invalid
            @enderror" placeholder="Name"
                value="{{ old('name', $category->name) }}">
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
            <img width="80" src="{{ asset('uploads/images/categories/' . $category->image) }}" alt="">
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success btn-lg px-5 mt-4">Update</button>
    </form>
@stop
