<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class InvalidFileFormatException extends HttpException{
    public function __construct(){
        parent::__construct(409,"收藏数已达上限，请先删除部分收藏",null,array(),301);
    }
}
?>