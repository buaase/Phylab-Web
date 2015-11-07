function browser(){
    var userAgent = navigator.userAgent; 
    var isOpera = userAgent.indexOf("Opera") > -1;
    var browser_name=navigator.appName
    var b_version=navigator.appVersion
    var version=b_version.split(";");
    var trim_Version=version.length>1?version[1].replace(/[ ]/g,""):"UPON"; 
    if (isOpera) {
    return "Opera"
    }
    else if (userAgent.indexOf("Firefox") > -1) {
    return "FF";
    }
    else if (userAgent.indexOf("Chrome") > -1){
    return "Chrome";
    }
    else if (userAgent.indexOf("Safari") > -1) {
    return "Safari";
    }
    else if(browser_name=="Microsoft Internet Explorer"){
        if (trim_Version=="MSIE6.0") {
            return "IE6"; 
        } else if (trim_Version=="MSIE7.0") {
            return "IE7";
        } else if (trim_Version=="MSIE8.0") {
            return "IE8";
        } else {
            return "IE9+";
        }
    }
}
//alert(navigator.userAgent);
//alert(navigator.appName);
function cp(pdfPath){
    var myPDF = new PDFObject({ url: pdfPath }).embed("chrom_pdf");
}
if(browser()=="FF"){
	document.getElementById('firefox_pdf').style.display='block';
}
else if(browser()=="IE6"||browser()=="IE7"){
	alert("Please use the above version of IE8 or other browsers");
}
else {
	document.getElementById('chrom_pdf').style.display='block';
	cp('./prepare_pdf/phylab_test.pdf');
}
function changePdf(type,pdfName){
    var path = ""
    if(type=="prepare"){
        path = "./prepare_pdf/";
    }
    else if(type=="tmp"){
        path = "./pdf_tmp/";
    }
    else if(type=="star"){
        path = "./star_pdf/"
    }
	$("#pdf_object").attr("data",path+pdfName);
    $('#pdf_embed').attr("src",path+pdfName);
    cp(path+pdfName);
}