@extends('common.app')
@section('title', 'Edit Task')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto  bg-secondary rounded p-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1 class="text-center text-light">Edit Task</h1>
                <form action="{{ route('do-edit-task', $task->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light" for="email">Task Title</label>
                        <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Update Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection
