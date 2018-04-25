			function response(data) {
				$("#validate").resetForm();
				$('#mensagem').remove();
				$('<div id="mensagem" class="mensagem">'+data+'</div>')
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
						TxtEmail: {
							required: true,
							email: true,							
						},
						TxtSenha: {
							required: true,
							minlength: 7,
							maxlength: 7,
							remote: { url: "valida_senha.php", async: true } 
						},
						/*TxtCPF: {
							required: true,
							minlength: 11,
							maxlength: 11,
							remote: { url: "valida_cpf_banco.php", async: true } 
						},*/
						TxtConfirmaSenha: {
							required: true,
							minlength: 7,
							maxlength: 7,
							equalTo:"#senha"
						},
						TxtTelefone: {
							required: true,
							phone_number:true
						},
						TxtNomeCompleto: {
							required: true,							
						},
						TxtIdentidade: {
							required: true,
							remote: { url: "valida_identidade.php", async: true } 
						},
						TxtSaram: {
							required: true,	
							remote: { url: "valida_saram.php", async: true }
						},
						TxtNomeGuerra: {
							required: true,
						},
						TxtPostoGraduacao: {
							required: true,
						},
						TxtTipo: {
							required: true,
						},
						TxtMascara: {
							required: true,
						},
						TxtValor: {
							required: true,
						},
						TxtKey: {
							required: true,
						},
						TxtIp: {
							required: true,
						},
						TxtMac: {
							required: true,
						},
						TxtDescricao: {
							required: true,
						},
						TxtUsuarioCentral: {
							required: true,
						},
						TxtSenhaCentral: {
							required: true,
						},
						TxtUnidade: {
							required: true,
						},
						TxtPermissoes: {
							required: true,
						},
						
					},
					messages: {			
						TxtEmail: {
							required: 'Voc&ecirc; precisa preencher um e-mail',
							email: 'Endere&ccedil;o de e-mail n&atilde;o v&aacute;lido',
							remote:'Este email j&aacute; est&aacute; cadastrado'
						},
						TxtSenha: {
							required: 'Voc&ecirc; precisa preencher uma senha',
							minlength: 'Voc&ecirc; precisa digitar 7 caracteres num&eacute;ricos',
							maxlength: 'Voc&ecirc; precisa digitar 7 caracteres num&eacute;ricos',
							remote:'Esta senha j&aacute; est&aacute; cadastrada'
						},
						/*TxtCPF: {
							required: 'Voc&ecirc; precisa preencher um CPF',
							minlength: 'Voc&ecirc; precisa digitar 11 caracteres num&eacute;ricos',
							maxlength: 'Voc&ecirc; precisa digitar 11 caracteres num&eacute;ricos',
							remote:'CPF inv&aacute;lido ou j&aacute; cadastrado!'
						},*/
						TxtConfirmaSenha: {
							required: 'Voc&ecirc; precisa confirmar a senha',
							minlength: 'Voc&ecirc; precisa digitar 7 caracteres num&eacute;ricos',
							maxlength: 'Voc&ecirc; precisa digitar 7 caracteres num&eacute;ricos',
							equalTo: 'A senha n&atilde;o confere com a primeira'
						},
						TxtTelefone: {
							required: 'Voc&ecirc; precisa preencher um telefone',
							phone_number: 'Por favor verifique o n&uacute;mero de telefone'
						},						
						TxtNomeCompleto: {
							required: 'Voc&ecirc; precisa preencher o seu nome completo',							
						},
						TxtIdentidade: {
							required: 'Voc&ecirc; precisa inserir a Identidade',
							remote:'Esta Identidade est&aacute; cadastrada!',

						},
						TxtSaram: {
							required: 'Voc&ecirc; precisa preencher o SARAM',
							remote:'Saram ou N de Ordem est&aacute; cadastrado!',
						},
						TxtNomeGuerra: {
							required: 'Voc&ecirc; precisa preencher um nome de guerra',
						},
						TxtPostoGraduacao: {
							required: 'Escolha um Posto ou Gradua&ccedil;&atilde;o',
						},
						TxtPermissoes: {
							required: 'Escolha um Perfil',
						},
						TxtKey: {
							required: 'Insira uma palavra-chave',
						},
						TxtIp: {
							required: 'Insira o IP',
						},
						TxtMac: {
							required: 'Insira o MAC ADDRESS',
						},
						TxtDescricao: {
							required: 'Insira uma breve descricao da Central',
						},
						TxtUsuarioCentral: {
							required: 'Insira o usuario do SFTP',
						},
						TxtSenhaCentral: {
							required: 'Insira a senha do SFTP',
						},
						TxtUnidade: {
							required: 'Insira a Unidade',
						},
						TxtPermissoes: {
							required: 'Insira um Perfil',
						},
					}


				});

			});