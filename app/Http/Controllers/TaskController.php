<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuickTaskRequest;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function index ()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('tasks', compact('tasks'));
    }

    public function store (QuickTaskRequest $request)
    {
        $tasks = new Task;
        $tasks->create($request->all());

        return redirect()->action('TaskController@index')->with(['message' => trans('message.add')]);
    }

    public function show ($id)
    {
        $tasks = Task::findOrFail($id);
        try {
            $tasks->delete();

            return redirect()->action('TaskController@index')->with(['message' => trans('message.message_del')]);
        } catch (Exception $e) {
            return redirect()->action('TaskController@index')->with(['message' => trans('message.message_del_false')]);
        }
    }
}

