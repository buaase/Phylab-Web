<?php
namespace App\Exceptions\App;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;

class DatabaseOperatorException extends HttpException{
    public function __construct(){
        parent::__construct(507,"数据库操作出现错误",null,array(),906);
    }
}
?>