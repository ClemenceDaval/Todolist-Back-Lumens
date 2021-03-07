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
        $tasksList = Task::all()->load('category');
        //return response()->json($categoriesList, 200);
        return $this->sendJsonResponse($tasksList, 200);
        //dump($categoriesList);

    }

    public function add(Request $request)
    {
        /* Voici le JSON transmis dans le corps de la requête TEST d'Insomnia
        {
            "title": "Mettre en place l'API TodoList",
            "categoryId": 3,
            "completion": 0,
            "status": 1
        }
        */
        //$request->input est l'équivalent plus poussé de filter_input()
        $title = $request->input('title');
        $categoryId = $request->input('categoryId');
        $completion = $request->input('completion');
        $status = $request->input('status');

       // dump($title);

        // on ajoute une verification sur les données envoyées
        if(!empty($title) && !empty($categoryId)){
            $newTask = new Task();
            // on met a jour les propriétés du nouvel objet vide
            $newTask->title = $title;
            $newTask->category_id = $categoryId;
            $newTask->completion = $completion;
            $newTask->status = $status;

            $isInserted = $newTask->save();

            // si l'ajout a fonctionné
            if($isInserted) {
                // ALorts retourner un code réponse HTTP 201 "Created"
                // https://restfulapi.net/http-methods/#post
                // et les données de la tâche créé en JSON
                return $this->sendJsonResponse($newTask, 201);
            } else {
                // Sinon retourner un code réponse HTTP 500 "Internal Server Error"
                // https://restfulapi.net/http-status-codes/
                // sans body (pas JSON ni d'HTML)
                return $this->sendEmptyResponse(500);

            }

        } else {// sinon (title vide ou categoryId vide)
            // ALors retourner un code de réponse HTTP 400
            // "Bad Request"
            // https://restfulapi.net/http-status-codes/
            return $this->sendEmptyResponse(400);
            // ou abort(400);

        }

    }

    public function update(Request $request, $taskId)
    {
        // ici on récupérer la tache qui a pour id
        $taskId = intval($taskId);
        $task = Task::find($taskId);

        // si j'ai bien une tache
        if(!empty($task)){

            // et si je suis sur la methode PATCH
            if($request->isMethod('patch')){

                $oneDataAtLeast = false;
                // ici grace a has, je demande si la requete a une entrée 'title'
                if($request->has('title')){
                    $task->title = $request->input('title');
                    $oneDataAtLeast = true;
                }
                if($request->has('categoryId')){
                    $task->category_id = $request->input('categoryId');
                    $oneDataAtLeast = true;
                }
                if($request->has('completion')){
                    $task->completion = $request->input('completion');
                    $oneDataAtLeast = true;
                }
                if($request->has('status')){
                    $task->status = $request->input('status');
                    $oneDataAtLeast = true;
                }

                if(!$oneDataAtLeast){
                    // Si aucune donnée n'a été mis a jour
                    $this->sendEmptyResponse(400);
                    //abort(400);
                }else{
                    // SI AU MOINS UNE DONNEE A ETE MIS A JOUR
                    $isUpdated = $task->save();

                    if($isUpdated){
                        // alors on retourne un code de réponse HTTP 204 "No Content"
                        //return $this->sendEmptyResponse(204);
                        //! OU
                        return $this->sendJsonResponse($task, 200);

                    } else {
                        // alors retourner un code de réponse HTTP 500 "Internal Server Error"
                        // https://restfulapi.net/http-status-codes/
                        // sans body (pas de JSON ni d'HTML)
                        return $this->sendEmptyResponse(500);
                    }


                }


            } else {
                //! SI ON EST SUR PUT
                //! (et donc si on est sur l methode put)
                    if($request->has(['title', 'categoryId', 'completion', 'status'])){
                        $title = $request->input('title');
                        $categoryId = $request->input('categoryId');
                        $completion = $request->input('completion');
                        $status = $request->input('status');
                        // modifier les propriétés de l'obet Task
                        $task->title = $title;
                        $task->category_id = $categoryId;
                        $task->completion = $completion;
                        $task->status = $status;

                        $isUpdated = $task->save();
                    } else {
                        $this->sendEmptyResponse(400);
                    }
                    // Si la modification a fonctionné
                    if($isUpdated){
                        // alors on retourne un code de réponse HTTP 204 "No Content"
                        //return $this->sendEmptyResponse(204);
                        //! OU
                        return $this->sendJsonResponse($task, 200);
                    } else {
                        // alors retourner un code de réponse HTTP 500 "Internal Server Error"
                        // https://restfulapi.net/http-status-codes/
                        // sans body (pas de JSON ni d'HTML)
                        return $this->sendEmptyResponse(500);
                    }

            }


        }else{ // Si il n'existe pas de task ayant pour id $taskId
            return $this->sendEmptyResponse(500);
        }



    }

    public function item($taskId)
    {

    }

    public function delete($taskId)
    {
        // ici on récupérer la tache qui a pour id
        $taskId = intval($taskId);
        $task = Task::find($taskId);

        // si j'ai bien une tache
        if (!empty($task)) {
            $isDeleted = $task->delete();
            if ($isDeleted) {
                $this->sendEmptyResponse(204);
            } else {
                return $this->sendEmptyResponse(500);
            }
        } else {
            return $this->sendEmptyResponse(404);
        }

    }

}
