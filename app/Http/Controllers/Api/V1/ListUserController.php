<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CustomResponse;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    function __construct(
        protected UserRepository $userRepository
    )
    {

    }

    function get(Request $request): JsonResponse
    {
        $collection = $this->userRepository->getList($request, true);

        return CustomResponse::withPagination($collection->items(), $collection);
    }
}
