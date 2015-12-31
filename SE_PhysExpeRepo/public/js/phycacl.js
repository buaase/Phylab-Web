/*
	PhyCacl v0.4
	Powered by Malash
	E-mail: phycacl@malash.me
	Web: http://malash.me/
*/

function LinearTable() {
	this.data = new Array();	
		
	/*
		更新线性表
	*/
	this.updateData = function (arr) {
			this.data = arr;
	}
	
	this.pushData = function (d) {
		this.data.push(d);
	}
	
	this.clearData = function () {
		this.data.splice(0, this.data.length);	
	}
	
	/*
		获得x[i]
	*/	
	this.get = function (i) {
		return this.data[i];
	}
	
	this.maxData = function () {
		
	}
	
	/*
		获得平方x[i]^2
	*/
	this.square = function (i) {
		return this.data[i] * this.data[i];	
	}
	
	this.squareSum = function () {
		var ret = 0;
		for (var i = 0; i < this.data.length; i++) {
			ret += this.data[i] * this.data[i];
		}
		return ret;
	}
	
	this.squareAvg = function () {
		return this.squareSum() / this.num();
	}
	
	/*
		x[i] - x[avg]
	*/
	this.delta = function (i) {
		return this.data[i] - this.average();
	}
	
	/*
		返回线性表总长度
		n
	*/
	this.num = function () {
		return this.data.length;
	}
	
	/*
		求和
		x[1]+x[2]+...+x[n]
	*/
	this.sum = function () {
		var ret = 0;
		for (var i = 0; i < this.data.length; i++) {
			ret += parseFloat(this.data[i]);
		}
		return ret;
	}

	/*
		平均值
		(x[1]+x[2]+...+x[n])/n
	*/
	this.average = function () {
		return this.sum() / this.num();
	}
	
	/*
		sum((x[i]-x[avg])^2)
	*/
	this.deltaSqrSum = function () {
		var avg = this.average();
		var ret = 0;
		for (var i = 0; i < this.data.length; i++) {
			ret += Math.pow(this.data[i] - avg, 2);
		}	
		return ret;
	}
	
	/*
		方差
		sum((x[i]-x[avg])^2)/n
	*/
	this.variance = function () {
		var ret = this.deltaSqrSum() / this.num();
		return ret;
	}
	
	/*
		标准差：Calculates standard deviation based on the entire population given as arguments. The standard deviation is a measure of how widely values are dispersed from the average value (the mean).
		http://office.microsoft.com/en-us/excel-help/stdevp-HP005209281.aspx
		σ(x) = sqrt( sum((x[i]-x[avg])^2)/n )
	*/
	this.stdevp = function () {
		return Math.sqrt(this.deltaSqrSum() / (this.num()));
	}
	
	/*
		有限次测量的标准偏差：Estimates standard deviation based on a sample. The standard deviation is a measure of how widely values are dispersed from the average value (the mean).
		http://office.microsoft.com/en-us/excel-help/stdev-HP005209277.aspx
		s(x) = sqrt( sum((x[i]-x[avg])^2)/(n-1) )
	*/
	this.stdev = function () {
		return Math.sqrt(this.deltaSqrSum() / (this.num() - 1));
	}

	this.avgstdev = function () {
		return this.stdev() / Math.sqrt(this.num());
	}
}

function LinearRegression() {
	this.x = new LinearTable();
	this.y = new LinearTable();
	
	this.num = function () {
		return this.x.num();
	}
	this.getX = function (i) {
		return this.x.get(i);
	}
	this.getY = function (i) {
		return this.y.get(i);
	}
	this.xAvg = function () {
		return this.x.average();
	}
	this.yAvg = function () {
		return this.y.average();
	}
	this.xSquareAvg = function () {
		return this.x.squareAvg();
	}
	this.ySquareAvg = function () {
		return this.y.squareAvg();
	}
	this.xAvgSquare = function () {
		return Math.pow(this.x.average(), 2);
	}
	this.yAvgSquare = function () {
		return Math.pow(this.y.average(), 2);
	}
	this.pushData = function (xData, yData) {
		this.x.pushData(xData);
		this.y.pushData(yData);
	}	
	this.xyMulSum = function () {
		var ret = 0;
		for (var i = 0; i < this.num(); i++)	{
			ret += this.x.get(i) * this.y.get(i);
		}
		return ret;
	}
	
	this.xyMulAvg = function () {
		return this.xyMulSum() / this.num();	
	}
	
	this.a = function () {
		return this.yAvg() - this.b() * this.xAvg();
	}

	this.b = function () {
		return (this.xAvg() * this.yAvg() - this.xyMulAvg())/(this.xAvgSquare() - this.xSquareAvg());
	}

	this.r = function () {
		return (this.xyMulAvg() - this.xAvg() * this.yAvg()) 
			/ Math.sqrt((this.xSquareAvg() - this.xAvgSquare()) * (this.ySquareAvg() - this.yAvgSquare()));
	}
	
	this.muaA = function () {
		return Math.sqrt(this.xSquareAvg()) * this.muaB();
	}
	
	this.muaB = function () {
		return this.b() * Math.sqrt((1 / Math.pow(this.r(), 2) - 1) / (this.num() - 2));
	}
}

function SuccessiveDifferenceMethod() {
	this.x = new LinearTable();
	this.y = new LinearTable();
	this.deltaX = null;
	this.deltaY = null;
	
	this.num = function () {
		return this.x.num();
	}
	this.numDelta = function () {
		return parseInt(this.num() / 2);
	}
	this.getX = function (i) {
		return this.x.get(i);
	}
	this.getY = function (i) {
		return this.y.get(i);
	}
	this.pushData = function (xData, yData) {
		this.deltaX = null;
		this.deltaY = null;
		this.x.pushData(xData);
		this.y.pushData(yData);
	}
	this.caclDelta = function () {
		if (this.deltaX && this.deltaY) {
			return;
		}
		this.deltaX = new LinearTable();
		this.deltaY = new LinearTable();
		var p = this.num() - this.numDelta();
		for (var i = 0; i < this.numDelta(); i++) {
			this.deltaX.pushData(this.x.get(i + p) - this.x.get(i));
			this.deltaY.pushData(this.y.get(i + p) - this.y.get(i));
		}
	}
	this.getDeltaX = function (i) {
		this.caclDelta();
		return this.deltaX.get(i);
	}
	this.getDeltaY = function (i) {
		this.caclDelta();
		return this.deltaY.get(i);
	}
	this.deltaYDeltaXDiv = function (i) {
		return this.getDeltaY(i) / this.getDeltaX(i);
	}
	this.deltaYDeltaXDivSum = function (i) {
		var ret = 0;
		for (var i = 0; i < this.numDelta(); i++) {
			ret += parseFloat(this.deltaYDeltaXDiv(i));
		}
		return ret;
	}
	this.xSum = function () {
		return this.x.sum();
	}
	this.ySum = function () {
		return this.y.sum();
	}
	this.getB = function (i) {
		return this.getDeltaY(i) / this.getDeltaX(i);
	}
	this.a = function () {
		return (this.ySum() - this.b() * this.xSum()) / this.num();
	}
	this.b = function () {
		return this.deltaYDeltaXDivSum() / this.numDelta();
	}
	this.muaB = function () {
		var ret = 0;
		var b = this.b();
		for (i = 0; i < this.numDelta(); i++) {
			ret += Math.pow(this.getB(i) - b, 2);
		}
		ret = ret / (this.num() * (this.num() - 1));
		ret = Math.sqrt(ret);
		return ret;
	}
}