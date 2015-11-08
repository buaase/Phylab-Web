<?php
namespace App\Exceptions\User;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
class AuthenticationFailException extends HttpException{
    public function __construct(){
        parent::__construct(403,"认证失败：用户名或密码错误",null,array(),101);
    }
}
?>