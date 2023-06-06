<?php
namespace App\Http\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use stdClass;

class CustomResponse
{
    static function json($data = null, $meta = [], $other = [], $description = "Success", $status = Response::HTTP_OK): JsonResponse
    {
        return ApiResponse($data, $meta, $other, $description, $status);
    }

    static function created($data = null): JsonResponse
    {
        return ApiResponse($data, $meta = [], $other = [], $description = "Success", Response::HTTP_CREATED);
    }

    static function deleted($description = "Success"): JsonResponse
    {
        return ApiResponse(null, $meta = [], $other = [], $description, Response::HTTP_OK);
    }

    static function validationError($message, $errors): JsonResponse
    {
        $newError = [];
        $errorMessage = [];
        foreach ($errors as $key => $value) {
            $newError[Str::camel($key)] = $value;
            foreach ($value as $err) {
                $errorMessage[] = $err;
            }
        }
//        $message .= implode(' ',$errorMessage);
        return ApiResponse(null, [
            "errors" => $newError
        ], [], $message, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    static function messageOnly($message = "", $status = Response::HTTP_OK): JsonResponse
    {
        return ApiResponse(null, [], [], $message, $status);
    }

    static function devOnly($dev = []): JsonResponse
    {
        return ApiResponse(null, [], [
            'dev' => $dev
        ]);
    }

    static function error($description = "Error", $status = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return ApiResponse(null, [], [], $description, $status);
    }

    static function withPagination($data, LengthAwarePaginator $pageInfo): JsonResponse
    {
        $count = is_array($data) ? count($data) : $data->count();
        $from = $count ? ($pageInfo->currentPage() - 1) * $pageInfo->perPage() + 1 : 0;
        $to = $count ? $from + $count - 1 : 0;
        return ApiResponse($data, [], [
            'page' => [
                'totalItem' => $pageInfo->total(),
                'currentPage' => $pageInfo->currentPage(),
                'lastPage' => $pageInfo->lastPage(),
                'perPage' => (int)$pageInfo->perPage(),
                'from' => $from,
                'to' => $to,
            ]
        ]);
    }

    static function convertKeysToCamelCase($data)
    {
        if (is_object($data)) {
            $newData = new stdClass();
            foreach ($data as $key => $value) {
                $newKey = Str::camel($key);
                $newData->$newKey = self::convertKeysToCamelCase($value);
            }
            return $newData;
        } elseif (is_array($data)) {
            $newData = array();
            foreach ($data as $key => $value) {
                $newKey = Str::camel($key);
                $newData[$newKey] = self::convertKeysToCamelCase($value);
            }
            return $newData;
        } else {
            return $data;
        }
    }

}
