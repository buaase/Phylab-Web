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
                'id'  => 'required|integer|exists:reports,id',
                'xml' => 'required',
                'chart' => 'required|boolean'
            );
        $validatorAttributes = array(
                'id'  => '生成报告ID',
                'xml' => '模板xml文件',
                'chart' => '是否生成图表选项'
            );
        postCheck($rules,$message,$attributes);
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
                 "prepareLink" =>  "",
                 "experimentName"=> ""];
        //ToDo
        return view("report.show",$data);
    }

    /**
    * return the xml form view to front
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function getXmlForm($id)
    {
        $data = ["id"   =>  ""];
        $experimentId = "";
        //ToDo
        return view("xmlForm."$experimentId,$data);
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
