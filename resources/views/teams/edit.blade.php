<div>
<!-- resources/views/teams/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Team</h2>
    
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

    <!-- Edit Team Form -->
    <form action="{{ route('teams.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This is required for PUT/PATCH requests -->

        <div class="mb-3">
            <label for="name" class="form-label">Team Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $team->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $team->description) }}</textarea>
        </div>

        <!-- <div class="mb-3">
            <label for="created_by" class="form-label">Created By</label>
            <input type="hidden" class="form-control" id="created_by" name="created_by" value="{{ $team->created_by }}" disabled>
        </div> -->

        <button type="submit" class="btn btn-primary">Update Team</button>
    </form>
</div>
@endsection
</div>
