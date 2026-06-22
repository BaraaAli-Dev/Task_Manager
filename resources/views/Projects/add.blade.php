@extends('common.app')
@section('title', 'Add Project')

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

                <h1 class="text-center text-light">Add New Project</h1>
                <form action="{{ route('add-project') }}" method="POST">
                    @csrf
                    <input name="user_id" type="hidden" value="{{ $user->id }}">
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light" for="email">Project Title</label>
                        <input type="name" name="title" value="{{ old('title') }}" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light" for="email">Project Description</label>
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="Leave a comment here">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
