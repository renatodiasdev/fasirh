<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function tasks()
    {
      return view('tasks', [
          'tasks' => Task::orderBy('created_at', 'asc')->get()
      ]);
    }

    public function task(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
      ]);

      $task = new Task;
      $task->name = $request->name;
      $task->save();

      return redirect('/tasks');
    }

    public function taskdelete($id)
    {
      Task::findOrFail($id)->delete();

      return redirect('/tasks');
    }
}
