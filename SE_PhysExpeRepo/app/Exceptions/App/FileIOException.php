<?php
namespace App\Exceptions\App;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class FileIOException extends HttpException{
    public function __construct(){
        parent::__construct(507,"存储或者转移文件时出现错误",null,array(),905);
    }
}
?>