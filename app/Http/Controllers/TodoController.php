<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:4|string',
            'description' => 'required|min:4|max:150|string'
        ]);

        $todo = Todo::create([
            'name' => $request->title,
            'description' => $request->description
        ]);

        if ($todo) {
            return redirect()->route('todos.index')->with('success', 'Todo created sucessfully!');
        }
        return redirect()->route('todos.index')->with('error', 'Unable to create Todo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:4|string',
            'description' => 'required|min:4|max:150|string',
            'completed' => 'required|boolean'
        ]);

        $todo = Todo::create([
            'name' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->completed
        ]);

        $todo = Todo::find($id);
        if ($todo) {
            $todo->name = $request->title;
            $todo->description = $request->description;
            $todo->is_completed = $request->completed;
            $todo->save();
            return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
        }
        return redirect()->route('todos.index')->with('error', 'Unable to update Todo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
            return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
        }
        return redirect()->route('todos.index')->with('error', 'Unable to delete Todo!');
    }
}
