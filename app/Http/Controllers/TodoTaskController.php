<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoTaskRequest;
use App\Http\Resources\TodoTaskResource;
use App\Models\TodoTask;

class TodoTaskController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\TodoTask $todoTask
     * @param \App\Http\Requests\TodoTaskRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(TodoTask $todoTask, TodoTaskRequest $request)
    {
        $input = $request->validated();

        $todoTask->fill($input);
        $todoTask->save();

        return new TodoTaskResource($todoTask);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TodoTask $todoTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoTask $todoTask)
    {
        $todoTask->delete();
    }
}
