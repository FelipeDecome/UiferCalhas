<?php

namespace UiferCalhas\SrcClasses\classes\Exceptions;

class CrudException extends \Exception
{

    protected $operation;
    protected $query;

    public function __construct($message, $exceptionCod, $operation = null, $query = null, $previousException = null)
    {
        parent::__construct($message, $exceptionCod, $previousException);
    }

}