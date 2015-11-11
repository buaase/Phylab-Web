<?php
namespace App\Exceptions\App;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class InvalidFileFormatException extends HttpException{
    public function __construct(){
        parent::__construct(415,"非法的文件格式或者后缀",null,array(),902);
    }
}
?>