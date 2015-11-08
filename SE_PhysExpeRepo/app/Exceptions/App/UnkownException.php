<?php
namespace App\Exceptions\App;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class UnkownException extends HttpException{
    public function __construct(){
        parent::__construct(500,"未知错误",null,array(),903);
    }
}
?>