l_global = {};
l_global.numRow = 0;
l_global.fixedNum = 8;
l_global.googleJsAPI = false;

function appendRow2() {
	var id = l_global.numRow++;
	var str = "<tr class='row-%id%'><td class='order'>%idplus1%</td><td><div class='x-div control-group'><input type='text' class='x form-control'/></div></td><td><div class='y-div control-group'><input type='text' class='y form-control'/></div></td></tr>";
	str = str.replace(/%id%/g, id);
	str = str.replace(/%idplus1%/g, id + 1);
	$(".l-coordinate tbody").append(str);
}

function getX2(p) {
	return parseFloat($(".l-coordinate tbody .row-" + p + " .x").val());
}

function getY2(p) {
	return parseFloat($(".l-coordinate tbody .row-" + p + " .y").val());
}

function setX2(p, d) {
	return parseFloat($(".l-coordinate tbody .row-" + p + " .x").val(d));
}

function setY2(p, d) {
	return parseFloat($(".l-coordinate tbody .row-" + p + " .y").val(d));
}

function deleteRow2(p) {
	if (typeof(p) == "undefined") {
		p = l_global.numRow - 1;
	}
	if (p < 0 || p >= l_global.numRow) {
		return;
	}
	$(".l-coordinate tbody .row-" + p).remove();
	p++;
	while (p < l_global.numRow) {
		var dom = $(".l-coordinate tbody .row-" + p);
		dom.find(".order").html(p);
		dom.attr("class", "row-" + (p - 1));
		p++;
	}
	l_global.numRow--;
}

function isEmptyRow2(p) {
	var x = $(".l-coordinate tbody .row-" + p + " .x").val();
	var y = $(".l-coordinate tbody .row-" + p + " .y").val();
	if (x && x.length > 0) {
		return false;
	}
	if (y && y.length > 0) {
		return false;
	}
	return true;
}

function deleteEmptyRow2() {
	for (var i = 0; i < l_global.numRow; i++) {
		if (isEmptyRow2(i)) {
			deleteRow2(i);
			i--;
		}
	}
}

function emptyRow2() {
	while (l_global.numRow > 0) {
		deleteRow2();
	}
}

function initRow2() {
	while (l_global.numRow < 2) {
		appendRow2();
	}
}

function generateExample2() {
	emptyRow2();
	var sum = 0;
	for (var i = 0; i < 6; i++) {
		appendRow2();
		setX2(i, i*10);
		sum += parseInt(Math.random() * 100000) / 10000;
		setY2(i, sum);
	}
}

function drawChart2() {
	if (!l_global.googleJsAPI) {
		return false;
	}
	var data = new google.visualization.DataTable();
	data.addColumn('number', 'X');
	data.addColumn('number', 'Y');
	data.addColumn({
		type: 'boolean',
		role: 'certainty'
	});
	for (var i = 0; i < l_global.numRow; i++) {
		data.addRows([[getX2(i), getY2(i), true]]);
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
	
	var chart = new google.visualization.ScatterChart(document.getElementById('l-chart_div'));
	chart.draw(data, options);
}

function checkInput2() {
	var ret = true;
	for (var i = 0; i < l_global.numRow; i++) {
		var str  = $(".l-coordinate tbody .row-" + i + " .x").val();
		if (!str.match(/^-?\d+(\.\d+)?$/)) {
			$(".l-coordinate tbody .row-" + i + " .x-div").addClass("error");
			if (ret == true) {
				$(".l-coordinate tbody .row-" + i + " .x").focus();
			}
			ret = false;
		} else {
			$(".l-coordinate tbody .row-" + i + " .x-div").removeClass("error");
		}
		var str  = $(".l-coordinate tbody .row-" + i + " .y").val();
		if (!str.match(/^-?\d+(\.\d+)?$/)) {
			$(".l-coordinate tbody .row-" + i + " .y-div").addClass("error");
			if (ret == true) {
				$(".l-coordinate tbody .row-" + i + " .y").focus();
			}
			ret = false;
		} else {
			$(".l-coordinate tbody .row-" + i + " .y-div").removeClass("error");
		}
	}
	return ret;
}

function cacl2() {
	deleteEmptyRow2();
	if (l_global.numRow < 2) {
		initRow2();
		alert("请至少输入两行数据");
		return false;
	}
	if (!checkInput2()) {
		return false;
	}
	drawChart2();
	l_global.linearReg = new LinearRegression();
	for (var i = 0; i < l_global.numRow; i++) {
		l_global.linearReg.pushData(getX2(i), getY2(i));
	}
	$(".l-result #xAvg").html(l_global.linearReg.xAvg().toFixed(l_global.fixedNum));
	$(".l-result #yAvg").html(l_global.linearReg.yAvg().toFixed(l_global.fixedNum));
	$(".l-result #xyMulAvg").html(l_global.linearReg.xyMulAvg().toFixed(l_global.fixedNum));
	$(".l-result #xAvgYAvgMul").html((l_global.linearReg.xAvg() * l_global.linearReg.yAvg()).toFixed(l_global.fixedNum));
	$(".l-result #xSquareAvg").html(l_global.linearReg.xSquareAvg().toFixed(l_global.fixedNum));
	$(".l-result #xAvgSquare").html(l_global.linearReg.xAvgSquare().toFixed(l_global.fixedNum));
	$(".l-result #ySquareAvg").html(l_global.linearReg.ySquareAvg().toFixed(l_global.fixedNum));
	$(".l-result #yAvgSquare").html(l_global.linearReg.yAvgSquare().toFixed(l_global.fixedNum));
	$(".l-result #a").html(l_global.linearReg.a().toFixed(l_global.fixedNum));
	$(".l-result #b").html(l_global.linearReg.b().toFixed(l_global.fixedNum));
	$(".l-result #r").html(l_global.linearReg.r().toFixed(l_global.fixedNum));
	$(".l-result #muaA").html(l_global.linearReg.muaA().toFixed(l_global.fixedNum));
	$(".l-result #muaB").html(l_global.linearReg.muaB().toFixed(l_global.fixedNum));
	
	//New code here;
	$("#linear-regression-modalOk").modal('show');
	$("#linear-regression-modal").modal('hide');
}

function initGoogleJsAPI2() {
	l_global.googleJsAPI = true;
	google.load('visualization', '1', {packages: ['corechart'], "callback" : drawChart2});
}

function checkChartSupport2() {
	var ua = navigator.userAgent;
	return true;
}

$(document).ready(function(e) {
	$(".l-btn-add-row").click(function(e) {
		appendRow2();
	});
	$(".l-btn-empty").click(function(e) {
		if (window.confirm("确定要清空吗？")) {
			emptyRow2();	
			initRow2();
		}
	});
	$(".l-btn-del-row").click(function(e) {
		deleteEmptyRow2();
	});
	$(".l-btn-cacl").click(function(e) {
		cacl2();
	});
	$(".l-btn-example").click(function(e) {
		generateExample2();
	});
	for (var i = 0; i < 6; i++) {
		appendRow2();
	}
	
	if (checkChartSupport2()) {
		$("#google-jsapi2").attr("src", "https://www.google.com/jsapi?callback=initGoogleJsAPI2");
	}
});
