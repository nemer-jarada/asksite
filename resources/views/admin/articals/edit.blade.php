@extends('admin.master')
@section('title', 'Edit Artical')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.Edit') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.articals.index') }}">All Articals</a>
    </div>
    <form action="{{ route('admin.articals.update', $artical->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Title</label>
            <input value="{{ old('title', $artical->title) }}" type="text" name="title"
                class="form-control @error('title')
            is-invalid
            @enderror" placeholder="Title"
                value="{{ old('title') }}">
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Artical</label>
            <textarea class="form-control @error('artical')is-invalid
                @enderror" placeholder="Artical"
                value="{{ old('artical') }}" name="artical" id="artical" cols="20" rows="15">{{ old('artical', $artical->artical) }}</textarea>
            @error('artical')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
            <img class="mt-2" width="80" src="{{ asset('uploads/images/articals/' . $artical->image) }}"
                alt="">
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Parent Category</label>
            <select name="catartical_id" id="" class="form-control">
                <option disabled selected>-- Select --</option>
                @foreach ($catarticals as $catartical)
                    <option {{ $artical->catartical->id == $catartical->id ? 'selected' : '' }}
                        value="{{ $catartical->id }}">{{ $catartical->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success btn-lg px-5 mt-4">Update</button>
    </form>
@stop
