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
