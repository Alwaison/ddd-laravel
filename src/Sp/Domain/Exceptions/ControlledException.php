<?php

namespace Sp\Domain\Exceptions;

use Throwable;

class ControlledException extends \Exception
{

    protected string $type;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->type = "ControlledException";
    }

    public function getType(): String
    {
        return $this->type;
    }
}
