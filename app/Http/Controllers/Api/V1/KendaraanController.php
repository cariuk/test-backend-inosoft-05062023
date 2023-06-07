<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CustomResponse;
use App\Repositories\KendaraanRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    function __construct(
        protected KendaraanRepository $kendaraanRepository
    )
    {

    }

    function get(Request $request): JsonResponse
    {
        $request->validate([
            'tipe' => 'required|in:mobil,motor',
        ]);

        $collection = $this->kendaraanRepository->getList($request,true);

        return CustomResponse::withPagination($collection->items(), $collection);
    }
}
