<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class TemplateFormatException extends HttpException{
    public function __construct($message,$httpCode,$code){
        parent::__construct(400,"填入的数据模板格式有错误",null,array(),201);
    }
}
?>