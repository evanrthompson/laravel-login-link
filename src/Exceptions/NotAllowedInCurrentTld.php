<?php

namespace Spatie\LoginLink\Exceptions;

use Exception;

class NotAllowedInCurrentTld extends Exception
{
    public static function make(string $currentTld, array $allowedTlds): self
    {
        $allowedTlds = collect($allowedTlds)
            ->map(fn (string $tld) => "`{$tld}`")
            ->join(', ', ' and');

        return new self("You can not use a login link when host tld is `{$currentTld}`. The tld should be one of: {$allowedTlds}.");
    }
}
