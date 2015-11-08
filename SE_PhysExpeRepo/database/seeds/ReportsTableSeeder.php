<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
class ReportsTableSeeder extends Seeder{
    public function run(){
        DB::table('reports')->delete();
        Report::create([
            "script_link" => null,
            "experiment_id" => 1011,
            "experiment_name" =>"拉伸法测钢丝弹性模型扭摆法测定转动惯量",
            "prepare_link"  =>  "1011.pdf"
            ]);
        Report::create([
            "script_link" => null,
            "experiment_id" => 1021,
            "experiment_name" =>"测定水的溶解热及电热法测量焦耳热的当量",
            "prepare_link"  =>  "1021.pdf"
            ]);
        Report::create([
            "script_link" => null,
            "experiment_id" => 1061,
            "experiment_name" =>"薄透镜和单球面镜焦距的测量",
            "prepare_link"  =>  "1061.pdf"
            ]);
        Report::create([
            "script_link" => "1071.py",
            "experiment_id" => 1071,
            "experiment_name" =>"分光仪的调整及其应用",
            "prepare_link"  =>  "1071.pdf"
            ]);
        Report::create([
            "script_link" => null,
            "experiment_id" => 1081,
            "experiment_name" =>"光的干涉实验 1(分波面法)",
            "prepare_link"  =>  "1061.pdf"
            ]);
        Report::create([
            "script_link" => null,
            "experiment_id" => 1091,
            "experiment_name" =>"光的干涉实验 2(分振幅法)",
            "prepare_link"  =>  "1061.pdf"
            ]);
    }
}
?>
