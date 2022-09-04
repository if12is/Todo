<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }
    public function store()
    {
        $attr = request()->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        Todo::create($attr);
        return redirect('/');
    }
    // Update The tasks listed done
    public function update($id)
    {

        $todo = Todo::find($id);
        $todo->isDone = true;
        $todo->save();
        return redirect('/');

        // return $todo;
        // $todo = Todo::findOrFail($id);
        // $todo->update(['isDone' => true]);
        // $todo->save();
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }
}
