<?php

namespace UiferCalhas\SrcClasses\classes\Exceptions;

class ConnectionException extends \Exception
{

    public function __construct($message, $exceptionCod, $previousException = null)
    {
        parent::__construct($message, $exceptionCod, $previousException);
    }

}