@extends('admin.master')
@section('title', 'Edit Category')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.Add New') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.categories.index') }}">All Categories</a>
    </div>
    <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">

            <!-- alert -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <label>Question</label>
            <input type="text" name="question"
                class="form-control @error('question')
            is-invalid
            @enderror" placeholder="Question"
                value="{{ old('question', $question->question) }}">
            @error('question')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>More Details</label>
            <textarea class="form-control @error('more_detail')is-invalid
                @enderror" placeholder="More Details"
                name="more_detail" id="question" cols="20" rows="5">{{ old('more_detail', $question->more_detail) }}</textarea>
            @error('more_detail')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Parent Category</label>
            <select name="category_id" id="" class="form-control">
                <option disabled selected>-- Select --</option>
                @foreach ($categories as $categry)
                    <option value="{{ $categry->id }}" {{ $question->category_id == $categry->id ? 'selected' : '' }}>
                        {{ $categry->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success btn-lg px-5 mt-4">Update</button>
    </form>
@stop
