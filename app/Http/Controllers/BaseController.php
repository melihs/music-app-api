<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $code)
    {
        $response = [
            'data'          => $result,
            'code'          => $code,
            'errorMessage'  => $message,
        ];
        return response()->json($response, $code);
    }
}
