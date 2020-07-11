<?php

use App\Models\User;

function user(): ?User
{
    return auth()->user();
}

function money($value, $currency = 'USD'): string
{
    $fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

    return $fmt->formatCurrency($value, $currency);
}
