<?php

namespace App\Services;

use App\interfaces\ProductRepositoryInterface;
use App\Libraries\ConversionLibrary;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\Library;

class NumberService
{
    /**
     * Convert Word to number.
     *
     * @param object $word
     * @return int
     */
    public function getNumber(object $words)
    {
        $validated = $words->safe()->only(['words']);
        return ConversionLibrary::convertToNumber($validated['words']);
    }
}