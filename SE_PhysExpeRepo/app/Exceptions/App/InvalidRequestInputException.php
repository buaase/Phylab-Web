<?php
namespace App\Exceptions\App;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class InvalidRequestInputException extends HttpException{
    public function __construct($message){
        parent::__construct(400,$message,null,array(),904);
    }
}
?>