@extends('common.app')
@section('title', '{{ $project->title }}')

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
            <h1 class="text-success mb-5">{{ $project->title }}</h1>
            <form action="{{ route('show-add-task') }}" method="POST">
                @csrf
                <button type="submit">Add New Task</button>
            </form>
            @if ($tasks->isempty())
                <div class="alert alert-danger">
                    <ul>
                        <li>You don't have any Tasks now.</li>
                    </ul>
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Task</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->statue }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
