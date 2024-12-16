<div>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks</h1>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>

        <div class="mt-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->assignee->name }}</td>
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

</div>
