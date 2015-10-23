<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class UnkownException extends HttpException{
    public function __construct(){
        parent::__construct(500,"上传的文件格式非法",null,array(),903);
    }
}
?>