<?php
    class UI
	{
		public static function GridView($rs, $rotulos, $chave, $temEditar, $temExcluir)
		{
			echo("<table>\n");
				echo("\t<tr>\n");
				foreach($rotulos as $rotulo)
				{
					echo("\t\t<th>\n");
					echo("\t\t\t$rotulo\n");
					echo("\t\t</th>\n");
				}
				
				if ($temEditar)
				{
					echo("\t\t<th>\n");
					echo("\t\t\t&nbsp;\n");
					echo("\t\t</th>\n");
				}

				if ($temExcluir)
				{
					echo("\t\t<th>\n");
					echo("\t\t\t&nbsp;\n");
					echo("\t\t</th>\n");
				}
				
				echo("\t</tr>\n");
				while ($obj = mysql_fetch_object($rs))
				{
					echo("\t<tr>\n");
					foreach($obj as $campo=>$valor)
					{
						echo("\t\t<td>\n");
						echo("\t\t\t$valor\n");
						echo("\t\t</td>\n");
					}

					if ($temEditar)
					{
						echo("\t\t<td style='text-align:center'>\n");
						echo("\t\t\t<input type='button' value='Editar' onclick='Editar(".$obj->$chave.")'\n");
						echo("\t\t</td>\n");
					}

					if ($temExcluir)
					{
						echo("\t\t<td style='text-align:center'>\n");
						echo("\t\t\t<input type='button' value='Excluir' onclick='Excluir(".$obj->$chave.")'\n");
						echo("\t\t</td>\n");
					}

					echo("\t</tr>\n");
				}
			echo("</table>\n");
		}
		
		public static function MontaCombo($rs, $nome, $chave, $descricao, $temSelecione, $classe, $onchange)
		{
			echo("<select name='$nome' class='$classe' onchange='$onchange'>\n");
			if ($temSelecione)
			{
				echo("\t<option value=''>\n");
				echo('--Selecione--');
				echo("\t</option>\n");

			}			
			while ($obj = mysql_fetch_object($rs))
			{
				echo("\t<option value='". $obj->$chave ."'>\n");
				echo($obj->$descricao);
				echo("\t</option>\n");
			}
			echo("</select>\n");
		}

          public static function MontaCombo2($rs, $nome, $chave, $descricao, $temSelecione, $classe, $onchange, $valor)
		{
			echo("<select name='$nome' class='$classe' onchange='$onchange'>\n");
			if ($temSelecione)
			{
				echo("\t<option value='.$valor.'>\n");
				echo($valor);
				echo("\t</option>\n");

			}
			while ($obj = mysql_fetch_object($rs))
			{
				echo("\t<option value='". $obj->$chave ."'>\n");
				echo($obj->$descricao);
				echo("\t</option>\n");
			}
			echo("</select>\n");
		}
		
		
		public static function removerCaracter($string){
		$string = ereg_replace("[����]","a",$string);
		$string = ereg_replace("[����]","A",$string);
		$string = ereg_replace("[���]","e",$string);
		$string = ereg_replace("[���]","E",$string);
		$string = ereg_replace("[��]","i",$string);
		$string = ereg_replace("[��]","I",$string);
		$string = ereg_replace("[�����]","o",$string);
		$string = ereg_replace("[����]","O",$string);
		$string = ereg_replace("[���]","u",$string);
		$string = ereg_replace("[���]","U",$string);
		$string = ereg_replace("�","c",$string);
		$string = ereg_replace("�","C",$string);
		$string = ereg_replace("[][><}{)(:;,!?*%~^`&#@]","",$string);
		$string = ereg_replace(" "," ",$string);
		
		return $string;
}
		
	}
?>
