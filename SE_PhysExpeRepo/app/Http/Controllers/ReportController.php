<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Storage;
use App\Exceptions\App\FileIOException;
use App\Exceptions\App\NoResourceException;
use Exception;
use Config;
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
        $data = ["reportTemplates"=>[],
                 "username"=>Auth::user()->name];
        $reports = Report::all();
        foreach ($reports as $report) {
            $rearr = array(
                "id"=>$report->id,
                "experimentId"=>$report->experiment_id,
                "experimentName"=>$report->experiment_name,
                "prepareLink"=>$report->prepare_link
                );
            array_push($data["reportTemplates"],$rearr);
        }
        return view("report.index",$data);
        #return json_encode($data,JSON_UNESCAPED_UNICODE);
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
                'xml' => 'required'
            );
        $validatorAttributes = array(
                'id'  => '生成报告ID',
                'xml' => '模板xml文件'
            );
        postCheck($validatorRules,Config::get('phylab.validatorMessage'),$validatorAttributes);
        //ToDo
        $xmlLink = getRandName().".xml";
        try{
            Storage::put("xml_tmp/".$xmlLink,Request::get('xml'));
        }
        catch(Exception $e){
            throw new FileIOException();
        }
        $tmpName = getRandName();
        $report = Report::find(Request::get('id'));
        $scriptLink = $report->script_link;
        $experimentId = $report->experiment_id;
        $system = exec(Config::get('phylab.scriptPath')."create.sh ".Config::get('phylab.tmpReportPath')." ".Config::get('phylab.scriptPath').$scriptLink." ".Config::get('phylab.tmpXmlPath').$xmlLink." ".Config::get('phylab.tmpReportPath').$tmpName.".tex",$output,$reval);
        #echo Config::get('phylab.scriptPath')."create.sh ".Config::get('phylab.tmpReportPath')." ".Config::get('phylab.scriptPath').$scriptLink." ".Config::get('phylab.tmpXmlPath').$xmlLink." ".Config::get('phylab.tmpReportPath').$tmpName.".tex";
        #echo $out;
        #echo $system."\n";
        #echo $reval."\n";
        #echo var_dump($output);
        if($reval==0){
            #echo $system.'\n';
            #echo "python ".storage_path()."/app/script/".$scriptLink." ".storage_path()."/app/xml_tmp/".$xmlLink." ".public_path()."/pdf_tmp/".$tmpName.".tex";
            $system = json_decode($system);
            if($system->status== SUCCESS_MESSAGE){
                $data["status"] = SUCCESS_MESSAGE;
                $data["link"] = $tmpName.".pdf";
                $data["experimentId"] = $experimentId;
            }
            else{
                $data["status"]=FAIL_MESSAGE;
            }
        }
        else{
            $data["status"]=FAIL_MESSAGE;
        }
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
        $report = Report::find($id);
        if($report){
            $data["id"]=$report->id;
            $data["experimentId"]=$report->experiment_id;
            $data["experimentName"]=$report->experiment_name;
            $data["prepareLink"]=$report->prepare_link;
        }
        else{
            throw new NoResourceException();
        }
        #return view("report.show",$data);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
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
        $report = Report::find($id);
        if($report){
            $experimentId = $report->experiment_id;
            $data["id"] = $id;
        }
        else{
            throw new NoResourceException();
        }
        return view("report.xmlForm.".$experimentId,$data);
    }

    /**
    * download the tmp report.
    * @param string $link
    * @return \Illuminate\Http\Response
    */
    public function downloadReport($experimentId,$link)
    {
        return response()->download(Config::get('phylab.tmpReportPath').$link, $experimentId.".pdf");
    }
}
