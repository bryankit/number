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
        'nineteen'  => 19
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
     * const ONESNUMBER array
     */
    const ONESNUMBER = [
        '',
        'one',
        'two' ,
        'three',
        'four',
        'five',
        'six' ,
        'seven',
        'eight',
        'nine',
    ];

    /**
     * const TENSNUMBER array
     */
    const OTHERNUMBER = [
        '',
        'one',
        'two',
        'three',
        'four',
        'five',
        'six',
        'seven',
        'eight',
        'nine',
        'ten',
        'eleven',
        'twelve',
        'thirteen',
        'fourteen',
        'fifteen',
        'sixteen',
        'seventeen',
        'eighteen',
        'nineteen'
    ];

    /**
     * const TENSNUMBER array
     */
    const TENSNUMBER = [
        '',
        '',
        'twenty',
        'thirty',
        'forty' ,
        'fifty',
        'sixty',
        'seventy',
        'eighty',
        'ninety',
    ];

    /**
     * Convert To Number
     * @param string $word
     * @return int | string
     */
    public static function convertToNumber($words) : int | string
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
                return 'invalid first word : ' . $newWord[$currentWord];
            }
        } elseif ($maxWord === $currentWord) {
            if (in_array($newWord[$currentWord], array_keys(self::TENS))) {
                return self::TENS[$newWord[$currentWord]];
            } else {
                return 'invalid  first word : ' . $newWord[$currentWord];
            }
        }

        if($currentWord <= $maxWord) {
            if ($currentWord === 1 && in_array($newWord[$currentWord], array_keys(self::MULTIPLIER))) {
                $total = (int)$total * self::MULTIPLIER[$newWord[$currentWord]];
                $currentWord++;
            } else {
                return 'invalid hundreds word : ' . $newWord[$currentWord];
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
                return 'invalid third word : ' . $newWord[$currentWord];
            }
        }

        if ($maxWord === $currentWord) {
            if (in_array($newWord[$currentWord], array_keys(self::ONES))) {
                return (int)$total + self::ONES[$newWord[$currentWord]];
            } else {
                return 'invalid fourth word : ' . $newWord[$currentWord];
            }
        }
        
        return $total;
    }

    /**
     * Convert To Word 
     * @param string $number
     * @return int | string
     */
    public static function convertToWord($number)
    {
        $newNumber = str_split($number);
        $numberDigit = strlen($number);
        if($numberDigit === 1) {
            return self::ONESNUMBER[$number];
        }

        if($numberDigit === 2) {
            if($number >= 10 && $number <= 19 ){
                return self::OTHERNUMBER[$number];
            } else {
                return self::TENSNUMBER[$newNumber[0]] . ' ' . self::ONESNUMBER[$newNumber[1]];
            }
        }

        if($numberDigit === 3) {
            $hundreds = self::ONESNUMBER[$newNumber[0]];
            $tens = self::TENSNUMBER[$newNumber[1]];
            $ones = self::ONESNUMBER[$newNumber[2]];
            array_shift($newNumber);
            $newTens = join('', $newNumber);    
            if($newTens >= 10 && $newTens <= 19){
                return $hundreds . ' hundred ' . self::OTHERNUMBER[$newTens];
            } else {
                return $hundreds . ' hundred ' . $tens . ' ' . $ones;
            }
        }
    }
}