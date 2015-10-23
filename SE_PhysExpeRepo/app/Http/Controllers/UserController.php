<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exceptions\App\InvalidRequestInputException

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
                'password' => 'confirmed|min:6',
                'name'  =>  'max:50'
            );
        $validatorAttributes = array(
                'password' => '密码',
                'name'  =>  '用户名'
            );
        $validator = Validator::make(
                Request::all(), 
                $validatorRules,
                Config::get('phylab.validatorMessage'),
                $validatorAttributes
            );
        if ($validator->fails()) {
                $warnings = $validator->messages();
                throw new InvalidRequestInputException(json_encode($warnings,JSON_UNESCAPED_UNICODE),1,1);
            }
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
