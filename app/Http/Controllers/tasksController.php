<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\task;
use App\Http\Controllers\DB;

class tasksController extends Controller
{
    public function taskList() {
        //$tasks = task::all();
        //未完了のタスク一覧を表示
        $taskList = task::latest('published_at')->where('check', 0)->get();
        //完了済みのタスク一覧を表示
        $doneList = task::latest('published_at')->where('check', 1)->get();
        return view('tasks.index', compact('taskList','doneList'));
    }

    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect('tasks/index');
    }

    public function check($id, Request $request) {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect('tasks/index');
    }

    public function delete($id) {
        Task::destroy($id);
        return redirect('tasks/index');
    }
}
