<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Exceptions\App\DatabaseOperatorException;
use App\Exceptions\App\InvalidRequestInputException;
use App\Exceptions\App\InvalidFileFormatException;
use App\Exceptions\App\FileIOException;
use Exception;
use Config;
use Storage;

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
                 "email"        =>  "",
                 "sex"          =>  "",
                 "company"      =>  "",
                 "companyAddr" =>  "",
                 "birthday"     =>  "",
                 "introduction" =>  ""];
        $auth = Auth::user();
        $data["avatarPath"] = $auth->avatar_path;
        $data["username"] = $auth->name;
        $data["studentId"] = $auth->student_id;
        $data["email"] = $auth->email;
        $data["sex"] = $auth->sex;
        $data["company"] = $auth->company;
        $data["companyAddr"] = $auth->company_addr;
        $data["birthday"] = $auth->birthday;
        $data["introduction"] = $auth->introduction;
        #return view("user.index",$data);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
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
                 "sex"          =>  "",
                 "company"      =>  "",
                 "companyAddr" =>  "",
                 "birthday"     =>  "",
                 "introduction" =>  ""];
        $auth = Auth::user();
        $data["avatarPath"] = $auth->avatar_path;
        $data["username"] = $auth->name;
        $data["sex"] = $auth->sex;
        $data["company"] = $auth->company;
        $data["companyAddr"] = $auth->company_addr;
        $data["birthday"] = $auth->birthday;
        $data["introduction"] = $auth->introduction;
        #return json_encode($data,JSON_UNESCAPED_UNICODE);
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
                'username'  =>  'between:6,20',
                'birthday'  =>  'date'
            );
        $validatorAttributes = array(
                'password' => '密码',
                'username'  =>  '用户名',
                'birthday'  => '生日'  
            );
        postCheck($validatorRules,Config::get('phylab.validatorMessage'),$validatorAttributes);
        $userAttr = ['password'=>'password',
                     'username'=>'name',
                     'birthday'=>'birthday',
                     'sex'=>'sex',
                     'company'=>'company',
                     'companyAddr'=>'company_addr',
                     'introduction'=>'introduction'];
        try{
            foreach ($userAttr as $key => $value) {
                if(Request::has($key)){
                    Auth::user()->update([$value => Request::get($key)]);
                }
            }
            $data["status"] = SUCCESS_MESSAGE;
        }
        catch(Exception $e)
        {
            throw new DatabaseOperatorException();
        }
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
        if(Request::hasFile('avatar'))
        {
            $avatar = Request::file('avatar');
            if(preg_match(Config::get('phylab.allowedFileFormat'), $avatar->getClientOriginalExtension())&&
               $avatar->getSize()<Config::get('phylab.maxUploadSize'))
            {
                $fname = getRandName().'.'.$avatar->getClientOriginalExtension();
                $avatar->move(Config::get('phylab.avatarPath'),$fname);
                $auth = Auth::user();
                try{
                    if($auth->avatar_path!=Config::get('phylab.defaultAvatarPath'))
                    {
                        Storage::disk('local_public')->delete('avatar/'.$auth->avatar_path);
                    }
                }
                catch(Exception $e)
                {
                    throw new FileIOException();
                }
                try{
                    $auth->avatar_path = $fname;
                    $auth->save();
                    $data["status"] = SUCCESS_MESSAGE;
                    $data["avatarPath"] = $fname;
                }
                catch(Exception $e)
                {
                    throw new DatabaseOperatorException();
                }
            }
            else{
                throw new InvalidFileFormatException();
            }
        }
        else{
            throw new InvalidRequestInputException("上传参数不正确");
        }
        return response()->json($data);
    }
}
