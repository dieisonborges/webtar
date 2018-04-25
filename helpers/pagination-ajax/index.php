<html>
<head>
<title>..::Paginação com ajax::..</title>
<style>
.paginacao{
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size: 10px;
    cursor: pointer;
}
</style>
<script src="script.js"></script>
<script>
    function pesquisa(pag)
        {
            url="busca.php?_pagi_pg="+pag;
            ajax(url);
        }
</script>        
</head>
<body onLoad="pesquisa(1)">
<div id="pagina"></div>
</body>
