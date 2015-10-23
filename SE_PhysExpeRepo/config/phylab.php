<?php
return [
    'starPath' => public_path()."star_pdf/",
    'tmpReportPath'=>public_path()."pdf_tmp/",
    'latexTemplatePath'=>storage_path()."/app/latex_template/",
    'scriptPath'=>storage_path()."/app/script/",
    'tmpXmlPath'=>storage_path()."/app/xml_tmp/",
    'defaultAvatarPath'   => public_path()."/avatar/default.jpg",
    'avatarPath'    =>  public_path()."/avatar/",
    'validatorMessage' => array(
                "required"      =>  ":attribute 不能为空",
                "studentId"     =>  ":attribute 必须为8位数字",
                "between"       =>  ":attribute 长度必须在 :min 和 :max 之间",
                "unique"        =>  ":attribute 已存在",
                "confirmed"     =>  ":attribute 两次输入不相同"
            )
];
?>