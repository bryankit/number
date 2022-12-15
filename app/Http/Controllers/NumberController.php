<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\NumberValidationRequest;
use App\Http\Requests\WordValidationRequest;
use App\Services\NumberService;

class NumberController extends Controller
{
    public function __construct(private NumberService $numberService){}

    /**
     * Convert the number words to number.
     *
     * @param  WordValidationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNumber(WordValidationRequest $request) : JsonResponse
    {
        return response()->json($this->numberService->getNumber($request));       
    }

    /**
     * Convert the number to words.
     *
     * @param  NumberValidationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWord(NumberValidationRequest $request) : JsonResponse
    {
        return response()->json($this->numberService->getWord($request));       
    }
}
