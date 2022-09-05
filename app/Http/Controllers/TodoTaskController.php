<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoTaskRequest;
use App\Http\Resources\TodoTaskResource;
use App\Models\TodoTask;
use Illuminate\Http\Request;

class TodoTaskController extends Controller
{
    public function update(TodoTask $todoTask, TodoTaskRequest $request)
    {
        $input = $request->validated();

        $todoTask->fill($input);
        $todoTask->save();

        return new TodoTaskResource($todoTask);
    }

    public function destroy(TodoTask $todoTask)
    {
        $todoTask->delete();
    }
}
