@extends('admin.master')
@section('title', 'Update')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.Update') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.quotes.index') }}">All Quotes</a>
    </div>
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
    <form action="{{ route('admin.quotes.update', $quote->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Quote</label>
            <input value="{{ old('quote', $quote->quote) }}" type="text" name="quote"
                class="form-control @error('quote')
            is-invalid
            @enderror" placeholder="Quote"
                value="{{ old('quote') }}">
            @error('quote')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Who Said</label>
            <input value="{{ old('who_said', $quote->who_said) }}" type="text" name="who_said"
                class="form-control @error('who_said')
            is-invalid
            @enderror" placeholder="Who Said"
                value="{{ old('who_said') }}">
            @error('who_said')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-success btn-lg px-5 mt-4">Update</button>
    </form>
@stop
