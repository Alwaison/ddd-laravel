<?php

namespace Sp\Domain\Exceptions;

class ControlledException extends \Exception
{
    
    protected $type;

    public function __construct()
    {
        parent::__construct();
        $this->type = "ControlledException";
    }

    public function getType(): String
    {
        return $this->type;
    }
}
