<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

    public function index()
    {
        $tasks = Task::with('user')->where('completed', false)->orderBy('due_date')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }
    
    public function store(TaskRequest $request)
    {
        Task::create(array_merge(
            $request->validated(), 
            [
                'user_id' => auth()->user()->id
            ]
        ));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        // Check if the authenticated user is the owner of the task
        if (auth()->user()->id !== $task->user_id) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        // Check if the authenticated user is the owner of the task
        if (auth()->user()->id !== $task->user_id) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task');
        }

        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        // Check if the authenticated user is the owner of the task
        if (auth()->user()->id !== $task->user_id) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to delete this task');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function complete(Task $task)
    {
        // Check if the authenticated user is the owner of the task
        if (auth()->user()->id !== $task->user_id) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task');
        }

        $task->update([
            'completed' => true,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task Completed successfully');
    }

    public function showComplete()
    {
        $completedTasks = Task::where('completed', true)->get();
        return view('tasks.taskshow', compact('completedTasks'));
    }
}
