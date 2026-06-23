@extends('common.app')
@section('title', 'Add Task')

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

                <h1 class="text-center text-light">Add New Task</h1>
                <form action="{{ route('add-task', $project->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light">Task Title</label>
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
