@extends('admin.master')
@section('title', 'All Categories')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.All Categories') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.categories.create') }}">Add New Category</a>
    </div>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr class="bg-dark text-white">
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img width="80" src="{{ asset('uploads/images/categories/' . $category->image) }}"
                            alt=""></td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('admin.categories.edit', $category->id) }}"><i
                                class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?!')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endforelse

        </tbody>
    </table>
@stop
