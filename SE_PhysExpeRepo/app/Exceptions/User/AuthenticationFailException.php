<?php
namespace App\Exceptions\User;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
class AuthenticationFailException extends HttpException{
    public function __construct(){
        parent::__construct(403,"用户认证失败",null,array(),101);
    }
}
?>