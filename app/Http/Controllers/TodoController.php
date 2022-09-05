<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Requests\TodoTaskRequest;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Http\Resources\TodoTaskResource;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TodoCollection(Todo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $input = $request->validated();
        $todo = Todo::create($input);

        return new TodoResource($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        $todo->load('tasks');
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Todo $todo
     * @param  \App\Http\Requests\TodoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Todo $todo, TodoRequest $request)
    {
        $input = $request->validated();

        $todo->fill($input);
        $todo->save();

        return new TodoResource($todo->fresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     * @param \App\Http\Requests\TodoTaskRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addTask(Todo $todo, TodoTaskRequest $request)
    {
        $input = $request->validated();
        $todoTask = $todo->tasks()->create($input);

        return new TodoTaskResource($todoTask);
    }
}
