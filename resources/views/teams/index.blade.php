<div>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Teams</h1>

        <a href="{{ route('teams.create') }}" class="btn btn-primary">Create Team</a>

        <div class="mt-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->description }}</td>
                            <td>
                                <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
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
