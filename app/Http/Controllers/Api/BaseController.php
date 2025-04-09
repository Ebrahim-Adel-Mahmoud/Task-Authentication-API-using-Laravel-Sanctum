<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    public function success( $data = new \stdClass(), string $message = '', int $code =  Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public function error(string $message = '', int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }

    public function unauthenticatedError(): JsonResponse
    {
        return response()->json(
            [
                'message' => 'invalid credentials'

            ],
            Response::HTTP_UNAUTHORIZED
        );
    }

    public function notFoundError(): JsonResponse
    {
        return response()->json(
            [
                'message' => 'Not Found'

            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
