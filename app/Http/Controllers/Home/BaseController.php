<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    /**
     * @param string|array $data
     * @param string       $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function successJson( string|array $data = [], string $message = 'success' ):JsonResponse
    {
        $returnJsonData = [
            'code' => 200,
            'msg' => $message,
            'data' => $data
        ];
        if(is_string($data)){
            $returnJsonData['msg'] = $data;
            unset($returnJsonData['data']);
        }
        return response()->json($returnJsonData,200);
    }

    /**
     * @param string|array $data
     * @param string       $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorJson( string|array $data = [], string $message = 'error' ):JsonResponse
    {
        $returnJsonData = [
            'code' => 400,
            'msg' => $message,
            'data' => $data
        ];
        if(is_string($data)){
            $returnJsonData['msg'] = $data;
            unset($returnJsonData['data']);
        }
        return response()->json($returnJsonData,200);
    }
}
