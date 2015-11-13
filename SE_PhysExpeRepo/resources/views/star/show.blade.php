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
    cp("/star_pdf/{{$link}}");
</script>
<script src="/js/statistics.js"></script>
</body>
</html>
