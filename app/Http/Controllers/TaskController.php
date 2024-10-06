<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Task::all() not needed since paginate is being used
        // 1ST= $tasks = Task::all().2ND= $tasks = Task::paginate(2);

        $tasks = Task::orderBy('priority', 'asc')->paginate(2);

        return view('welcome',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'integer|required|in:1,2,3'
        ]);
        // dd($response);

        Task::create($response);
        return redirect()->route('tasks.index')->with('success', 'Task Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        // associate array, where 'task' is the key and $task the value
        return view('show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        if ($request->has('completed')) {
            // Check if the task's completion status is being changed
            $previousStatus = $task->completed;
            $task->completed = !$task->completed;
            $task->save();

            if ($task->completed) {
                return redirect()->route('tasks.index')->with('success', 'Task status updated');
            } else {
                return redirect()->route('tasks.index')->with('error', 'Task status not updated');
            }
        }

        $response = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
        ]);


        $task->update($response);

        return redirect()->route('tasks.index')->with('success', 'Task updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    // public function toggleComplete(string $id)
    // {
    //     $task = Task::findOrFail($id);
    //     $task->completed = !$task->completed;
    //     $task->save();

    //     return redirect()->route('tasks.index')->with('success', 'Task status updated');
    // }
}
