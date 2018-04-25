<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
$conn     = mysql_connect("localhost","root","root") or die ("Erro na conexão com servidor");
$db        = mysql_select_db("ison",$conn) or die ("Erro na seleção do banco");

//Sentença sql, não use limit aqui, o script de paginação irá tratar para você
$_pagi_sql = "SELECT * FROM tbUsuario";


//requeremos o arquivo que realiza todo o processo de paginação
require("paginator.inc.php");

//criamos uma tabela para organizar um pouco mais os dados, os adeptos do tableless que me perdoe rsrsr
echo "<table border=\"0\" cellpadding=\"3\" cellspacing=\"3\">";
echo "<tr bgcolor=\"#DDDDDD\"><th>Nome</th><th>Sobrenome</th><th>Fone</th>";
while($l = mysql_fetch_array($_pagi_result)){
    $nome        = ucfirst($l[0]);
    $sobrenome    = ucfirst($l[1]);
    $fone        = ucfirst($l[2]);
    echo "<tr bgcolor=\"#EEEEEE\"><td>$nome</td><td>$sobrenome</td><td>$fone</td>";
}
echo "</table>";

//incluimos a paginação
echo"<p>".$_pagi_navegacion."</p>";


?>
