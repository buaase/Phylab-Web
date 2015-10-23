<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //看这个形式： $data = ["reportTemplate"=>[ ["id"=> "", "experimentId" => "","experimentName"=> ""] , [] ,.......] ]
        $data = ["reportTemplate"=>[]];
        //ToDo
        return view("report.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //post 传入 xml 模板文件
        $data = ["status"=> "",
                 "experimentId" => "",
                 "link"  => ""];
        $validatorRules = array(
                'xml' => 'required'
            );
        $validatorAttributes = array(
                'xml' => '模板xml文件'
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ["id"   =>  "",
                 "experimentId" =>  "",
                 "document" =>  "",
                 "experimentName"=> ""];
        //ToDo
        return view("report.show",$data);
    }

    /**
     * edit the template of report.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTemplate($id)
    {
        $experimentId = "";
        $data = ["id"   =>  "",
                 "experimentId" => "",
                 "experiment_name" => ""];
        //ToDo
        return view("report.template."$experimentId, $data); 
    }

    /**
    * download the tmp report.
    * @param string $link
    * @return \Illuminate\Http\Response
    */
    public function downloadReport($experimentId,$link)
    {
        //ToDo
        return response()->download(Config::get('phylab.tmpReportPath', $experimentId."pdf"))
    }
}
