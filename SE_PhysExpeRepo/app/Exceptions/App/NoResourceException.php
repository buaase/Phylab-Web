<?php
namespace App\Exceptions\App;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
class NoResourceException extends HttpException{
    public function __construct(){
        parent::__construct(404,"找不到请求所需要的资源",null,array(),901);
    }
}
?>