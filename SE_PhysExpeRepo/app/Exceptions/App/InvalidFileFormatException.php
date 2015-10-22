<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class InvalidFileFormatException extends HttpException{
    public function __construct($message,$httpCode,$code){
        parent::__construct(415,"上传的文件格式非法",null,array(),902);
    }
}
?>