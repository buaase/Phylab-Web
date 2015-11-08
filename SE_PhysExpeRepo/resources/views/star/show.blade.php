<html>
<head>
<script type="text/javascript" src="/js/pdfobject.js"></script>
</head>
<body>
<div id="firefox_pdf" style="display:none">
<object data="/star_pdf/{{$link}}" type="application/pdf" style="width:100%;height:100%;">
    <embed src="/star_pdf/{{$link}}" type="application/pdf" />
</object>
</div>
<div id="chrom_pdf" style="width:100%;height:100%;display:none">
</div>
<script src="/js/global.js"></script>
<script>
    if(browser()=="FF"){
        document.getElementById('firefox_pdf').style.display='block';
    }
    else if(browser()=="IE6"||browser()=="IE7"){
        alert("Please use the above version of IE8 or other browsers");
    }
    else {
        document.getElementById('chrom_pdf').style.display='block';
        cp("/star_pdf/{{$link}}");
    }
</script>
</body>
</html>