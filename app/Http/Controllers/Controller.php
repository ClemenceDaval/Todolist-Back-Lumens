<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{


    protected function sendJsonResponse($data, $httpStatusCode)
    {
        return response()->json($data, $httpStatusCode);

    }

    /**
     * Provide a centralized empty response, with httpStatusCode, to all Controllers
     *
     * @param integer $httpStatusCode
     */
    protected function sendEmptyResponse($httpStatusCode = 200)
    {
        return response()->json('', $httpStatusCode);
    }



}
