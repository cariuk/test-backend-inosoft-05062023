<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CustomResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    function get(): JsonResponse
    {
        return CustomResponse::json([]);
    }

    function getPerKendaraan(): JsonResponse
    {
        return CustomResponse::json([]);
    }
}
