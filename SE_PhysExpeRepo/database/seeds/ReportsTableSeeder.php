<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
class ReportsTableSeeder extends Seeder{
    public function run(){
        DB::table('reports')->delete();
        Report::create([
            "script_link" => "1071.py",
            "experiment_id" => 1071,
            "experiment_name" =>"分光仪的调整",
            "prepare_link"  =>  "1071.pdf"
            ]);
    }
}
?>
