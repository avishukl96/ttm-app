<div>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Team</h1>

        <form action="{{ route('teams.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Team Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Team Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Team</button>
        </form>
    </div>
@endsection
</div>
