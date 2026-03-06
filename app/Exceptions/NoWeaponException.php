<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Exceptions\BaseException;

class NoWeaponException extends BaseException
{
    public function __construct(
        string $message = "No weapon found for this hero, in his bag!",
        int $code = 0,
        \Throwable|null $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}