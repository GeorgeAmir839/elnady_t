<?php

namespace App\Traits;

use Illuminate\Support\Facades\Response;

trait ApiResponse
{
    public function apiResponse($data = null, $message = null, $statusCode = 200)
    {

        $response =
            [
                'data'    => $data,
                'message' => $message,
                'status'  => true,
            ];

        return Response::json($response, $statusCode);
    }
    public function sendError($error = null, $errorMessages = [], $statusCode = 404)
    {
    	$response = [
            'data'    => $error,
            'error message' => $errorMessages,
            'status'  => false,
        ];
      
        return Response::json($response, $statusCode);
    }
}
