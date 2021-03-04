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
    }

    public function create(Request $request)
    {
        $title = $request->input('title');
        $category_id = $request->input('categoryId');

        $task = new Task ;
        $task->title = $title;
        $task->category_id = '$category_id' ;
        if($task->save()){
            return $this->sendJsonResponse($task, 201);
        } else {
            abort(500, 'Internal Server Error');
        }
    }


    // public function item($taskId)
    // {
    //     //$taskId est un string, on le converti donc en int
    //     $taskId = intval($taskId);


    //     if(array_key_exists($taskId, $categoriesList)){
    //         $task = $categoriesList[$taskId];
    //         return response()->json($task);
    //     } else{
    //         // J'affiche une 404
    //         abort(404);
    //     }


    // }

    //
}
