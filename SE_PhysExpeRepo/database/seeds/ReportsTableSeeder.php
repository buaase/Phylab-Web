<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
class ReportsTableSeeder extends Seeder{
    public function run(){
        DB::table('reports')->delete();
        Report::create([
            "script_link" => "1031.py",
            "experiment_id" => 1031,
            "experiment_name" => "关于老母猪产仔儿的实验",
            "prepare_link"  =>  "1031.pdf"
            ]);
        Report::create([
            "script_link" => "1032.py",
            "experiment_id" => 1032,
            "experiment_name" => "关于张炯傻逼程度测试的实验",
            "prepare_link"  =>  "1032.pdf"]);
        Report::create([
            "script_link" => "1033.py",
            "experiment_id" => 1033,
            "experiment_name" => "大宝剑技师技术水平的实验",
            "prepare_link"  =>  "1033.pdf"]);
    }
}
?>