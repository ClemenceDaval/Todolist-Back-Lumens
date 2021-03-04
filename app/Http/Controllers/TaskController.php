<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function list()
    {
        $tasksList = Task::all();

        return $this->sendJsonResponse($tasksList, 200);
        //dump($this->sendJsonResponse($tasksList, 200));

    }

    public function item($taskId)
    {
        $taskId = intval($taskId);

        if ($task = Task::find($taskId)) {
            return $this->sendJsonResponse($task, 200);
        } else {
            return $this->sendEmptyResponse(404);
        }
    }


    public function create(Request $request)
    {
        $title = $request->input('title');
        $category_id = $request->input('categoryId');

        $task = new Task ;
        $task->title = $title;
        $task->category_id = $category_id ;

        if($task->save()){
            return $this->sendJsonResponse($task, 201);
        } else {
            return $this->sendEmptyResponse(500);
        }
    }

    public function updatePut(Request $request, $taskId)
    {

        $taskId = intval($taskId);

        if($task = Task::find($taskId)){

            if ($request->has(['title', 'categoryId', 'completion', 'status'])){

                $input = $request->all();

                $task->title = $input['title'];
                $task->category_id = $input['categoryId'] ;
                $task->completion = $input['completion'];
                $task->status = $input['status'] ;

                if($task->update()){
                    return $this->sendEmptyResponse(200);
                } else {
                    return $this->sendEmptyResponse(500);
                }
            } else {
                return $this->sendEmptyResponse(400);
            }

        } else {
            return $this->sendEmptyResponse(404);
        }

    }

    public function updatePatch(Request $request, $taskId){
        $taskId = intval($taskId);

        if($task = Task::find($taskId)){

            if ($request->has('title') || $request->has('categoryId') || $request->has('completion') || $request->has('status') ){

                if ($request->has('title')){
                    $title = $request->input('title');
                    $task->title = $title;
                }

                if ($request->has('categoryId')){
                    $categoryId = $request->input('categoryId');
                    $task->categoryId = $categoryId;
                }

                if ($request->has('completion')){
                    $completion = $request->input('completion');
                    $task->completion = $completion;
                }

                if ($request->has('status')){
                    $status = $request->input('status');
                    $task->status = $status;
                }

                if($task->update()){
                    return $this->sendEmptyResponse(200);
                } else {
                    return $this->sendEmptyResponse(500);
                }
            } else {
                return $this->sendEmptyResponse(400);
            }

        } else {
            return $this->sendEmptyResponse(404);
        }

    }
}
