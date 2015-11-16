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
function getRandName(){
    $fname = time().rand(100,999);
    $fname = md5($fname);
    return $fname;
}
function toTimeZone($src, $from_tz = 'UTC', $to_tz = 'Asia/Shanghai', $fm = 'Y-m-d H:i:s') {
    $datetime = new DateTime($src, new DateTimeZone($from_tz));
    $datetime->setTimezone(new DateTimeZone($to_tz));
    return $datetime->format($fm);
}
?>
