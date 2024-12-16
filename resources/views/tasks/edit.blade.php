<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>

    <!-- Display errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Task Form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This is required for PUT/PATCH requests -->

        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>To Do</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="assigned_to" class="form-label">Assign User</label>
            <select class="form-control" id="assigned_to" name="assigned_to" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection
