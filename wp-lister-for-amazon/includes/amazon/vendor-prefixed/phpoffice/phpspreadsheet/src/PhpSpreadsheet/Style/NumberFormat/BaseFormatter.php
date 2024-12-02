<?php
/**
 * @license MIT
 *
 * Modified by __root__ on 08-May-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace WPLab\Amazon\PhpOffice\PhpSpreadsheet\Style\NumberFormat;

abstract class BaseFormatter
{
    protected static function stripQuotes(string $format): string
    {
        // Some non-number strings are quoted, so we'll get rid of the quotes, likewise any positional * symbols
        return str_replace(['"', '*'], '', $format);
    }
}
