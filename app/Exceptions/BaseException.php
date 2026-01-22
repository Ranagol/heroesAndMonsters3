<?php

namespace App\Exceptions;

use Exception;
use App\Logs\Logger;

class BaseException extends Exception
{
    /**
     * In this constructor we set up that for every exception when it is created,
     * it will be logged immediatelly into the logs.
     *
     * @param string|null $message      human-readable error message
     * @param integer $code             numeric error code (often HTTP status)
     * @param \Throwable|null $previous previous throwable for exception chaining
     */
    public function __construct(
        string|null $message = null, 
        int $code = 0, 
        \Throwable|null $previous = null)
    {
        parent::__construct($message, $code, $previous);
        Logger::getInstance()->log($message ?? 'An error occurred.');
    }

}