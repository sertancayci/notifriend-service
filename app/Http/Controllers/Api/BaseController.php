<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //create BaseController for API
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        //create sendResponse function
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        //create response array
        return response()->json($response, 200);
        //return response
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404) {
        //create sendError function
        $response = [
            'success' => false,
            'message' => $error,
        ];
        //create response array
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        //if errorMessages is not empty, add data to response array
        return response()->json($response, $code);
        //return response


    }


}
