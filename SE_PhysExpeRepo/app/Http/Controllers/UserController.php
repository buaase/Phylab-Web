<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display  the page of managing user hemself.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = ["avatarPath"   =>  "",
                 "username"     =>  "",
                 "studentId"    =>  "",
                 "email"        =>  ""];
        //ToDo
        return view("user.index",$data);
    }

    /**
     * Show the form for editing the user infomation.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = ["avatarPath"   =>  "",
                 "username"     =>  "",
                 "studenId"     =>  ""，
                 "email"        =>  ""];
        //ToDo
        return view("user.edit",$data);
    }

    /**
     * Update the user infomation .
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $data = ["status"       =>  ""];
        $validatorRules = array(
                'password' => 'confirmed|between:6,15',
                'name'  =>  'between:6,20',
                'birthday'  =>  'date'
            );
        $validatorAttributes = array(
                'password' => '密码',
                'name'  =>  '用户名',
                'birthday'  => '生日'  
            );
        postCheck($rules,$message,$attributes);
        //ToDo
        return response()->json($data);
    }

    /**
     * set user's avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function setAvatar()
    {
        $data = ["status"=>"","avatarPath"=>""];
        //ToDo
        return response()->json($data);
    }
}
