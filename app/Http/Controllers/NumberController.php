<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\NumberValidationRequest;
use App\Services\NumberService;

class NumberController extends Controller
{
    public function __construct(private NumberService $numberService){}

    /**
     * Convert the number words to number.
     *
     * @param  NumberValidationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNumber(NumberValidationRequest $request) : JsonResponse
    {
        return response()->json($this->numberService->getNumber($request));       
    }
}
