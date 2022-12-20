@extends('admin.master')
@section('title', 'All articals')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.All articals') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.articals.create') }}">Add New Artical</a>
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
                <th>Title</th>
                <th>Artical</th>
                <th>Image</th>
                <th>Views</th>
                <th>Catartical</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articals as $artical)
                <tr>
                    <td>{{ $artical->id }}</td>
                    <td>{{ Str::words($artical->title, '5') }}</td>
                    <td>{{ Str::words($artical->artical, '5') }}</td>
                    <td><img width="80" src="{{ asset('uploads/images/articals/' . $artical->image) }}" alt="">
                    </td>
                    <td>{{ $artical->views }}</td>
                    <td>{{ $artical->catartical->name }}</td>
                    <td>{{ $artical->created_at->diffForHumans() }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('admin.articals.edit', $artical->id) }}"><i
                                class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.articals.destroy', $artical->id) }}" method="post">
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
                    <td colspan="8" class="text-center">No Data Found</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{ $articals->links() }}
@stop
