<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        // Fetch all teams
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        // Validate and store the team
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::id(), // Set the creator as the logged-in user
            'user_id' => Auth::id(), // Assign the user_id to the logged-in user
        ]);
        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        // Validate and update the team
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $team->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    public function destroy(Team $team)
    {
        // Only allow deletion if the logged-in user is an admin
        if (Auth::user()->role === 'Admin') {
            $team->delete();
            return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
        }

        return redirect()->route('teams.index')->with('error', 'You do not have permission to delete teams.');
    }
}
