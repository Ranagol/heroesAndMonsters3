<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Exceptions\BaseException;

class MaxWeaponNrExceededException extends BaseException
{
    public function __construct(
        string $message = "Maximum number of weapons in bag is two weapons!",
        int $code = 0,
        \Throwable|null $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}