@extends('common.app')
@section('title', 'Edit Product')

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

                <h1 class="text-center text-light">Edit Project</h1>
                <form action="{{ route('edit-project', $project->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light" for="email">Project Title</label>
                        <input type="name" name="title" value="{{ $project->title }}" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light" for="email">Project Description</label>
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="Leave a comment here">{{ $project->description }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Update Project</button>
                </form>
            </div>
        </div>
    </div>
@endsection
