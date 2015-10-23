<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ["stars"=>[]];
        //ToDo
        return view("star.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ["status"=>""];
        $validatorRules = array(
                'link' => 'required',
                'reportId'  =>  'required|integer'
            );
        $validatorAttributes = array(
                'link' => '临时报告链接',
                'reportId'  =>  '报告模板类别'
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
        //注意通过传入的临时文件地址来转移文件
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ["username"     =>  "",
                 "link"         =>  "",
                 "createTime"   =>  "",
                 "experimentName"   =>  ""];
        //ToDo
        return view("star.show",$data);
    }

    /**
    *Download the stared report
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function download($id)
    {
        $reportLink = "";
        $experimentId = "";
        //ToDo
        return response()->download(Config::get('phylab.starPath').$reportLink,$experimentId."pdf");
    }

}
