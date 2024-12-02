<?php
/**
 * @license MIT
 *
 * Modified by __root__ on 08-May-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace WPLab\Amazon\PhpOffice\PhpSpreadsheet\Cell;

interface AddressRange
{
    public const MAX_ROW = 1048576;

    public const MAX_COLUMN = 'XFD';

    /**
     * @return mixed
     */
    public function from();

    /**
     * @return mixed
     */
    public function to();

    public function __toString(): string;
}
