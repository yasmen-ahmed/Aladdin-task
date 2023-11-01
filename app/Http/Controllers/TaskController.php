<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
   
        public function index()
        {
            $tasks = Task::where('completed', false)->orderBy('due_date')->get();
            return view('tasks.index', compact('tasks'));
        }

        public function create()
        {
            return view('tasks.create');
        }

        
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'due_date' => 'nullable|max:255',
    ]);

    $user = Auth::user();

    $task = new Task([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
    ]);

    // $user->tasks()->save($task);
    $task->user()->associate($user);
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task created successfully');
}

        public function edit(Task $task)
        {
             // Get the authenticated user
             $user = auth()->user();

             // Check if the authenticated user is the owner of the task
             if ($user->id !== $task->user_id) {
                return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task');
             }
            return view('tasks.edit',compact('task'));
        }


        public function update(Request $request, Task $task)
            {
                $request->validate([
                    'title' => 'required|max:255',
                    'description' => 'nullable',
                    'due_date' => 'nullable|max:255',
                ]);

                // Get the authenticated user
                $user = auth()->user();

                // Check if the authenticated user is the owner of the task
                if ($user->id !== $task->user_id) {
                    return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task');
                }

                $task->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'due_date' => $request->due_date,
                ]);

                return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
            }

        public function destroy(Task $task)
        {
            
                // Get the authenticated user
                $user = auth()->user();

                // Check if the authenticated user is the owner of the task
                if ($user->id !== $task->user_id) {
                    return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task');
                }

            $task->delete();
         return redirect()->route('tasks.index')->with('success','Task deleted successfully');
        }


        public function complete(Task $task)
        {
            
                // Get the authenticated user
                $user = auth()->user();

                // Check if the authenticated user is the owner of the task
                if ($user->id !== $task->user_id) {
                    return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task');
                }

            $task->update([
                'completed'=>true,
            ]);
            return redirect()->route('tasks.index')->with('success','Task Completed successfully');
        }

        
        public function showComplete()
        {
            $completedTasks =Task::where (
                'completed',true)->get();
            return view('tasks.taskshow',compact('completedTasks'));
        }
}
