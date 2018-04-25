<?php	
  class Seguranca
  {
  	  public static function Sair()
	  {
	  	 unset($_SESSION['usuario']);
		 unset($_SESSION['usuario_nome']);
		 unset($_SESSION['id']);
		 unset($_SESSION['permissao']);
		 unset($_SESSION['unidades']);
		 unset($_SESSION['unidades_real']);
		 unset($_SESSION['unidades_nome']);
		 unset($_SESSION['keypass']);
 	     header("Location: ../../");	
		 die();
	  }
	  
	  public static function VerificaLogado()
	  {
		 if (Seguranca::GetVarSegSESSION('usuario'))
 	 	    {
			header("Location: ../../views/home/index.php");	
			die();
			}
	  }
	
  	  public static function VerificaUsuario()
	  {
		 if (Seguranca::GetVarSegSESSION('permissao') < '1')
 	 	    {
			header("Location: ../../views/erros/naoautenticado.php");	
			die();
			}
	  }
	  
	  public static function VerificaTarifador()
	  {
		 if (Seguranca::GetVarSegSESSION('permissao') < '2')
 	 	    {
			header("Location: ../../views/erros/naoautorizado.php");	
			die();
			}
	  }
	  
	  public static function VerificaAdministrador()
	  {
		 if (Seguranca::GetVarSegSESSION('permissao') < '3')
 	 	    {
			header("Location: ../../views/erros/naoautorizado.php");	
			die();
			}
	  }
	  
	  public static function VerificaCentral()
	  {

		 if((($_SERVER['REMOTE_ADDR'])!="127.0.0.1")and(($_SERVER['REMOTE_ADDR'])!="10.114.64.4")and(($_SERVER['REMOTE_ADDR'])!="10.112.24.22"))
 	 	    {
			//header("Location: ../../views/erros/naoautorizado.php");	
			echo $_SERVER['REMOTE_ADDR'];
			die();
			}

			
	  }	   
	  public static function GetVarSegSESSION($var)
	  {
	 	return (isset($_SESSION[$var])) ? $_SESSION[$var] : '';
	  }
	  
  }
?>