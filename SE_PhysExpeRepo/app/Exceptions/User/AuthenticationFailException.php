<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
class AuthenticationFailException extends HttpException{
    public function __construct($message,$httpCode,$code){
        parent::__construct(403,"用户认证失败",null,array(),101);
    }
}
?>