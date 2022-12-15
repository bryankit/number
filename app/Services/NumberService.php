<?php

namespace App\Services;

use App\interfaces\ProductRepositoryInterface;
use App\Libraries\ConversionLibrary;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\Library;

class NumberService
{
    /**
     * Convert Word to number.
     *
     * @param object $word
     * @return array
     */
    public function getNumber(object $words) : array
    {
        $validated = $words->safe()->only(['words']);
        $result = ConversionLibrary::convertToNumber($validated['words']);
        if(is_string($result) === true) {
            return ['errors' => true, 'message' => $result];
        }
        return ['errors' => false, 'data' => $result];
    }

    /**
     * Convert number to Word.
     *
     * @param object $number
     * @return array
     */
    public function getWord(object $number) : array
    {
        $validated = $number->safe()->only(['number']);
        $result = ConversionLibrary::convertToWord($validated['number']);
        return ['errors' => false, 'data' => $result];
    }
}