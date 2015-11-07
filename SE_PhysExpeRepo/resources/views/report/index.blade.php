<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhyLabReportCore</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/seven-style.css">
	<link rel="stylesheet" href="./css/mystyle.css">
</head>
<body onload="check()">
<div class="modal fade" id="lab_table_1011">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1011&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1011_1" aria-controls="实验一 拉伸法测钢丝弹性模量" role="tab" data-toggle="tab">Lab1&nbsp拉伸法测钢丝弹性模量</a></li>
					<li role="presentation"><a href="#lab_1011_2" aria-controls="实验二 扭摆法测定转动惯量" role="tab" data-toggle="tab">Lab2&nbsp扭摆法测定转动惯量</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1011-1">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1011_1">
					<table class="table table-condensed table-hover table-striped" id="table1011_1_Lhb">
					<thead>
						<tr>
							<th><label for="1011_1_gangsi">钢丝长L(cm)</label></th>
							<th><label for="1011_1_pingmianjing">平面镜到标尺H(cm)</label></th>
							<th><label for="1011_1_guangganggan">光杠杆前后足b(cm)</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="text" class="para 1011_1 form-control" aria-label="钢丝长L" id="1011_1_gangsi" ></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="平面镜到标尺H" id="1011_1_pingmianjing" ></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="光杠杆前后足b" id="1011_1_guangganggan" ></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1011_1_zhijing">
					<thead>
						<tr>
							<th>直径 </th>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>(mm)</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="直径1" id="1011_1_D1"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="直径2" id="1011_1_D2"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="直径3" id="1011_1_D3"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="直径4" id="1011_1_D4"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="直径5" id="1011_1_D5"></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1011_1_jiali">
					<thead>
						<tr>
							<th>加力(kg)</th>
							<td>读数(加力)</td>
							<td>读数(减力)</td>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>10</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力10" id="1011_1_jia10"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力10" id="1011_1_jian10"></td>
						</tr>
						<tr>
							<td>12</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力12" id="1011_1_jia12"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力12" id="1011_1_jian12"></td>
						</tr>
						<tr>
							<td>14</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力14" id="1011_1_jia14"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力14" id="1011_1_jian14"></td>
						</tr>
						<tr>
							<td>16</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力16" id="1011_1_jia16"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力16" id="1011_1_jian16"></td>
						</tr>
						<tr>
							<td>18</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力18" id="1011_1_jia18"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力18" id="1011_1_jian18"></td>
						</tr>
						<tr>
							<td>20</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力20" id="1011_1_jia20"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力20" id="1011_1_jian20"></td>
						</tr>
						<tr>
							<td>22</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力22" id="1011_1_jia22"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力22" id="1011_1_jian22"></td>
						</tr>
						<tr>
							<td>24</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力24" id="1011_1_jia24"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力24" id="1011_1_jian24"></td>
						</tr>
						<tr>
							<td>26</td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="加力26" id="1011_1_jia26"></td>
							<td><input type="text" class="para 1011_1 form-control" aria-label="减力26" id="1011_1_jian26"></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1011_2">
					<table class="table table-condensed table-hover table-striped" id="table1011_2_msize">
						<thead>
							<tr>
								<td colspan="5"><span class="badge">刚体参量</span></td>
							</tr>
							<tr>
								<th></th>
								<th>塑料圆柱</th>
								<th>金属圆筒</th>
								<th>球</th>
								<th>细杆</th>
							</tr>
						</thead>
						<tbody>
							<tr class="form-group has-feedback">
								<td>质量(g)</td>
								<td><input class="para 1011_2 form-control" type="text" aria-label="塑料圆柱质量" id="1011_2_myuanzhu" ></td>
								<td><input class="para 1011_2 form-control" type="text" aria-label="金属圆筒质量" id="1011_2_myuantong"></td>
								<td><input class="para 1011_2 form-control" type="text" aria-label="球质量" id="1011_2_mqiu"></td>
								<td><input class="para 1011_2 form-control" type="text" aria-label="细杆质量" id="1011_2_mxigan"></td>
							</tr>
							<tr class="form-group has-feedback">
								<td>尺寸(mm)</td>
								<td><input class="para 1011_2 form-control" type="text" aria-label="塑料圆柱尺寸" id="1011_2_chicunyuanzhu" ></td>
								<td style="width:30%;"><div class="input-group">
									<span class="input-group-addon">外</span>
									<input class="para 1011_2 form-control" type="text" aria-label="金属圆筒尺寸内" id="1011_2_wchicunmyuantong">
									<span class="input-group-addon">内</span>
									<input class="para 1011_2 form-control" type="text" aria-label="金属圆筒尺寸外" id="1011_2_nchicunyuantong"></div></td>
								<td><input class="para 1011_2 form-control" type="text" aria-label="球尺寸" id="1011_2_chicunqiu"></td>
								<td><input class="para 1011_2 form-control" type="text" aria-label="细杆尺寸" id="1011_2_chicunxigan"></td>
							</tr>
							<tr class="form-group has-feedback">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
						</table>
					<table class="table table-condensed table-hover table-striped" id="table1011_2_zuzhi">
						<thead>
							<tr>
								<td colspan="5"><span class="badge">测量结果</span></td>
							</tr>
							<tr>
								<th></th>
								<th>物盘</th>
								<th>盘+圆柱</th>
								<th>盘+圆筒</th>
								<th>圆球</th>
								<th>细长杆</th>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><input class="para 1011_2 form-control" aria-label="物盘1" type="text" id="1011_2_w1" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆柱1" type="text" id="1011_2_pz1" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆筒1" type="text" id="1011_2_pt1" ></td>
								<td><input class="para 1011_2 form-control" aria-label="圆球1" type="text" id="1011_2_yq1" ></td>
								<td><input class="para 1011_2 form-control" aria-label="细长杆1" type="text" id="1011_2_xcg1" ></td>
							</tr>
							<tr>
								<td>2</td>
								<td><input class="para 1011_2 form-control" aria-label="物盘2" type="text" id="1011_2_w2" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆柱2" type="text" id="1011_2_pz2" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆筒2" type="text" id="1011_2_pt2" ></td>
								<td><input class="para 1011_2 form-control" aria-label="圆球2" type="text" id="1011_2_yq2" ></td>
								<td><input class="para 1011_2 form-control" aria-label="细长杆2" type="text" id="1011_2_xcg2" ></td>
							</tr>
							<tr>
								<td>3</td>
								<td><input class="para 1011_2 form-control" aria-label="物盘3" type="text" id="1011_2_w3" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆柱3" type="text" id="1011_2_pz3" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆筒3" type="text" id="1011_2_pt3" ></td>
								<td><input class="para 1011_2 form-control" aria-label="圆球3" type="text" id="1011_2_yq3" ></td>
								<td><input class="para 1011_2 form-control" aria-label="细长杆3" type="text" id="1011_2_xcg3" ></td>
							</tr>
							<tr>
								<td>4</td>
								<td><input class="para 1011_2 form-control" aria-label="物盘4" type="text" id="1011_2_w4" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆柱4" type="text" id="1011_2_pz4" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆筒4" type="text" id="1011_2_pt4" ></td>
								<td><input class="para 1011_2 form-control" aria-label="圆球4" type="text" id="1011_2_yq4" ></td>
								<td><input class="para 1011_2 form-control" aria-label="细长杆4" type="text" id="1011_2_xcg4" ></td>
							</tr>
							<tr>
								<td>5</td>
								<td><input class="para 1011_2 form-control" aria-label="物盘5" type="text" id="1011_2_w5" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆柱5" type="text" id="1011_2_pz5" ></td>
								<td><input class="para 1011_2 form-control" aria-label="盘+圆筒5" type="text" id="1011_2_pt5" ></td>
								<td><input class="para 1011_2 form-control" aria-label="圆球5" type="text" id="1011_2_yq5" ></td>
								<td><input class="para 1011_2 form-control" aria-label="细长杆5" type="text" id="1011_2_xcg5" ></td>
							</tr>
						</tbody>
						</table>
				</div>
			</div>
			<div id="modal-footer-1011-1">
				<div class="form-group" style="float:right;">
					<label for="check_1011_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1011_1 check-ios" id="check_1011_1" name="check_1011" type="checkbox">
						<label for="check_1011_1"></label>
						<span></span>
					</div>
					<label for="check_1011_2">&nbsp Lab2&nbsp </label>
					<div class="holder">
						<input class="1011_2 check-ios" id="check_1011_2" name="check_1011" type="checkbox">
						<label for="check_1011_2"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1011" style="display:block;"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1011" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1011">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="lab_table_1021">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1021&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1021_1" aria-controls="实验一 测量冰的溶解热" role="tab" data-toggle="tab">Lab1&nbsp测量冰的溶解热</a></li>
					<li role="presentation"><a href="#lab_1021_2" aria-controls="实验二 焦尔法测量热功当量" role="tab" data-toggle="tab">Lab2&nbsp焦耳法测量热功当量</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1021-1">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1021_1">
					<table class="table table-condensed table-hover table-striped" id="table1021_1_mt">
					<thead>
						<tr>
							<th><label for="mTong">筒质量(g)</label></th>
							<th><label for="mBang">搅拌棒质量(g)</label></th>
							<th><label for="mTongBang">筒+搅拌棒质量(g)</label></th>
							<th><label for="tAround1">环境温度阻值(Ω)</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="text" class="para 1021_1 form-control" aria-label="筒质量" id="mTong" ></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="搅拌棒质量" id="mBang" ></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="筒+搅拌棒质量" id="mTongBang" ></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="环境温度阻值" id="tAround1" ></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1021_1_zuzhi">
					<thead>
						<tr>
							<th>序号&nbsp &nbsp </th>
							<th>隔60s读数</th>
							<th>隔15s读数</th>
							<th>再隔60s读数(均可不填完)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="隔60s读数1" id="f60-1"></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="隔15s读数1" id="a15-1"></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="再隔60s读数1" id="a60-1" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="隔60s读数2" id="f60-2"></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="隔15s读数2" id="a15-2"></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="再隔60s读数2" id="a60-2" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="隔60s读数3" id="f60-3"></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="隔15s读数3" id="a15-3"></td>
							<td><input type="text" class="para 1021_1 form-control" aria-label="再隔60s读数3" id="a60-3" ></td>
						</tr>
						<tr>
							<td>4</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数4" id="f60-4"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数4" id="a15-4"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数4" id="a60-4" ></td>
						</tr>
						<tr>
							<td>5</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数5" id="f60-5"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数5" id="a15-5"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数5" id="a60-5" ></td>
						</tr>
						<tr>
							<td>6</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数6" id="f60-6"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数6" id="a15-6"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数6" id="a60-6" ></td>
						</tr>
						<tr>
							<td>7</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数7" id="f60-7"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数7" id="a15-7"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数7" id="a60-7" ></td>
						</tr>
						<tr>
							<td>8</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数8" id="f60-8"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数8" id="a15-8"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数8" id="a60-8" ></td>
						</tr>
						<tr>
							<td>9</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数9" id="f60-9"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数9" id="a15-9"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数9" id="a60-9" ></td>
						</tr>
						<tr>
							<td>10</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数10" id="f60-10"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数10" id="a15-10"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数10" id="a60-10" ></td>
						</tr>
						<tr>
							<td>11</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数11" id="f60-11"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数11" id="a15-11"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数11" id="a60-11" ></td>
						</tr>
						<tr>
							<td>12</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数12" id="f60-12"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数12" id="a15-12"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数12" id="a60-12" ></td>
						</tr>
						<tr>
							<td>13</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数13" id="f60-13"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数13" id="a15-13"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数13" id="a60-13" ></td>
						</tr>
						<tr>
							<td>14</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数14" id="f60-14" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数14" id="a15-14"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数14" id="a60-14" ></td>
						</tr>
						<tr>
							<td>15</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数15" id="f60-15" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数15" id="a15-15"></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数15" id="a60-15" ></td>
						</tr>
						<tr>
							<td>16</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数16" id="f60-16" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数16" id="a15-16" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数16" id="a60-16" ></td>
						</tr>
						<tr>
							<td>17</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数17" id="f60-17" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数17" id="a15-17" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数17" id="a60-17" ></td>
						</tr>
						<tr>
							<td>18</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数18" id="f60-18" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数18" id="a15-18" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数18" id="a60-18" ></td>
						</tr>
						<tr>
							<td>19</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数19" id="f60-19" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数19" id="a15-19" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数19" id="a60-19" ></td>
						</tr>
						<tr>
							<td>20</td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔60s读数20" id="f60-20" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="隔15s读数20" id="a15-20" ></td>
							<td><input type="text" class="var 1021_1 form-control" aria-label="再隔60s读数20" id="a60-20" ></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1021_2">
					<table class="table table-condensed table-hover table-striped" id="table1021_2_mvt">
						<thead>
							<tr>
								<th><label for="mNeitong">内筒质量(g)</label></th>
								<th><label for="mTotal">总质量(g)</label></th>
								<th><label for="v1">V1(v)</label></th>
								<th><label for="v2">V2(v)</label></th>
								<th><label for="tAround2"></label>环境温度阻值(Ω)</th>
							</tr>
						</thead>
						<tbody>
							<tr class="form-group has-feedback">
								<td><input class="para 1021_2 form-control" type="text" aria-label="内筒质量" id="mNeitong"></td>
								<td><input class="para 1021_2 form-control" type="text" aria-label="总质量" id="mTotal" ></td>
								<td><input class="para 1021_2 form-control" type="text" aria-label="V1" id="v1"></td>
								<td><input class="para 1021_2 form-control" type="text" aria-label="V2" id="v2"></td>
								<td><input class="para 1021_2 form-control" type="text" aria-label="环境温度阻值" id="tAround2"></td>
							</tr>
						</tbody>
						</table>
					<table class="table table-condensed table-hover table-striped" id="table1021_2_zuzhi">
						<thead>
							<tr>
								<th>时间(min)</th>
								<th>阻值(千欧)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>0</td>
								<td><input class="para 1021_2 form-control" aria-label="初始阻值" type="text" id="r0" ></td>

							</tr>
							<tr>
								<td>1</td>
								<td><input class="para 1021_2 form-control" aria-label="第1分钟阻值" type="text" id="r1" ></td>

							</tr>
							<tr>
								<td>2</td>
								<td><input class="para 1021_2 form-control" aria-label="第2分钟阻值" type="text" id="r2" ></td>

							</tr>
							<tr>
								<td>3</td>
								<td><input class="var 1021_2 form-control" aria-label="第3分钟阻值" type="text" id="r3" ></td>

							</tr>
							<tr>
								<td>4</td>
								<td><input class="var 1021_2 form-control" aria-label="第4分钟阻值" type="text" id="r4" ></td>
							</tr>
							<tr>
								<td>5</td>
								<td><input class="var 1021_2 form-control" aria-label="第5分钟阻值" type="text" id="r5" ></td>
							</tr>
							<tr>
								<td>6</td>
								<td><input class="var 1021_2 form-control" aria-label="第6分钟阻值" type="text" id="r6" ></td>
							</tr>
							<tr>
								<td>7</td>
								<td><input class="var 1021_2 form-control" aria-label="第7分钟阻值" type="text" id="r7" ></td>
							</tr>
							<tr>
								<td>8</td>
								<td><input class="var 1021_2 form-control" aria-label="第8分钟阻值" type="text" id="r8" ></td>
							</tr>
							<tr>
								<td>9</td>
								<td><input class="var 1021_2 form-control" aria-label="第9分钟阻值" type="text" id="r9" ></td>
							</tr>
							<tr>
								<td>10</td>
								<td><input class="var 1021_2 form-control" aria-label="第10分钟阻值" type="text" id="r10" ></td>
							</tr>
							<tr>
								<td>11</td>
								<td><input class="var 1021_2 form-control" aria-label="第11分钟阻值" type="text" id="r11" ></td>
							</tr>
							<tr>
								<td>12</td>
								<td><input class="var 1021_2 form-control" aria-label="第12分钟阻值" type="text" id="r12" ></td>
							</tr>
							<tr>
								<td>13</td>
								<td><input class="var 1021_2 form-control" aria-label="第13分钟阻值" type="text" id="r13" ></td>
							</tr>
							<tr>
								<td>14</td>
								<td><input class="var 1021_2 form-control" aria-label="第14分钟阻值" type="text" id="r14" ></td>
							</tr>
							<tr>
								<td>15</td>
								<td><input class="var 1021_2 form-control" aria-label="第15分钟阻值" type="text" id="r15" ></td>
							</tr>
							<tr>
								<td>16</td>
								<td><input class="var 1021_2 form-control" aria-label="第16分钟阻值" type="text" id="r16" ></td>
							</tr>
							<tr>
								<td>17</td>
								<td><input class="var 1021_2 form-control" aria-label="第17分钟阻值" type="text" id="r17" ></td>
							</tr>
							<tr>
								<td>18</td>
								<td><input class="var 1021_2 form-control" aria-label="第18分钟阻值" type="text" id="r18" ></td>
							</tr>
							<tr>
								<td>19</td>
								<td><input class="var 1021_2 form-control" aria-label="第19分钟阻值" type="text" id="r19" ></td>
							</tr>
							<tr>
								<td>20</td>
								<td><input class="var 1021_2 form-control" aria-label="第20分钟阻值" type="text" id="r20" ></td>
							</tr>
							<tr>
								<td>21</td>
								<td><input class="var 1021_2 form-control" aria-label="第21分钟阻值" type="text" id="r21" ></td>
							</tr>
							<tr>
								<td>22</td>
								<td><input class="var 1021_2 form-control" aria-label="第22分钟阻值" type="text" id="r22" ></td>
							</tr>
							<tr>
								<td>23</td>
								<td><input class="var 1021_2 form-control" aria-label="第23分钟阻值" type="text" id="r23" ></td>
							</tr>
							<tr>
								<td>24</td>
								<td><input class="var 1021_2 form-control" aria-label="第24分钟阻值" type="text" id="r24" ></td>
							</tr>
							<tr>
								<td>25</td>
								<td><input class="var 1021_2 form-control" aria-label="第25分钟阻值" type="text" id="r25" ></td>
							</tr>
							<tr>
								<td>26</td>
								<td><input class="var 1021_2 form-control" aria-label="第26分钟阻值" type="text" id="r26" ></td>
							</tr>
							<tr>
								<td>27</td>
								<td><input class="var 1021_2 form-control" aria-label="第27分钟阻值" type="text" id="r27" ></td>
							</tr>
							<tr>
								<td>28</td>
								<td><input class="var 1021_2 form-control" aria-label="第28分钟阻值" type="text" id="r28" ></td>
							</tr>
							<tr>
								<td>29</td>
								<td><input class="var 1021_2 form-control" aria-label="第29分钟阻值" type="text" id="r29" ></td>
							</tr>
							<tr>
								<td>30</td>
								<td><input class="var 1021_2 form-control" aria-label="第30分钟阻值" type="text" id="r30" ></td>
							</tr>
						</tbody>
						</table>
				</div>
			</div>
			<div id="modal-footer-1021-1">
				<div class="form-group" style="float:right;">
					<label for="check_1021_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1021_1 check-ios" id="check_1021_1" name="check_1021" type="checkbox">
						<label for="check_1021_1"></label>
						<span></span>
					</div>
					<label for="check_1021_2">&nbsp Lab2&nbsp </label>
					<div class="holder">
						<input class="1021_2 check-ios" id="check_1021_2" name="check_1021" type="checkbox">
						<label for="check_1021_2"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1021" style="display:block;"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1021" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1021">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="lab_table_1031">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1031&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1031_1" aria-controls="实验一 模拟示波器的使用" role="tab" data-toggle="tab">Lab1&nbsp模拟示波器的使用</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1031-1">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1031_1">
					<table class="table table-condensed table-hover table-striped" id="table1031_chy">
					<thead>
						<tr>
							<th></th>
							<th>校准位</th>
							<th>中间</th>
							<th>逆时针到底</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>CH1(v)</td>
							<td><input class="para 1031_1 form-control" aria-label="CH1校准位v值1" type="text" id="chjiao1" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1中间位v值1" type="text" id="chzhong1" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1逆时针底位v值1" type="text" id="chni1" ></td>

						</tr>
						<tr>
							<td>y(格)</td>
							<td><input class="para 1031_1 form-control" aria-label="CH1校准位v格1" type="text" id="yjiao1" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1中间位v格1" type="text" id="yzhong1" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1逆时针底位v格1" type="text" id="yni1" ></td>

						</tr>
						<tr>
							<td>CH1(v)</td>
							<td><input class="para 1031_1 form-control" aria-label="CH1校准位v值2" type="text" id="chjiao2" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1中间位v值2" type="text" id="chzhong2" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1逆时针底位v值2" type="text" id="chni2" ></td>

						</tr>
						<tr>
							<td>y(格)</td>
							<td><input class="para 1031_1 form-control" aria-label="CH1校准位v格2" type="text" id="yjiao2" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1中间位v格2" type="text" id="yzhong2" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1逆时针底位v格2" type="text" id="yni2" ></td>
						</tr>
						<tr>
							<td>CH1(v)</td>
							<td><input class="para 1031_1 form-control" aria-label="CH1校准位v值3" type="text" id="chjiao3" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1中间位v值3" type="text" id="chzhong3" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1逆时针底位v值3" type="text" id="chni3" ></td>

						</tr>
						<tr>
							<td>y(格)</td>
							<td><input class="para 1031_1 form-control" aria-label="CH1校准位v格3"  type="text" id="yjiao3" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1中间位v格3" type="text" id="yzhong3" ></td>
							<td><input class="para 1031_1 form-control" aria-label="CH1逆时针底位v格3" type="text" id="yni3" ></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1031_f2f4">
					<thead>
						<tr>
							<th></th>
							<th>两峰间格数</th>
							<th>Δy</th>
							<th>V(v)</th>
							<th>Δt(ms)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>f2</td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f2 两峰间格数" id="f2" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f2 delta y值" id="y_1031_1" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f2 V值" id="v_1031_1" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f2 delta t值" id="t_1031_1" ></td>
						</tr>
						<tr>
							<td>f4</td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f4 两峰间格数" id="f4" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f4 delta y值" id="y_1031_2" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f4 V值" id="v_1031_2" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="f4 delta t值" id="t_1031_2" ></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1031_fyfxnxny">
					<thead>
						<tr>
							<th></th>
							<th>fy(Hz)</th>
							<th>fy:fx</th>
							<th>nx</th>
							<th>ny</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy1取值1" id="fy1" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy比fx取值1" id="fyfx1" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="nx取值1" id="nx1" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="ny取值1" id="ny1" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy1取值2" id="fy2" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy比fx取值2" id="fyfx2" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="nx取值2" id="nx2" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="ny取值2" id="ny2" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy1取值3" id="fy3" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy比fx取值3" id="fyfx3" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="nx取值3" id="nx3" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="ny取值3" id="ny3" ></td>
						</tr>
						<tr>
							<td>4</td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy1取值4" id="fyfx4" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="fy比fx取值4" id="fy4" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="nx取值4" id="nx4" ></td>
							<td><input class="para 1031_1 form-control" type="text" aria-label="ny取值4" id="ny4" ></td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
			<div id="modal-footer-1031-1">
				<div class="form-group" style="float:right;">
					<label for="check_1031_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1031_1 check-ios" id="check_1031_1" name="check_1031" type="checkbox">
						<label for="check_1031_1"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1031" style="display:block;"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1031" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1031">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="lab_table_1061">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    			<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1061&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1061_1" aria-controls="实验一 物距像距法测凸透镜焦距" role="tab" data-toggle="tab">Lab1&nbsp物距像距法(凸)</a></li>
					<li role="presentation"><a href="#lab_1061_2" aria-controls="实验二 自准直法测凸透镜焦距" role="tab" data-toggle="tab">Lab2&nbsp自准直法(凸)</a></li>
					<li role="presentation"><a href="#lab_1061_3" aria-controls="实验三 物距像距法测凹透镜焦距" role="tab" data-toggle="tab">Lab3&nbsp物距像距法(凹)</a></li>
					<li role="presentation"><a href="#lab_1061_4" aria-controls="实验四 共轭法测凸透镜焦距" role="tab" data-toggle="tab">Lab4&nbsp共轭法(凸)</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1061-1 ">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1061_1">
					<table class="table table-condensed table-hover table-striped" id="table1061_wujuxiangjuT">
					<thead>
						<tr>
							<th></th>
							<th>光源(mm)</th>
							<th>光屏(mm)</th>
							<th>凸透镜1(mm)</th>
							<th>凸透镜2(mm)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="5"><span class="badge">u大于f小于2f  成倒立放大实像</span></td>
						</tr>
						<tr>
							<td>1</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 光源距离1" id="wt1_guangyuan1" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 光屏距离1" id="wt1_guangping1" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 透镜一距离1" id="wt1_tutoujing11" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 透镜二距离1" id="wt1_tutoujing21" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 光源距离2" id="wt1_guangyuan2" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 光屏距离2" id="wt1_guangping2" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 透镜一距离2" id="wt1_tutoujing12" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 透镜二距离2" id="wt1_tutoujing22" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 光源距离3" id="wt1_guangyuan3" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 光屏距离3" id="wt1_guangping3" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 透镜一距离3" id="wt1_tutoujing13" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立放大实像 透镜二距离3" id="wt1_tutoujing23" ></td>
						</tr>
						<tr>
							<td colspan="6"><span class="badge">u等于2f  成倒立等大实像</span></td>
						</tr>
						<tr>
							<td>1</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 光源距离1" id="wt2_guangyuan1" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 光屏距离1" id="wt2_guangping1" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 透镜一距离1" id="wt2_tutoujing11" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 透镜二距离1" id="wt2_tutoujing21" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 光源距离2" id="wt2_guangyuan2" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 光屏距离2" id="wt2_guangping2" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 透镜一距离2" id="wt2_tutoujing12" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 透镜二距离2" id="wt2_tutoujing22" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 光源距离3" id="wt2_guangyuan3" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 光屏距离3" id="wt2_guangping3" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 透镜一距离3" id="wt2_tutoujing13" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立等大实像 透镜二距离3" id="wt2_tutoujing23" ></td>
						</tr>
						<tr>
							<td colspan="6"><span class="badge">u大于2f  成倒立缩小实像</span></td>
						</tr>
						<tr>
							<td>1</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 光源距离1" id="wt3_guangyuan1" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 光屏距离1" id="wt3_guangping1" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 透镜一距离1" id="wt3_tutoujing11" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 透镜二距离1" id="wt3_tutoujing21" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 光源距离2" id="wt3_guangyuan2" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 光屏距离2" id="wt3_guangping2" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 透镜一距离2" id="wt3_tutoujing12" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 透镜二距离2" id="wt3_tutoujing22" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 光源距离3" id="wt3_guangyuan3" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 光屏距离3" id="wt3_guangping3" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 透镜一距离3" id="wt3_tutoujing13" ></td>
							<td><input class="para 1061_1 form-control" type="text" aria-label="倒立缩小实像 透镜二距离3" id="wt3_tutoujing23" ></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1061_2">
					<table class="table table-condensed table-hover table-striped" id="table1061_zizhunzhi">
					<thead>
						<tr>
							<th></th>
							<th>光源(mm)</th>
							<th>光屏(mm)</th>
							<th>凸透镜1(mm)</th>
							<th>凸透镜2(mm)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光源距离1" id="z_guangyuan1" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光屏距离1" id="z_guangping1" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜一距离1" id="z_tutoujing11" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜二距离1" id="z_tutoujing21" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光源距离2" id="z_guangyuan2" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光屏距离2" id="z_guangping2" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜一距离2" id="z_tutoujing12" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜二距离2" id="z_tutoujing22" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光源距离3" id="z_guangyuan3" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光屏距离3" id="z_guangping3" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜一距离3" id="z_tutoujing13" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜二距离3" id="z_tutoujing23" ></td>
						</tr>
						<tr>
							<td>4</td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光源距离4" id="z_guangyuan4" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光屏距离4" id="z_guangping4" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜一距离4" id="z_tutoujing14" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜二距离4" id="z_tutoujing24" ></td>
						</tr>
						<tr>
							<td>5</td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光源距离5"  id="z_guangyuan5" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="光屏距离5" id="z_guangping5" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜一距离5" id="z_tutoujing15" ></td>
							<td><input class="para 1061_2 form-control" type="text" aria-label="透镜二距离5" id="z_tutoujing25" ></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1061_3">
					<table class="table table-condensed table-hover table-striped" id="table1061_wujuxiangjuA">
					<thead>
						<tr>
							<th></th>
							<th>光屏1(mm)</th>
							<th>光屏2(mm)</th>
							<th>凹透镜1(mm)</th>
							<th>凹透镜2(mm)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="光屏一距离1" id="wa_guangyuan1" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="光屏二距离1" id="wa_guangping1" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="透镜一距离1" id="wa_tutoujing11" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="透镜二距离1" id="wa_tutoujing21" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="光屏一距离2" id="wa_guangyuan2" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="光屏二距离2" id="wa_guangping2" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="透镜一距离2" id="wa_tutoujing12" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="透镜二距离2" id="wa_tutoujing22" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="光屏一距离3" id="wa_guangyuan3" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="光屏二距离3" id="wa_guangping3" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="透镜一距离3" id="wa_tutoujing13" ></td>
							<td><input class="para 1061_3 form-control" type="text" aria-label="透镜二距离3" id="wa_tutoujing23" ></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1061_4">
					<table class="table table-condensed table-hover table-striped" id="table1061_gonge ">
					<thead>
						<tr>
							<th></th>
							<th>光源(mm)</th>
							<th>大像1(mm)</th>
							<th>大像2(mm)</th>
							<th>小像1(mm)</th>
							<th>小像2(mm)</th>
							<th>光屏(mm)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光源距离1" id="g_guangyuan1" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像一距离1" id="g_daxiang11" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像二距离1" id="g_daxiang21" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像一距离1" id="g_xiaoxiang11" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像二距离1" id="g_xiaoxiang21" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光屏距离1" id="g_ping1"></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光源距离2" id="g_guangyuan2" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像一距离2" id="g_daxiang12" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像二距离2" id="g_daxiang22" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像一距离2" id="g_xiaoxiang12" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像二距离2" id="g_xiaoxiang22" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光屏距离2" id="g_ping2"></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光源距离3" id="g_guangyuan3" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像一距离3" id="g_daxiang13" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像二距离3" id="g_daxiang23" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像一距离3" id="g_xiaoxiang13" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像二距离3" id="g_xiaoxiang23" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光屏距离3" id="g_ping3"></td>
						</tr>
						<tr>
							<td>4</td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光源距离4" id="g_guangyuan4" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像一距离4" id="g_daxiang14" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像二距离4" id="g_daxiang24" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像一距离4" id="g_xiaoxiang14" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像二距离4" id="g_xiaoxiang24" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光屏距离4" id="g_ping4"></td>
						</tr>
						<tr>
							<td>5</td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光源距离5" id="g_guangyuan5" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像一距离5" id="g_daxiang15" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="大像二距离5" id="g_daxiang25" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像一距离5" id="g_xiaoxiang15" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="小像二距离5" id="g_xiaoxiang25" ></td>
							<td><input class="para 1061_4 form-control" type="text" aria-label="光屏距离5" id="g_ping5"></td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
			<div id="modal-footer-1061-1">
				<div class="form-group" style="float:right;">
					<label for="check_1061_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1061_1 check-ios" id="check_1061_1" name="check_1061" type="checkbox">
						<label for="check_1061_1"></label>
						<span></span>
					</div>
					<label for="check_1061_2">&nbsp Lab2&nbsp </label>
					<div class="holder">
						<input class="1061_2 check-ios" id="check_1061_2" name="check_1061" type="checkbox">
						<label for="check_1061_2"></label>
						<span></span>
					</div>
					<label for="check_1061_3">&nbsp Lab3&nbsp </label>
					<div class="holder">
						<input class="1061_3 check-ios" id="check_1061_3" name="check_1061" type="checkbox">
						<label for="check_1061_3"></label>
						<span></span>
					</div>
					<label for="check_1061_4">&nbsp Lab4&nbsp </label>
					<div class="holder">
						<input class="1061_4 check-ios" id="check_1061_4" name="check_1061" type="checkbox">
						<label for="check_1061_4"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1061" style="display:block;"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1061" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1061">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="lab_table_1071">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1071&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1071_1" aria-controls="实验一 反射法求三棱镜的顶角" role="tab" data-toggle="tab">Lab1&nbsp反射法求三棱镜顶角</a></li>
					<li role="presentation"><a href="#lab_1071_2" aria-controls="实验二 最小偏向角法测棱镜的折射率" role="tab" data-toggle="tab">Lab2&nbsp最小偏向角法测棱镜折射率</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1071-1">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1071_1">
					<table class="table table-condensed table-hover table-striped" id="table1071_fanshefa">
					<caption class="well">	θ=((α2-α1)+(β2-β1))/2,θ值应为120左右,角度输入形式为x.y，表示x度y分,其中x为度数，y为分数</caption>
					<thead>
						<tr>
							<th></th>
							<th>入射角α1(mm)</th>
							<th>反射角α2(mm)</th>
							<th>入射角β1(mm)</th>
							<th>反射角β2(mm)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1071_1 form-control" aria-label="入射角α1值1" type="text" id="a11" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角α2值1" type="text" id="a21" ></td>
							<td><input class="para 1071_1 form-control" aria-label="入射角β1值1" type="text" id="b11" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角β2值1" type="text" id="b21" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1071_1 form-control" aria-label="入射角α1值2" type="text" id="a12" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角α2值2" type="text" id="a22" ></td>
							<td><input class="para 1071_1 form-control" aria-label="入射角β1值2" type="text" id="b12" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角β2值2" type="text" id="b22" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1071_1 form-control" aria-label="入射角α1值3" type="text" id="a13" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角α2值3" type="text" id="a23" ></td>
							<td><input class="para 1071_1 form-control" aria-label="入射角β1值3" type="text" id="b13" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角β2值3" type="text" id="b23" ></td>
						</tr>
						<tr>
							<td>4</td>
							<td><input class="para 1071_1 form-control" aria-label="入射角α1值4" type="text" id="a14" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角α2值4" type="text" id="a24" ></td>
							<td><input class="para 1071_1 form-control" aria-label="入射角β1值4" type="text" id="b14" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角β2值4" type="text" id="b24" ></td>
						</tr>
						<tr>
							<td>5</td>
							<td><input class="para 1071_1 form-control" aria-label="入射角α1值5" type="text" id="a15" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角α2值5" type="text" id="a25" ></td>
							<td><input class="para 1071_1 form-control" aria-label="入射角β1值5" type="text" id="b15" ></td>
							<td><input class="para 1071_1 form-control" aria-label="反射角β2值5" type="text" id="b25" ></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1071_2">
					<table class="table table-condensed table-hover table-striped" id="table1071_zuixiaopianxiang">
						<caption class="well">δmin=((α2-α1)+(β2-β1))/2,δmin值应为51左右,角度输入形式为x.y，表示x度y分,x为度数，y为分数</caption>
						<thead>
							<tr>
								<th></th>
								<th>入射角α1(mm)</th>
								<th>折射角α2(mm)</th>
								<th>入射角β1(mm)</th>
								<th>折射角β2(mm)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><input class="para 1071_2 form-control" aria-label="入射角α1值1" type="text" id="ra11" ></td>
								<td><input class="para 1071_2 form-control" aria-label="折射角α2值1" type="text" id="ra21" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β1值1" type="text" id="rb11" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β2值1" type="text" id="rb21" ></td>
							</tr>
							<tr>
								<td>2</td>
								<td><input class="para 1071_2 form-control" aria-label="入射角α1值2" type="text" id="ra12" ></td>
								<td><input class="para 1071_2 form-control" aria-label="折射角α2值2" type="text" id="ra22" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β1值2" type="text" id="rb12" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β2值2" type="text" id="rb22" ></td>
							</tr>
							<tr>
								<td>3</td>
								<td><input class="para 1071_2 form-control" aria-label="入射角α1值3" type="text" id="ra13" ></td>
								<td><input class="para 1071_2 form-control" aria-label="折射角α2值3" type="text" id="ra23" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β1值3" type="text" id="rb13" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β2值3" type="text" id="rb23" ></td>
							</tr>
							<tr>
								<td>4</td>
								<td><input class="para 1071_2 form-control" aria-label="入射角α1值4" type="text" id="ra14" ></td>
								<td><input class="para 1071_2 form-control" aria-label="折射角α2值4" type="text" id="ra24" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β1值4" type="text" id="rb14" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β2值4" type="text" id="rb24" ></td>
							</tr>
							<tr>
								<td>5</td>
								<td><input class="para 1071_2 form-control" aria-label="入射角α1值5" type="text" id="ra15" ></td>
								<td><input class="para 1071_2 form-control" aria-label="折射角α2值5" type="text" id="ra25" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β1值5" type="text" id="rb15" ></td>
								<td><input class="para 1071_2 form-control" aria-label="入射角β2值5" type="text" id="rb25" ></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div id="modal-footer-1071-1">
				<div class="form-group" style="float:right;">
					<label for="check_1071_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1071_1 check-ios" id="check_1071_1" name="check_1071" type="checkbox">
						<label for="check_1071_1"></label>
						<span></span>
					</div>
					<label for="check_1071_2">&nbsp Lab2&nbsp </label>
					<div class="holder">
						<input class="1071_2 check-ios" id="check_1071_2" name="check_1071" type="checkbox">
						<label for="check_1071_2"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1071" style="display:block"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1071" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1071">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="lab_table_1081">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1081&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1081_1" aria-controls="实验一 激光双棱镜干涉" role="tab" data-toggle="tab">Lab1&nbsp激光双棱镜干涉</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1081-1">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1081_1">
					<table class="table table-condensed table-hover table-striped" id="table1081_jiguangshuangleng1">
					<thead>
						<tr>
							<td colspan="5"><span class="badge">仪器位置(mm)</span></td>
						</tr>
						<tr>
							<th><label for="1081_kuoshu">扩束镜K</label></th>
							<th><label for="1081_shuangleng">双棱镜B</label></th>
							<th><label for="1081_guangyuan">光源s</label></th>
							<th><label for="1081_xiaoxiang">小像S</label></th>
							<th><label for="1081_daxiang">大像S1</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="para 1081_1 form-control" type="text" aria-label="扩束镜K位置" id="1081_kuoshu" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="双棱镜B位置" id="1081_shuangleng" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="光源s位置" id="1081_guangyuan" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="小像S位置" id="1081_xiaoxiang" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="大像S1位置" id="1081_daxiang" ></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1081_jiguangshuangleng2">
					<thead>
						<tr>
							<td colspan="5"><span class="badge">成像位置(mm)</span></td>
						</tr>
						<tr>
							<th></th>
							<th>左1</th>
							<th>右1</th>
							<th>左2</th>
							<th>右2</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>大像</td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="大像左1位置" id="1081_dzuo1" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="大像右1位置" id="1081_dyou1" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="大像左2位置" id="1081_dzuo2" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="大像右2位置" id="1081_dyou2" ></td>
						</tr>
						<tr>
							<td>小像</td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="小像左1位置" id="1081_xzuo1" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="小像右1位置" id="1081_xyou1" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="小像左2位置" id="1081_xzuo2" ></td>
							<td><input class="para 1081_1 form-control" type="text" aria-label="小像右2位置" id="1081_xyou2" ></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1081_jiguangshuangleng3">
						<thead>
							<tr>
								<td><span colspan="2" class="badge">条纹位置(mm)</span></td>
							</tr>
							<tr>
								<th>序号(自下往上)</th>
								<th>条纹位置(mm)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置1" type="text" id="1081_x1"></td>
							</tr>
							<tr>
								<td>2</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置2" type="text" id="1081_x2"></td>
							</tr>
							<tr>
								<td>3</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置3" type="text" id="1081_x3"></td>
							</tr>
							<tr>
								<td>4</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置4" type="text" id="1081_x4"></td>
							</tr>
							<tr>
								<td>5</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置5" type="text" id="1081_x5"></td>
							</tr>
							<tr>	
								<td>6</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置6" type="text" id="1081_x6"></td>
							</tr>
							<tr>	
								<td>7</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置7" type="text" id="1081_x7"></td>
							</tr>
							<tr>	
								<td>8</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置8" type="text" id="1081_x8" ></td>
							</tr>
							<tr>	
								<td>9</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置9" type="text" id="1081_x9" ></td>
							</tr>
							<tr>	
								<td>10</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置10" type="text" id="1081_x10"></td>
							</tr>
							<tr>	
								<td>11</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置11" type="text" id="1081_x11"></td>
							</tr>
							<tr>	
								<td>12</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置12" type="text" id="1081_x12"></td>
							</tr>
							<tr>	
								<td>13</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置13" type="text" id="1081_x13" ></td>
							</tr>
							<tr>	
								<td>14</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置14" type="text" id="1081_x14" ></td>
							</tr>
							<tr>	
								<td>15</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置15" type="text" id="1081_x15"></td>
							</tr>
							<tr>	
								<td>16</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置16" type="text" id="1081_x16" ></td>
							</tr>
							<tr>
								<td>17</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置17" type="text" id="1081_x17"></td>
							</tr>
							<tr>
								<td>18</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置18" type="text" id="1081_x18"></td>
							</tr>
							<tr>	
								<td>19</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置19" type="text" id="1081_x19"></td>
							</tr>
							<tr>	
								<td>20</td>
								<td><input class="para 1081_1 form-control" aria-label="条纹位置20" type="text" id="1081_x20"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div id="modal-footer-1081">
				<div class="form-group" style="float:right;">
					<label for="check_1081_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1081_1 check-ios" id="check_1081_1" name="check_1081" type="checkbox">
						<label for="check_1081_1"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1081" style="display:block;"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1081" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1081">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="lab_table_1082">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1082&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1082_1" aria-controls="实验一 纳光双棱镜干涉" role="tab" data-toggle="tab">Lab1&nbsp纳光双棱镜干涉</a></li>
					<li role="presentation"><a href="#lab_1082_2" aria-controls="实验二 纳光劳埃镜干涉" role="tab" data-toggle="tab">Lab2&nbsp纳光劳埃镜干涉</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1082-1">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1082_1">
					<table class="table table-condensed table-hover table-striped" id="table1082_1_naguangshuangleng1">
					<thead>
						<tr>
							<td colspan="5"><span class="badge">仪器位置(mm)</span></td>
						</tr>
						<tr>
							<th><label for="1082_1_xiafeng">狭缝</label></th>
							<th><label for="1082_1__mujing">目镜</label></th>
							<th><label for="1082_1__shuangleng">双棱镜</label></th>
							<th><label for="1082_1__L1">L1(大)</label></th>
							<th><label for="1082_1__L2">L2(小)</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="para 1082_1 form-control" aria-label="狭缝位置" id="1082_1_xiafeng" ></td>
							<td><input class="para 1082_1 form-control" aria-label="目镜位置" id="1082_1__mujing" ></td>
							<td><input class="para 1082_1 form-control" aria-label="双棱镜位置" id="1082_1__shuangleng" ></td>
							<td><input class="para 1082_1 form-control" aria-label="L1(大)位置" id="1082_1__L1" ></td>
							<td><input class="para 1082_1 form-control" aria-label="L2(小)位置" id="1082_1__L2" ></td>
						</tr>
					</tbody>
					</tabel>
					<table class="table table-condensed table-hover table-striped" id="table1082_1_naguangshuangleng2">
					<thead>
						<tr>
							<td colspan="5"><span class="badge">成像位置(mm)</span></td>
						</tr>
						<tr>
							<th></th>
							<th>左1</th>
							<th>右1</th>
							<th>左2</th>
							<th>右2</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>大像</td>
							<td><input class="para 1082_1 form-control" aria-label="大像左1位置" id="1082_1__dzuo1" ></td>
							<td><input class="para 1082_1 form-control" aria-label="大像右1位置" id="1082_1__dyou1" ></td>
							<td><input class="para 1082_1 form-control" aria-label="大像左1位置" id="1082_1__dzuo2" ></td>
							<td><input class="para 1082_1 form-control" aria-label="大像右2位置" id="1082_1__dyou2" ></td>
						</tr>
						<tr>
							<td>小像</td>
							<td><input class="para 1082_1 form-control" aria-label="小像左1位置" id="1082_1__xzuo1" ></td>
							<td><input class="para 1082_1 form-control" aria-label="小像右1位置" id="1082_1__xyou1" ></td>
							<td><input class="para 1082_1 form-control" aria-label="小像左2位置" id="1082_1__xzuo2" ></td>
							<td><input class="para 1082_1 form-control" aria-label="小像右2位置" id="1082_1__xyou2" ></td>
						</tr>
					</tbody>
					</tabel>
					<table class="table table-condensed table-hover table-striped" id="table1082_1_naguangshuangleng3">
					<thead>
						<tr>
							<td><span colspan="2" class="badge">条纹位置(mm)</span></td>
						</tr>
						<tr>
							<th>序号(自下往上)</th>
							<th>条纹位置(mm)</th>
						</tr>	
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置1" id="1082_1_x1"></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置2" id="1082_1_x2"></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置3" id="1082_1_x3"></td>
						</tr>
						<tr>	
							<td>4</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置4" id="1082_1_x4"></td>
						</tr>
						<tr>	
							<td>5</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置5" id="1082_1_x5"></td>
						</tr>
						<tr>	
							<td>6</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置6" id="1082_1_x6"></td>
						</tr>
						<tr>	
							<td>7</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置7" id="1082_1_x7"></td>
						</tr>
						<tr>	
							<td>8</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置8" id="1082_1_x8" ></td>
						</tr>
						<tr>	
							<td>9</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置9" id="1082_1_x9" ></td>
						</tr>
						<tr>	
							<td>10</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置10" id="1082_1_x10"></td>
						</tr>
						<tr>	
							<td>11</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置11" id="1082_1_x11"></td>
						</tr>
						<tr>	
							<td>12</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置12" id="1082_1_x12"></td>
						</tr>
						<tr>	
							<td>13</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置13" id="1082_1_x13" ></td>
						</tr>
						<tr>	
							<td>14</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置14" id="1082_1_x14" ></td>
						</tr>
						<tr>	
							<td>15</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置15" id="1082_1_x15"></td>
						</tr>
						<tr>	
							<td>16</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置16" id="1082_1_x16" ></td>
						</tr>
						<tr>
							<td>17</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置17" id="1082_1_x17"></td>
						</tr>
						<tr>
							<td>18</td>	
							<td><input class="para 1082_1 form-control" aria-label="条纹位置18" id="1082_1_x18"></td>
						</tr>
						<tr>
							<td>19</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置19" id="1082_1_x19"></td>
						</tr>
						<tr>
							<td>20</td>
							<td><input class="para 1082_1 form-control" aria-label="条纹位置20" id="1082_1_x20"></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1082_2">
					<table class="table table-condensed table-hover table-striped" id="table1082_2_naguangshuangleng1">
					<thead>
						<tr>
							<td colspan="5"><span class="badge">仪器位置(mm)</span></td>
						</tr>
						<tr>
							<th><label for="1082_2_xiafeng">狭缝</label></th>
							<th><label for="1082_2__mujing">目镜</label></th>
							<th><label for="1082_2__shuangleng">劳埃镜</label></th>
							<th><label for="1082_2__L1">L1(大)</label></th>
							<th><label for="1082_2__L2">L2(小)</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="para 1082_2 form-control" aria-label="狭缝位置" id="1082_2_xiafeng" ></td>
							<td><input class="para 1082_2 form-control" aria-label="目镜位置" id="1082_2__mujing" ></td>
							<td><input class="para 1082_2 form-control" aria-label="劳埃镜位置" id="1082_2__shuangleng" ></td>
							<td><input class="para 1082_2 form-control" aria-label="L1(大)位置" id="1082_2__L1" ></td>
							<td><input class="para 1082_2 form-control" aria-label="L2(小)位置" id="1082_2__L2" ></td>
						</tr>
					</tbody>
					</tabel>
					<table class="table table-condensed table-hover table-striped" id="table1082_2_naguangshuangleng2">
					<thead>
						<tr>
							<td colspan="5"><span class="badge">成像位置(mm)</span></td>
						</tr>
						<tr>
							<th></th>
							<th>左1</th>
							<th>右1</th>
							<th>左2</th>
							<th>右2</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>大像</td>
							<td><input class="para 1082_2 form-control" aria-label="大像左1位置" id="1082_2__dzuo1" ></td>
							<td><input class="para 1082_2 form-control" aria-label="大像右1位置" id="1082_2__dyou1" ></td>
							<td><input class="para 1082_2 form-control" aria-label="大像左1位置" id="1082_2__dzuo2" ></td>
							<td><input class="para 1082_2 form-control" aria-label="大像右2位置" id="1082_2__dyou2" ></td>
						</tr>
						<tr>
							<td>小像</td>
							<td><input class="para 1082_2 form-control" aria-label="小像左1位置" id="1082_2__xzuo1" ></td>
							<td><input class="para 1082_2 form-control" aria-label="小像右1位置" id="1082_2__xyou1" ></td>
							<td><input class="para 1082_2 form-control" aria-label="小像左2位置" id="1082_2__xzuo2" ></td>
							<td><input class="para 1082_2 form-control" aria-label="小像右2位置" id="1082_2__xyou2" ></td>
						</tr>
					</tbody>
					</tabel>
					<table class="table table-condensed table-hover table-striped" id="table1082_2_naguangshuangleng3">
					<thead>
						<tr>
							<td><span colspan="2" class="badge">条纹位置(mm)</span></td>
						</tr>
						<tr>
							<th>序号(自下往上)</th>
							<th>条纹位置(mm)</th>
						</tr>	
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置1" id="1082_2_x1"></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置2" id="1082_2_x2"></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置3" id="1082_2_x3"></td>
						</tr>
						<tr>	
							<td>4</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置4" id="1082_2_x4"></td>
						</tr>
						<tr>	
							<td>5</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置5" id="1082_2_x5"></td>
						</tr>
						<tr>	
							<td>6</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置6" id="1082_2_x6"></td>
						</tr>
						<tr>	
							<td>7</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置7" id="1082_2_x7"></td>
						</tr>
						<tr>	
							<td>8</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置8" id="1082_2_x8" ></td>
						</tr>
						<tr>	
							<td>9</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置9" id="1082_2_x9" ></td>
						</tr>
						<tr>	
							<td>10</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置10" id="1082_2_x10"></td>
						</tr>
						<tr>	
							<td>11</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置11" id="1082_2_x11"></td>
						</tr>
						<tr>	
							<td>12</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置12" id="1082_2_x12"></td>
						</tr>
						<tr>	
							<td>13</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置13" id="1082_2_x13" ></td>
						</tr>
						<tr>	
							<td>14</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置14" id="1082_2_x14" ></td>
						</tr>
						<tr>	
							<td>15</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置15" id="1082_2_x15"></td>
						</tr>
						<tr>	
							<td>16</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置16" id="1082_2_x16" ></td>
						</tr>
						<tr>
							<td>17</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置17" id="1082_2_x17"></td>
						</tr>
						<tr>
							<td>18</td>	
							<td><input class="para 1082_2 form-control" aria-label="条纹位置18" id="1082_2_x18"></td>
						</tr>
						<tr>
							<td>19</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置19" id="1082_2_x19"></td>
						</tr>
						<tr>
							<td>20</td>
							<td><input class="para 1082_2 form-control" aria-label="条纹位置20" id="1082_2_x20"></td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
			<div id="modal-footer-1082-1">
				<div class="form-group" style="float:right;">
					<label for="check_1082_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1082_1 check-ios" id="check_1082_1" name="check_1082" type="checkbox">
						<label for="check_1082_1"></label>
						<span></span>
					</div>
					<label for="check_1082_2">&nbsp Lab2&nbsp </label>
					<div class="holder">
						<input class="1082_2 check-ios" id="check_1082_2" name="check_1082" type="checkbox">
						<label for="check_1082_2"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1082" style="display:block;"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1082" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1082">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="lab_table_1091">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"><h4><span class="label label-danger">&nbsp 1091&nbsp </span> &nbsp </h4></li>
					<li role="presentation" class="active"><a href="#lab_1091_1" aria-controls="实验一 迈克尔逊干涉" role="tab" data-toggle="tab">Lab1&nbsp迈克尔逊干涉</a></li>
					<li role="presentation"><a href="#lab_1091_2" aria-controls="实验二 牛顿环干涉" role="tab" data-toggle="tab">Lab2&nbsp牛顿环干涉</a></li>
					<li role="presentation"><a href="#lab_1091_3" aria-controls="实验三 劈尖干涉" role="tab" data-toggle="tab">Lab3&nbsp劈尖干涉</a></li>
				</ul>
			</div>
			<div class="table-autoscroll well tab-content" id="modal-body-1091-1">
				<div role="tabpanel" class="tab-pane fade in active" id="lab_1091_1">
					<table class="table table-condensed table-hover table-striped" id="table1091_maikeerxun">
						<thead>
							<tr>
								<th>位置</th>
								<th>d(mm)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>初始</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="初始位置d值" id="1091_1_d0"></td>
							</tr>
							<tr>
								<td>100</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="100位置d值" id="1091_1_d100"></td>
							</tr>
							<tr>	
								<td>200</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="200位置d值" id="1091_1_d200"></td>
							</tr>
							<tr>
								<td>300</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="300位置d值" id="1091_1_d300"></td>
							</tr>
							<tr>
								<td>400</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="400位置d值" id="1091_1_d400"></td>
							</tr>
							<tr>	
								<td>500</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="500位置d值" id="1091_1_d500"></td>
							</tr>
							<tr>
								<td>600</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="600位置d值" id="1091_1_d600"></td>
							</tr>
							<tr>
								<td>700</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="700位置d值" id="1091_1_d700"></td>
							</tr>
							<tr>
								<td>800</td>
								<td><input class="para 1091_1 form-control" type="text" aria-label="800位置d值" id="1091_1_d800"></td>
							</tr>
							<tr>
								<td>900</td>							
								<td><input class="para 1091_1 form-control" type="text" aria-label="900位置d值" id="1091_1_d900"></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1091_2">
					<table class="table table-condensed table-hover table-striped" id="table1091_niudunhuan">
					<thead>
						<tr>
							<th>环数</th>
							<th>左(mm)</th>
							<th>右(mm)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>11</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z11" aria-label="左环d值11"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y11" aria-label="右环d值11"></td>
						</tr>
						<tr>
							<td>12</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z12" aria-label="左环d值12"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y12" aria-label="右环d值12"></td>
						</tr>
						<tr>
							<td>13</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z13" aria-label="左环d值13"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y13" aria-label="右环d值13"></td>
						</tr>
						<tr>	
							<td>14</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z14" aria-label="左环d值14"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y14" aria-label="右环d值14"></td>
						</tr>
						<tr>	
							<td>15</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z15" aria-label="左环d值15"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y15" aria-label="右环d值15"></td>
						</tr>
						<tr>
							<td>16</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z16" aria-label="左环d值16"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y16" aria-label="右环d值16"></td>
						</tr>
						<tr>	
							<td>17</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z17" aria-label="左环d值17"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y17" aria-label="右环d值17"></td>
						</tr>
						<tr>	
							<td>18</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z18" aria-label="左环d值18"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y18" aria-label="右环d值18"></td>
						</tr>
						<tr>	
							<td>19</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z19" aria-label="左环d值19"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y19" aria-label="右环d值19"></td>
						</tr>
						<tr>	
							<td>20</td>
							<td><input class="para 1091_2 form-control" id="1091_2_z20" aria-label="左环d值20"></td>
							<td><input class="para 1091_2 form-control" id="1091_2_y20" aria-label="右环d值20"></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="lab_1091_3">
					<table class="table table-condensed table-hover table-striped" id="table1091_pijian_1">
					<thead>
						<tr>
							<th></th>
							<th>L左(mm)</th>
							<th>L右(mm)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L左值1" id="1091_3_z1" ></td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L右值1" id="1091_3_y1" ></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L左值2" id="1091_3_z2" ></td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L右值2" id="1091_3_y2" ></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L左值3" id="1091_3_z3" ></td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L右值3" id="1091_3_y3" ></td>
						</tr>
						<tr>	
							<td>4</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L左值4" id="1091_3_z4" ></td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L右值4" id="1091_3_y4" ></td>
						</tr>
						<tr>
							<td>5</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L左值5" id="1091_3_z5" ></td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="L右值5" id="1091_3_y5" ></td>
						</tr>
					</tbody>
					</table>
					<table class="table table-condensed table-hover table-striped" id="table1091_pijian_2">
					<thead>
						<tr>
							<th>序号</th>
							<th>x偏移距离</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>0</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0处x值" id="1091_4_x1" ></td>
						</tr>
						<tr>
							<td>0+5</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+5处x值" id="1091_4_x5" ></td>
						</tr>
						<tr>
							<td>0+10</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+10处x值" id="1091_4_x10" ></td>
						</tr>
						<tr>
							<td>0+15</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+15处x值" id="1091_4_x15" ></td>
						</tr>
						<tr>
							<td>0+20</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+20处x值" id="1091_4_x20" ></td>
						</tr>
						<tr>
							<td>0+25</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+25处x值" id="1091_4_x25" ></td>
						</tr>
						<tr>
							<td>0+30</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+30处x值" id="1091_4_x30" ></td>
						</tr>
						<tr>	
							<td>0+35</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+35处x值" id="1091_4_x35" ></td>
						</tr>
						<tr>
							<td>0+40</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+40处x值" id="1091_4_x40" ></td>
						</tr>
						<tr>
							<td>0+45</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+45处x值" id="1091_4_x45" ></td>
						</tr>
						<tr>
							<td>0+50</td>
							<td><input class="para 1091_3 form-control" type="text" aria-label="0+50处x值" id="1091_4_x50" ></td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
			<div id="modal-footer-1091-1">
				<div class="form-group" style="float:right;">
					<label for="check_1091_1">&nbsp Lab1&nbsp </label>
					<div class="holder">
						<input class="1091_1 check-ios" id="check_1091_1" name="check_1091" type="checkbox">
						<label for="check_1091_1"></label>
						<span></span>
					</div>
					<label for="check_1091_2">&nbsp Lab2&nbsp </label>
					<div class="holder">
						<input class="1091_2 check-ios" id="check_1091_2" name="check_1091" type="checkbox">
						<label for="check_1091_2"></label>
						<span></span>
					</div>
					<label for="check_1091_3">&nbsp Lab3&nbsp </label>
					<div class="holder">
						<input class="1091_3 check-ios" id="check_1091_3" name="check_1091" type="checkbox">
						<label for="check_1091_3"></label>
						<span></span>
					</div>
				</div><br/>
				<button type="button" class="btn-Save btn btn-lg btn-danger btn-block" id="btnSave_1091" style="display:block;"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp 保存！</button>
				<button type="button" class="btn-Error btn btn-lg btn-danger btn-block" id="btnError_1091" style="display:none;" disabled="disable"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp ：<span id="ErrorText_1091">请选择并完整填写至少一个实验</span></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="wrapper wrapper_navbar_top">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
		 　	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img src="./img/phylab_logo_single.svg" href="{{URL::route('index')}}" style="float:left;margin:0 0 0 20px;height:50px;"></img>
			<a class="navbar-brand" href="{{URL::route('index')}}" style="margin:0 40px 0 0px;">PhyLab</a>
		</div>
		<div class="collapse navbar-collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav navbar-left">
				<li class="active"><a href="{{URL::route('index')}}"><span class="glyphicon glyphicon-home"></span>&nbsp主页</a></li>
				<li><a href="##">社区</a></li>
				<li class="dropdown">
					<a href="##" data-toggle="dropdown" class="dropdown-toggle">服务<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a data-toggle="modal" data-target="#mymodal-signin"><span class="glyphicon glyphicon-flag"></span>&nbsp实验报告中心</a></li>
						<li class="disabled"><a>其他功能</a></li>
					</ul>
				</li>
				<li><a href="##">关于</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::route('user')}}">{{$username}}的个人中心</a></li>
                <li><a href="{{URL::route('logout')}}">登出</a></li>
            </ul>
		</div>
	</nav>
</div>
<div class="wrapper wrapper_contents" style="position:relative;top:60px;">
	<div class="container-fluid" style="margin-left:50px;margin-right:50px;">
		<div class="row">
			<div class="col-md-3" style="padding-top:0px;padding-bottom:0px;">
				<div class="row">
					<h2 class="text-left">
						<span>物理实验
							<small>数据报告中心</small>
						</span>
						<hr/>
					</h2>
				</div>
				<div class="row" style="padding-top:0px;">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<span class="glyphicon glyphicon-th-list">&nbsp </span>
									<a data-toggle="collapse" data-parent="#accordion" href="#lab_collapse">
										<span>实验选择<span class="caret" style="float:right;"></span></span>
									</a>
								</h4>
							</div>
							<div id="lab_collapse" class="panel-collapse collapse in">
								<div class="panel-body">
									<form class="form-inline container-fluid">
										<div class="row">
											<div class="form-group  col-md-7">
												<label for="InputLabIndex" class="sr-only">LabIndex</label>
												<input type="text" class="form-control lab_input" id="InputLabIndex" onkeypress="labIndexInput()" placeholder="请输入实验编号">
											 </div>
											<input type="button" class="btn btn-default-outline col-md-4" id="selectBtn" style="margin-left:10px;" onclick="selectBtnClick()"  value="Select"></input>
										</div>
									</form>
                                    <div style="display:none" id="back_info">
                                        @foreach ($reportTemplates as $rept)
                                        <a index="{{$rept['experimentId']}}" prepareLink="{{$rept['prepareLink']}}" db-id="{{$rept['id']}}"></a>
                                        @endforeach
                                    </div>
									<div class="alert alert-danger" role="alert" style="display:none;height:30px;padding:5px;">
										<span class="glyphicon glyphicon-remove-sign"></span><strong>&nbsp Error:</strong><span>&nbsp 请输入正确的实验序号!</span>
									</div>
									<div class="table-autoscroll" style="width:100%;height:29%;">
									   <table class="table table-condensed table-hover table-striped" style="width:100%;height:92%;">
									   <tbody class="table-small no-decoration">
										 @foreach ($reportTemplates as $rept)
                                         <tr>
                                           <td><a href="#" class="lab lab_index">{{$rept['experimentId']}}</a></td>
                                           <td><a href="#" class="lab lab_title" title="{{$rept['experimentId']}}">{{$rept['experimentName']}}</a></td>
                                         </tr>
                                         @endforeach
									   </tbody>
									 </table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="padding-top:20px;">
					<button class="btn btn-lg btn-danger btn-block" id="importBtn" disabled="disabled" onclick="importBtnClick()"><span class="glyphicon glyphicon-edit"></span>&nbsp录入实验数据</button>
				</div>
				<div class="row">
					<div class="col-md-5" style="padding:0;padding-top:10px;">
						<button class="btn btn-lg btn-warning btn-block"  type="submit" id="collectBtn"  disabled="disabled" onclick="collectBtnClick()"><span id="collectIco" class="glyphicon glyphicon-star-empty"></span>&nbsp <span id="collectText">收藏</span></button>
					</div>
					<div class="col-md-offset-1 col-md-6" style="padding:0;padding-top:10px;">
						<button class="btn btn-lg btn-info btn-block" type="submit" id="exportBtn" disabled="disabled" onclick="exportBtnClick()"><span class="glyphicon glyphicon-download-alt"></span>&nbsp生成报告</button>
					</div>
				</div>
				<br/><br/>
			</div>
			<div class="col-md-9" style="padding-left:30px;height:82%;">
				<div class="row"><br/></div>
				<div class="panel-group row" id="labReport" >
					<div class="panel panel-default pannel-autoscroll">
						<div class="panel-heading">
							<div class="panel-title">
								<h4 class="panel-title text-center">
									<span>实验报告&nbsp <span id="LabText" title="false"></span>&nbsp <span id="LabStatus" class="badge">帮助</span></span>
								</h4>
							</div>
						</div>
						<div class="panel-body" style="padding:5px;">
							<!--<iframe id="lab_window" src="lab_report.html" style="width:100%;height:92%;">
							</iframe>-->
                            <div id="firefox_pdf" style="display:none;">
								<object data="./prepare_pdf/phylab_test.pdf" type="application/pdf" id="pdf_object">
									<embed src="./prepare_pdf/phylab_test.pdf" type="application/pdf" id="pdf_embed" style="width:100%;height:92%;min-height:480px;"/>
								</object>
							</div>
							<div id="chrom_pdf" style="width:100%;height:92%;min-height:500px;display:none">
							</div>
						</div>
					</div><br/>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wrapper wrapper_navbar_foot">
	<nav class="navbar navbar-inverse navbar-fixed-bottom" style="min-height:20px;">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-right text-ch"  style="padding-top:0.25%;">
				<li class="text-white text-ch" style="float:right;opacity:0.7;font-size:13px">Developed By BUAA-SCSE 软件攻城队&nbsp &nbsp &nbsp &nbsp &nbsp </li>
			</ul>
		</div>
	</nav>
</div>

<script src="./js/jquery-2.1.4.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/global.js"></script>
<script src="./js/reportCore.js"></script>
<script src="./js/pdfobject.js"></script>
<script src="./js/xmlInteraction.js"></script>
<script src="./js/test.js"></script>

</body>
</html>
