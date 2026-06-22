@extends('common.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        <div class="row g-4">
            <h1 class="text-success mb-5">Welcome Back, {{ $user->name }}</h1>
            @if ($projects->isempty())
                <div class="alert alert-danger">
                    <ul>
                        <li>You don't have any projects now.</li>
                    </ul>
                </div>
            @else
                @foreach ($projects as $project)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ $project->description }}</p>
                                <a href="{{ route('show-project', $project->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('show-edit-project', $project->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('delete-project', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mt-3">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
