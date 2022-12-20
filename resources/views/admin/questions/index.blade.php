@extends('admin.master')
@section('title', 'All questions')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.All questions') }}</h1>
        <a class="btn btn-outline-dark" href="{{ route('admin.questions.create') }}">Add New question</a>
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
                <th>Question</th>
                <th>More Detail</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ Str::words($question->question, '7') }}</td>
                    <td>{{ Str::words($question->more_detail, '7') }}</td>
                    <td>{{ $question->category->name }}</td>
                    <td>{{ $question->created_at->diffForHumans() }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('admin.questions.edit', $question->id) }}"><i
                                class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.questions.destroy', $question->id) }}"
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
                    <td colspan="3" class="text-center">No Data Found</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{ $questions->links() }}
@stop
