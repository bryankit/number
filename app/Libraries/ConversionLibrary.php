<?php

namespace App\Libraries;

class ConversionLibrary
{
    /**
     * const NUMBER array
     */
    const ONES = [
        'one'   => 1,
        'two'   => 2,
        'three' => 3,
        'four'  => 4,
        'five'  => 5,
        'six'   => 6,
        'seven' => 7,
        'eight' => 8,
        'nine'  => 9,
    ];

    /**
     * const TENS array
     */
    const TENS = [
        'one'   => 1,
        'two'   => 2,
        'three' => 3,
        'four'  => 4,
        'five'  => 5,
        'six'   => 6,
        'seven' => 7,
        'eight' => 8,
        'nine'  => 9,
        'ten'       => 10,
        'eleven'    => 11,
        'twelve'    => 12,
        'thirteen'  => 13,
        'fourteen'  => 14,
        'fifteen'   => 15,
        'sixteen'   => 16,
        'seventeen' => 17,
        'eighteen'  => 18,
        'nineteen'  => 19,
        'twenty'  => 19
    ];

    /**
     * const OTHERTENS array
     */
    const OTHERTENS = [
        'twenty'   => 20,
        'thirty'   => 30,
        'forty'    => 40,
        'fifty'    => 50,
        'sixty'    => 60,
        'seventy'  => 70,
        'eighty'   => 80,
        'ninety'   => 90,
    ];

    /**
     * const MULTIPLIER array
     */
    const MULTIPLIER = [
        'hundred'   => 100
    ];

    /**
     * Convert To Number
     * @param string $word
     * @return int
     */
    public static function convertToNumber($words)
    {
        $newWord = explode(' ', preg_replace('!\s+!', ' ', $words));
        $maxWord = count($newWord) - 1;
        $currentWord = 0;
        $total = 0;
   
        if($maxWord !== $currentWord) {
            if ($currentWord === 0 && in_array($newWord[$currentWord], array_keys(self::ONES)) && in_array($newWord[1], array_keys(self::MULTIPLIER))) {
                $total = self::ONES[$newWord[$currentWord]];
                $currentWord++;
            } else {
                $total = 'invalid first word : ' . $newWord[$currentWord];
            }
        } elseif ($maxWord === $currentWord) {
            if (in_array($newWord[$currentWord], array_keys(self::TENS))) {
                return self::TENS[$newWord[$currentWord]];
            } else {
                $total = 'invalid  first word : ' . $newWord[$currentWord];
            }
        }

        if($currentWord <= $maxWord) {
            if ($currentWord === 1 && in_array($newWord[$currentWord], array_keys(self::MULTIPLIER))) {
                $total = (int)$total * self::MULTIPLIER[$newWord[$currentWord]];
                $currentWord++;
            } else {
                $total = 'invalid hundreds word : ' . $newWord[$currentWord];
            }
        }

        if($currentWord <= $maxWord) {
            if ($currentWord === 2 && in_array($newWord[$currentWord], array_keys(self::OTHERTENS))) {
                $total = (int)$total + self::OTHERTENS[$newWord[$currentWord]];
                $currentWord++;
            } elseif ($maxWord === $currentWord) {
                if (in_array($newWord[$currentWord], array_keys(self::TENS))) {
                    return (int)$total + self::TENS[$newWord[$currentWord]];
                }
            } else {
                $total = 'invalid third word : ' . $newWord[$currentWord];
            }
        }

        if ($maxWord === $currentWord) {
            if (in_array($newWord[$currentWord], array_keys(self::ONES))) {
                return (int)$total + self::ONES[$newWord[$currentWord]];
            } else {
                $total = 'invalid fourth word : ' . $newWord[$currentWord];
            }
        }
        
        return $total;
    }

    /**
     * Get ones 
     * @param string $word
     * @return int
     */
    public static function getFirstDigit($wordOnes)
    {
        $newWord = explode(' ', $wordOnes);
        
        return $newWord;
    }
}