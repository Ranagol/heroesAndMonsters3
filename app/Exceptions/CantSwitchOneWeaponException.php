<?php

namespace App\Exceptions;

use App\Exceptions\BaseException;

class CantSwitchOneWeaponException extends BaseException
{
    public function __construct(
        string $message = "Can't switch weapon: only one weapon in bag!",
        int $code = 0,
        \Throwable|null $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}