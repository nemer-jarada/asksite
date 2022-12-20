@extends('admin.master')
@section('title', 'All answers')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">{{ __('site.All answers') }}</h1>
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
                <th>answers</th>
                <th>user</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($answers as $answer)
                <tr>
                    <td>{{ $answer->id }}</td>
                    <td>{{ Str::words($answer->answer, '7') }}</td>
                    <td>{{ $answer->user->name }}</td>
                    <td>{{ $answer->created_at->diffForHumans() }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('admin.answers.destroy', $answer->id) }}" method="post">
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
    {{ $answers->links() }}
@stop
