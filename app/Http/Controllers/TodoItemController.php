<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoItemRequest;
use App\Http\Requests\UpdateTodoItemRequest;
use App\Models\TodoItem;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todoItems = auth()->user()->todoItems()->get();

        return inertia("TodoApp", ['todos' => $todoItems]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoItemRequest $request)
    {
        $user = auth()->user();

        $todoItem = new TodoItem();
        $todoItem->title = $request->title;
        $todoItem->user_id = $user->id;
        $todoItem->is_completed = false;
        $todoItem->save();

        return to_route('todos.index');
    }

    public function toggle(TodoItem $todo)
    {
        if (auth()->user()->cannot('toggle', $todo)) {
            return abort(404);
        }

        $todo->is_completed = !$todo->is_completed;
        $todo->save();

        return to_route('todos.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoItemRequest $request, TodoItem $todo)
    {
        if (auth()->user()->cannot('update', $todo)) {
            return abort(404);
        }

        $todo->title = $request->title;
        $todo->save();

        return to_route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoItem $todo)
    {
        $todo->delete();
    }
}
