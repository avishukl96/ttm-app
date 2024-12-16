<?php
// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show the list of tasks
    public function index()
    {
        // Get all tasks, you can customize this to show tasks based on user roles or teams
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        // Get all users to populate the assign dropdown
        $users = User::all();
        $teams = Team::all(); // Get teams if you want to associate tasks with teams as well

        // Return the create view with users and teams
        return view('tasks.create', compact('users', 'teams'));
    }

    // Store a newly created task in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:todo,in_progress,completed',
            'assigned_to' => 'required|exists:users,id', // Ensure the user exists
            'team_id' => 'nullable|exists:teams,id', // If you're associating tasks with teams
        ]);

        // Create a new task
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'assigned_to' => $request->assigned_to,
            'team_id' => $request->team_id, // Store the team ID if selected
            'created_by' => auth()->id(), // The task creator is the logged-in user
        ]);

        // Redirect back to the tasks list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Show the form for editing a task
    public function edit($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Get all users and teams for task assignment
        $users = User::all();
        $teams = Team::all();

        // Return the edit view with the task, users, and teams
        return view('tasks.edit', compact('task', 'users', 'teams'));
    }

    // Update the specified task in the database
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:todo,in_progress,completed',
            'assigned_to' => 'required|exists:users,id',
            'team_id' => 'nullable|exists:teams,id', // If you're associating tasks with teams
        ]);

        // Find the task by ID
        $task = Task::findOrFail($id);

        // Update the task
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'assigned_to' => $request->assigned_to,
            'team_id' => $request->team_id, // Update the team ID if selected
            'updated_by' => auth()->id(), // Update the task by the logged-in user
        ]);

        // Redirect back to the tasks list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Remove the specified task from the database
    public function destroy($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Delete the task
        $task->delete();

        // Redirect back to the tasks list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
