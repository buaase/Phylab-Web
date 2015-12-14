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
function postmail($to,$subject = '',$body = ''){
    //$to 表示收件人地址 $subject 表示邮件标题 $body表示邮件正文
    //error_reporting(E_ALL);
    error_reporting(E_STRICT);
    date_default_timezone_set('Asia/Shanghai');//设定时区东八区
    require_once(app_path().'/PhylabProcess/class.phpmailer.php');
    include(app_path().'/PhylabProcess/class.smtp.php');
    $mail             = new PHPMailer(); //new一个PHPMailer对象出来
    $body            = eregi_replace("[\]",'',$body); //对邮件内容进行必要的过滤
    $mail->CharSet ="utf-8";//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP(); // 设定使用SMTP服务
    $mail->SMTPDebug  = 1;                     // 启用SMTP调试功能
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
    //$mail->SMTPSecure = "ssl";                 // 安全协议，可以注释掉
    $mail->Host       = 'smtp.163.com';      // SMTP 服务器
    $mail->Port       = 25;                   // SMTP服务器的端口号
    //$mail->Username   = '634208109@qq.com';  // SMTP服务器用户名，PS：我乱打的
    $mail->Username   = 'hoerwing@163.com';
    //$mail->Password   = 'X1995811716hXel';
    $mail->Password   = 'X1995816711hY';            // SMTP服务器密码
    //$mail->SetFrom('634208109@qq.com', '5z1');
    $mail->SetFrom('hoerwing@163.com', 'hoerwing');
    //$mail->AddReplyTo('634208109@qq.com','5z1');
    $mail->AddReplyTo('hoerwing@163.com','hoerwing');
    $mail->Subject    = $subject;
    $mail->AltBody    = 'To view the message, please use an HTML compatible email viewer!'; // optional, comment out and test
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, '');
    //$mail->AddAttachment("images/phpmailer.gif");      // attachment
    //$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
    if(!$mail->Send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo "Message sent!恭喜，邮件发送成功！";
    }
}
?>
