<?php

namespace App\Helpers;

class InputFilter
{
    private static $characters = [
        'ك' => 'ک',
        'ى' => 'ی',
        'ي' => 'ی',
        'ة' => 'ه',
    ];

    private static $numbers = [
        '١' => '۱',
        '٢' => '۲',
        '٣' => '۳',
        '٤' => '۴',
        '٥' => '۵',
        '٦' => '۶',
        '٧' => '۷',
        '٨' => '۸',
        '٩' => '۹',
        '٠' => '۰',
    ];

    public function __construct()
    {
        global $characters, $numbers;
        self::$characters = $characters;
        self::$numbers = $numbers;
    }

    public static function topPersianCharacter($string)
    {
        return ucfirst(trim(self::toPersianNumber(str_replace(array_keys(self::$characters), array_values(self::$characters), $string))));
    }

    public static function toPersianNumber($string)
    {
        return str_replace(array_keys(self::$numbers), array_values(self::$numbers), $string);
    }

    public static function toEnglishNumber($string)
    {

        return trim(str_replace(array_keys(self::$numbers), range(0, 9), str_replace(array_values(self::$numbers), range(0, 9), $string)));
    }

    public static function toValidNumber($string, $integer = false)
    {
        return (($result = preg_replace("/[^0-9,.]/", "", self::toEnglishNumber($string))) && $integer === false) ? $result : (int)$result;
    }

    public static function toValidCaseInsensitive($string)
    {
        return trim(strtolower($string));
    }

    public static function removeLineBreaks($string, $replace = '')
    {
        return preg_replace('/\s\s+/', $replace, $string);
    }
}