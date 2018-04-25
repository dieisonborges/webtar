<?php

echo "<br /><br />Iniciando cópia nos clientes<br /><br />";

/* DIRETORIO DE ARQUIVOS .txt (Bilhetes) DOS CLIENTES */
$remote_dir="/home/tarifador/ligacoes_para_enviar/"; 


// Busca as Centrais Telefonicas no Banco de Dados
	$conexao = new Conexao();
	$dalcentralTelefonica = new DalcentralTelefonica($conexao);
	$rs_centralTelefonica = $dalcentralTelefonica->getTodosSemPag();
	
			while ($centralTelefonica = mysql_fetch_object($rs_centralTelefonica))
				{
					//Verifica se o Coletor estÃ¡ ATIVADO ou DESDATIVADO
					if($centralTelefonica->status==1)
					{
					// Verificando a conexao		
					if (ping($centralTelefonica->ip))
					{
									
						// SSH CONNECTION INFO
						
						echo "<br /><br /> Acessando a Central: $centralTelefonica->ip <br /><br />";						
						
						$connection = ssh2_connect($centralTelefonica->ip, 22);
						ssh2_auth_password($connection, $centralTelefonica->usuarioCentral, $centralTelefonica->senhaCentral);			
						
						$com ="ls $remote_dir"; 
						$stream = ssh2_exec($connection, $com); 
						stream_set_blocking($stream,true); 
						$cmd=fread($stream,4096); 
						
						$arr=explode("\n",$cmd); 
						
						$total_files=sizeof($arr); 
						
						for($i=0;$i<$total_files;$i++){ 
							$file_name=trim($arr[$i]); 
							if($file_name!=''){ 
								$remote_file=$remote_dir.$file_name;        
								$local_file=$local_dir.$file_name; 
								
								if(ssh2_scp_recv($connection, $remote_file,$local_file)){ 						
									echo "O arquivo ".$file_name." foi copiado com sucesso!<br />"; 
								}	
								//APAGA OS ARQUIVOS DO DIRETORIO Do COLETOR
								if(ssh2_exec($connection, 'rm '.$remote_file)){ 
									echo "O arquivo ".$file_name." foi APAGADO do coletor com sucesso!";
									echo $centralTelefonica->ip;
									echo " <br /><br />";
								}
								
									
								
							} 
						} 
						
						fclose($stream);					
						
					}
					else
						{
						echo "<br/> Sem CONEXAO DE REDE COM ESTE COLETOR <br/>";
						}
					}
					else
					{
						echo "<br />COLETOR DESATIVADO PELO USUARIO<br />";
					}
					
					
				
				}
	
	
?>
