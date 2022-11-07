<?php

namespace Stephenjude\BlocPhpSdk\Exceptions;

use Exception;

class TooManyRequestException extends Exception
{
    public function __construct()
    {
        parent::__construct('Too many requests are being sent in a short period of time.');
    }
}
