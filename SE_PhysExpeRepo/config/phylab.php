<?php
return [
    'starPath' => public_path()."/star_pdf/",
    'tmpReportPath'=>public_path()."/pdf_tmp/",
    'latexTemplatePath'=>storage_path()."/app/latex_template/",
    'scriptPath'=>storage_path()."/app/script/",
    'tmpXmlPath'=>storage_path()."/app/xml_tmp/",
    'defaultAvatarPath'   => "default.jpg",
    'avatarPath'    =>  public_path()."/avatar/",
    'videoPath'     =>  public_path()."/video/",
    'cssPath'       =>  public_path()."/css/",
    'jsPath'        =>  public_path()."/js/",
    'preparePath'   =>  public_path()."/prepare_pdf/",
    'allowedFileFormat' => '/^(jpg|gif|png|jpeg|bmp)$/',
    'maxUploadSize'     => 5000000,
    'starMaxCount'      => 10,
    'validatorMessage' => array(
                "required"      =>  ":attribute 不能为空",
                "studentId"     =>  ":attribute 必须为8位数字",
                "between"       =>  ":attribute 长度必须在 :min 和 :max 之间",
                "unique"        =>  ":attribute 已存在",
                "confirmed"     =>  ":attribute 两次输入不相同",
                "boolean"       =>  ":attribute 必须为布尔值，可接受的值为 true, false, 1, 0, \"1\", \"0\"",
                "exists"        =>  ":attribute 必须为已存在的对象",
                "date"          =>  ":attribute 必须为一个合法日期"
            )
];
?>