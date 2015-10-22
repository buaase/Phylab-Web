<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
