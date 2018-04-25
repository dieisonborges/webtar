<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Integra&ccedil;&atilde;o do Validate a Ajax Form para envio de formul&aacute;rios por ajax completo</title>
		<script language="JavaScript" type="text/javascript" src="libs/jquery.js"></script>
		<script language="JavaScript" type="text/javascript" src="libs/jquery.validate.js"></script>
		<script language="JavaScript" type="text/javascript" src="libs/jquery.form.js"></script>

		<script language="JavaScript" type="text/javascript" src="libs/additional-methods.js"></script>
		<script language="JavaScript" type="text/javascript">
			
			function response(data) {
				$("#validate").resetForm();
				$('#mensagem').remove();
				$('<div id="mensagem">'+data+'</div>')
				.hide()
				.insertAfter('h1')
				.fadeIn('slow');
			} 
			
			$(function(){

				$("#validate").validate({

					submitHandler: function(form) {
						$(form).ajaxSubmit({
							dataType: 'post',
							success: response
						});
					},
					rules: {
						nome: {
							required: true,
							remote: 'remote.php'
						},
						idade: {
							required: true,
							minAge: 18
						},
						email: {
							required: true,
							email: true
						},
						pais: 'required'
					},
					messages: {
						nome: {
							required: 'Voc&ecirc; n&atilde;o preencheu seu nome',
							remote: 'Este nome ja existe'
						},
						idade: {
							required: 'Voc&ecirc; n&atilde;o preencheu sua idade'
						},
						email: {
							required: 'Voc&ecirc; precisa preencher um e-mail',
							email: 'Endere&ccedil;o de e-mail n&atilde;o v&aacute;lido'
						},
						pais: 'Voc&ecirc; precisa escolher um pa&iacute;s'
					}


				});

			});

		</script>
		<link type="text/css" href="style.css" rel="stylesheet" />
	</head>
	<body>
		<h1>Validando formul&aacute;rios com o Validate para jQuery</h1>
		<p><em>fonte:</em><a href="http://blog.alexandremagno.net" target="_blank">Webpoint</a></p>

		<form name="validate" id="validate" action="enviar_dados.php" method="post">

			<label for="nome">Nome:</label>
			<input type="text" name="nome" />

			<label for="idade">Idade:</label>
			<input type="text" name="idade" />

			<label for="email">E-mail:</label>

			<input type="text" name="email" />

			<label for="pais">Pa&iacute;s:</label>
			<select type="text" name="pais">
				<option value="">Selecione</option>
				<option value="brasil">Brasil</option>
				<option value="canada">Inglaterra</option>

			</select>

			<input type="submit" value="Validar" />

		</form>


	</body>
</html>
