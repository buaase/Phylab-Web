<?php
use App\Exceptions\App\InvalidRequestInputException;
function postCheck($rules,$message,$attributes){
$validator = Validator::make(
                Input::all(), 
                $rules,
                $message,
                $attributes
            );
            if ($validator->fails()) {
                $warnings = $validator->messages();
                throw new InvalidRequestInputException(json_encode($warnings,JSON_UNESCAPED_UNICODE),1,1);
            }
        }
?>