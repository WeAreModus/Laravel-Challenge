<?php

function money($value, $currency = 'USD'): string
{
    $fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

    return $fmt->formatCurrency($value, $currency);
}
