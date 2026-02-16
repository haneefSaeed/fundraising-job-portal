<?php

if (!function_exists('formatShort')) {
    function formatShort($number)
    {
        if ($number >= 1000000) {
            return rtrim(rtrim(number_format($number / 1000000, 1), '0'), '.') . 'M';
        }

        if ($number >= 1000) {
            return rtrim(rtrim(number_format($number / 1000, 1), '0'), '.') . 'K';
        }

        return number_format($number, 0);
    }
}
