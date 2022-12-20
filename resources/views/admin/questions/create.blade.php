@extends('admin.master')
@section('title', 'Add New')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.Add New') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.questions.index') }}">All Questions</a>
    </div>
    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf
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
                class="form-control @error('name')
            is-invalid
            @enderror" placeholder="Question"
                value="{{ old('question') }}">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>More Details</label>
            <textarea class="form-control @error('name')is-invalid
                @enderror" placeholder="More Details"
                value="{{ old('more_detail') }}" name="more_detail" id="question" cols="20" rows="5"></textarea>
            @error('more_detail')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Parent Category</label>
            <select name="category_id" id="" class="form-control">
                <option disabled selected>-- Select --</option>
                @foreach ($categories as $categry)
                    <option value="{{ $categry->id }}">{{ $categry->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success btn-lg px-5 mt-4">Add</button>
    </form>
@stop
