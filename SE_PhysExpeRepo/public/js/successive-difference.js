s_global = {};
s_global.numRow = new Array();
s_global.numRow[1] = 0;
s_global.numRow[2] = 0;
s_global.fixedNum = 8;
s_global.googleJsAPI = false;

function appendRowOn(i) {
	var id = s_global.numRow[i]++;
	var str = "<tr class='row-%id%'><td class='order'>%idplus1%</td><td><div class='x-div control-group'><input type='text' class='x form-control'/></div></td><td><div class='y-div control-group'><input type='text' class='y form-control'/></div></td></tr>";
	str = str.replace(/%id%/g, id);
	str = str.replace(/%idplus1%/g, id + 1);
	$(".s-coordinate" + i +" tbody").append(str);
}

function appendRow() {
	appendRowOn(1);
	appendRowOn(2);
	initSyncFocus();
}

function getX(i, p) {
	return parseFloat($(".s-coordinate" + i + " tbody .row-" + p + " .x").val());
}

function getY(i, p) {
	return parseFloat($(".s-coordinate" + i + " tbody .row-" + p + " .y").val());
}

function setX(i, p, d) {
	return parseFloat($(".s-coordinate" + i + " tbody .row-" + p + " .x").val(d));
}

function setY(i, p, d) {
	return parseFloat($(".s-coordinate" + i + " tbody .row-" + p + " .y").val(d));
}

function deleteRowOn(i, p) {
	if (p < 0 || p >= s_global.numRow[i]) {
		return;
	}
	$(".s-coordinate" + i + " tbody .row-" + p).remove();
	p++;
	while (p < s_global.numRow[i]) {
		var dom = $(".s-coordinate tbody .row-" + p);
		dom.find(".order").html(p);
		dom.attr("class", "row-" + (p - 1));
		p++;
	}
	s_global.numRow[i]--;
}

function deleteRow(p) {
	if (typeof(p) == "undefined") {
		p = s_global.numRow[1] - 1;
	}
	deleteRowOn(1, p);
	deleteRowOn(2, p);
}

function isEmptyRowOn(i, p) {
	var x = $(".s-coordinate" + i + " tbody .row-" + p + " .x").val();
	var y = $(".s-coordinate" + i + " tbody .row-" + p + " .y").val();
	if (x && x.length > 0) {
		return false;
	}
	if (y && y.length > 0) {
		return false;
	}
	return true;
}

function isEmptyRow(p) {
	return isEmptyRowOn(1, p) && isEmptyRowOn(2, p);
}

function deleteEmptyRow() {
	for (var i = 0; i < s_global.numRow[1]; i++) {
		if (isEmptyRow(i)) {
			deleteRow(i);
			i--;
		}
	}
}

function emptyRow() {
	while (s_global.numRow[1] > 0) {
		deleteRow();
	}
}

function initRow() {
	while (s_global.numRow[1] < 1) {
		appendRow();
	}
}

function generateExample() {
	emptyRow();
	var sum = 0;
	for (var i = 0; i < 3; i++) {
		appendRow();
		setX(1, i, i*10);
		sum += parseInt(Math.random() * 100000) / 10000;
		setY(1, i, sum);
	}
	for (var i = 0; i < 3; i++) {
		setX(2, i, 30 + i*10);
		sum += parseInt(Math.random() * 100000) / 10000;
		setY(2, i, sum);
	}
}

function oddOrEven() {
	return s_global.numRow % 2;
}

function drawChart() {
	if (!s_global.googleJsAPI) {
		return false;
	}
	var data = new google.visualization.DataTable();
	data.addColumn('number', 'X');
	data.addColumn('number', 'Y');
	data.addColumn({
		type: 'boolean',
		role: 'certainty'
	});
	for (var i = 0; i < s_global.numRow[1]; i++) {
		data.addRows([[getX(1, i), getY(1, i), true]]);
	}
	for (var i = 0; i < s_global.numRow[2]; i++) {
		data.addRows([[getX(2, i), getY(2, i), true]]);
	}
	var options = {
		title: '直角坐标系',
		hAxis: {
			title: 'x',
			//minValue: -1,
			//maxValue: 1
		},
		vAxis: {
			title: 'y',
			//minValue: -1,
			//maxValue: 1
		},
		legend: 'none',
		axisTitlesPosition: 'in'
	};
	var chart = new google.visualization.ScatterChart(document.getElementById('s-chart_div'));
	chart.draw(data, options);
}

function checkInputOn(p) {
	var ret = true;
	for (var i = 0; i < s_global.numRow[p]; i++) {
		var str  = $(".s-coordinate" + p + " tbody .row-" + i + " .x").val();
		if (!str.match(/^-?\d+(\.\d+)?$/)) {
			$(".s-coordinate" + p + " tbody .row-" + i + " .x-div").addClass("error");
			if (ret == true) {
				$(".s-coordinate" + p + " tbody .row-" + i + " .x").focus();
			}
			ret = false;
		} else {
			$(".s-coordinate" + p + " tbody .row-" + i + " .x-div").removeClass("error");
		}
		var str  = $(".s-coordinate" + p + " tbody .row-" + i + " .y").val();
		if (!str.match(/^-?\d+(\.\d+)?$/)) {
			$(".s-coordinate" + p + " tbody .row-" + i + " .y-div").addClass("error");
			if (ret == true) {
				$(".s-coordinate" + p + " tbody .row-" + i + " .y").focus();
			}
			ret = false;
		} else {
			$(".s-coordinate" + p + " tbody .row-" + i + " .y-div").removeClass("error");
		}
	}
	return ret;
}

function checkInput() {
	var bool1 = checkInputOn(1);
	var bool2 = checkInputOn(2);
	return bool1 && bool2;
}

function cacl() {
	deleteEmptyRow();
	if (s_global.numRow[1] < 1) {
		appendRow();
		alert("请至少输入一组数据");
		return false;
	}
	if (!checkInput()) {
		return false;
	}
	drawChart();
	s_global.succDiff = new SuccessiveDifferenceMethod();
	for (var i = 0; i < s_global.numRow[1]; i++) {
		s_global.succDiff.pushData(getX(1, i), getY(1, i));
	}
	for (var i = 0; i < s_global.numRow[2]; i++) {
		s_global.succDiff.pushData(getX(2, i), getY(2, i));
	}
	$(".s-result #k").html(s_global.succDiff.num().toFixed(0));
	$(".s-result #n").html(s_global.succDiff.numDelta().toFixed(0));
	$(".s-result #xSum").html(s_global.succDiff.xSum().toFixed(s_global.fixedNum));
	$(".s-result #ySum").html(s_global.succDiff.ySum().toFixed(s_global.fixedNum))
	$(".s-result #a").html(s_global.succDiff.a().toFixed(s_global.fixedNum));
	$(".s-result #b").html(s_global.succDiff.b().toFixed(s_global.fixedNum));
	$(".s-result #muaB").html(s_global.succDiff.muaB().toFixed(s_global.fixedNum));
	//New code here
	$("#successive-difference-modalOk").modal('show');
	$("#successive-difference-modal").modal('hide');
}


function initSyncFocus() {
	for (var p = 1; p <= 2; p++) {
		var q = 3 - p;
		for (i = 0; i < s_global.numRow[p]; i++) {
			$(".s-coordinate" + p + " tbody .row-" + i + " .x").focusin({coor: q, row: i}, function(e) {
				$(".s-coordinate" + e.data.coor + " tbody .row-" + e.data.row + " .x").addClass("focused");
			});
			$(".s-coordinate" + p + " tbody .row-" + i + " .x").focusout({coor: q, row: i}, function(e) {
                $(".s-coordinate" + e.data.coor + " tbody .row-" + e.data.row + " .x").removeClass("focused");
            });
			$(".s-coordinate" + p + " tbody .row-" + i + " .y").focusin({coor: q, row: i}, function(e) {
				$(".s-coordinate" + e.data.coor + " tbody .row-" + e.data.row + " .y").addClass("focused");
			});
			$(".s-coordinate" + p + " tbody .row-" + i + " .y").focusout({coor: q, row: i}, function(e) {
                $(".s-coordinate" + e.data.coor + " tbody .row-" + e.data.row + " .y").removeClass("focused");
            });
		}
	}
}

function initGoogleJsAPI() {
	s_global.googleJsAPI = true;
	google.load('visualization', '1', {packages: ['corechart'], "callback" : drawChart});
}

function checkChartSupport() {
	var ua = navigator.userAgent;
	return true;
}

$(document).ready(function(e) {
	$(".s-btn-add-row").click(function(e) {
		appendRow();
	});
	$(".s-btn-empty").click(function(e) {
		if (window.confirm("确定要清空吗？")) {
			emptyRow();	
			initRow();
		}
	});
	$(".s-btn-del-row").click(function(e) {
		deleteEmptyRow();
	});
	$(".s-btn-cacl").click(function(e) {
		cacl();
	});
	$(".s-btn-example").click(function(e) {
		generateExample();
	});
	for (var i = 0; i < 3; i++) {
		appendRow();
	}
	if (checkChartSupport()) {
		$("#google-jsapi").attr("src", "https://www.google.com/jsapi?callback=initGoogleJsAPI");
	}
});
