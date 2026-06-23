@extends('common.app')
@section('title', 'Project')

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
            <form action="{{ route('show-add-task', $project->id) }}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit">Add New Task</button>
            </form>
            @if ($tasks->isempty())
                <div class="alert alert-danger">
                    <ul>
                        <li>You don't have any Tasks now.</li>
                    </ul>
                </div>
            @else
                <table class="table bordered">
                    <thead>
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col">Task Statue</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    <select class="form-control" name="statue">
                                        <option value="pending" {{ $task->statue == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="in-progress" {{ $task->statue == 'in-progress' ? 'selected' : '' }}>
                                            In Progress</option>
                                        <option value="completed" {{ $task->statue == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary mt-2">Update</button>
                                </td>
                                <td>
                                    <form action="{{ route('edit-task', $task->id) }}">
                                        <button class="btn btn-sm btn-success">Edit</button>
                                    </form>
                                    <form action="{{ route('delete-task', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mt-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
