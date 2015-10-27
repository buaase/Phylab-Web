<?php

namespace App\Http\Controllers;
use Auth;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display the index page.
     * check if login and return different page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示主页
        $data = ["auth" => false ,"username"    =>  ""];
        if(Auth::check()){
            //ToDo
            $data["auth"] = true;
            $data["username"] = Auth::user()->name;
        }
        else{
            //ToDo
            //if not login
        }
        return view('index',$data);
    }

}
