<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Star;
use App\Models\User;
use Storage;
use Config;
use App\Exceptions\App\NoResourceException;
use Exception;
use Auth;
use App\Exceptions\App\FileIOException;
use App\Exceptions\App\DatabaseOperatorException;
use App\Exceptions\Star\ReachCeilingException;
use App\Models\Report;
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
        $stars = Auth::user()->stars()->get();
        foreach ($stars as $star) {
            $rearr = array(
                "id" => $star->id,
                "name" => $star->name,
                "link" => $star->link,
                "time" => $star->created_at
                );
            array_push($data["stars"],$rearr);
        }
        #return view("star.index",$data);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
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
                'reportId'  =>  'required|integer|exists:reports,id'
            );
        $validatorAttributes = array(
                'link' => '临时报告链接',
                'reportId'  =>  '报告模板类别'
            );
        postCheck($validatorRules,Config::get('phylab.validatorMessage'),$validatorAttributes);
        if(Storage::disk('local_public')->exists('pdf_tmp/'.Request::get('link'))){
            $report = Report::find(Request::get('reportId'));
            $experimentName = $report->experiment_name;
            if(Auth::user()->stars()->count()<=Config::get('phylab.starMaxCount'))
            {
                $star = Star::create([
                    'link' => Request::get('link'),
                    'name' => 'Lab_'.Request::get('reportId').'_'.$experimentName.'_report',
                    'user_id' => Auth::user()->id,
                    'report_id' => Request::get('reportId')
                    ]);
                if($star){
                    try{
                        Storage::disk('local_public')->copy('pdf_tmp/'.Request::get('link'),'star_pdf/'.Request::get('link'));
                    }
                    catch(Exception $e)
                    {
                        throw new FileIOException();
                    }
                    $data["status"] = SUCCESS_MESSAGE;
                }
                else{
                    $data["status"] = FAIL_MESSAGE;
                }
            }
            else
            {
                throw new ReachCeilingException();
            }
        }
        else{
            throw new NoResourceException();
        }
        //注意通过传入的临时文件地址来转移文件
        return response()->json($data);
    }

    /**
    * Delete the Star
    * @return \Illuminate\Http\Response
    */
    public function delete(){
        $data = ["status"=>""];
        $validatorRules = array(
                'id' => 'required|integer|exists:stars,id,user_id,'.Auth::user()->id
            );
        $validatorAttributes = array(
                'id' => '收藏的对象'
            );
        postCheck($validatorRules,Config::get('phylab.validatorMessage'),$validatorAttributes);
        try{
            $link = Star::find(Request::get('id'))->link;
            Star::destroy(Request::get('id'));
            try{
                Storage::disk('local_public')->delete('star_pdf/'.$link);
            }
            catch(Exception $e)
            {
                throw new FileIOException();
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
                 "name"         =>  "",
                 "experimentId" =>  "",
                 "experimentName"   =>  ""];
        $star = Star::find($id);
        if($star && $star->user->id==Auth::user()->id){
            $data["username"] = $star->user->name;
            $data["link"] = $star->link;
            $data["createTime"] = $star->created_at;
            $data["experimentName"] = $star->report->experiment_name;
            $data["experimentId"]   = $star->report->experiment_id;
            $data["name"]           = $star->name;
        }
        else{
            throw new NoResourceException();
        }
        #return view("star.show",$data);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
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
        $star = Star::find($id);
        if($star && $star->user->id==Auth::user()->id){
            $reportLink = $star->link;
            $experimentId = $star->report->experiment_id;
        }
        else{
            throw new NoResourceException();
        }
        return response()->download(Config::get('phylab.starPath').$reportLink,$experimentId.".pdf");
    }

}
