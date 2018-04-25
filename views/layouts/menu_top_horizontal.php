	
	<?php if(GetVarSESSION('permissao')>='1'){ ?>	
	<div class="menu">	
	
	<a href="../../scripts/login/sair.php" rel="Sair" class="botao_sair_menu_topo">SAIR</a>		
	
	<p class="informativo_status_unidade">Bem Vindo <strong><?php echo $_SESSION['usuario_nome']; ?></strong>! unidade: <strong><?php echo $_SESSION['unidades_nome']; ?></strong></p>
		
	<div id="qm0" class="qmmc">

	<a href="javascript:void(0)">Meu Usu&aacute;rio</a>		
		<div>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../meu_usuario/index.php">Meu Perfil de Usu&aacute;rio</a>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../home/index.php">Mensagens</a>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../meu_usuario/termo_responsabilidade.php">Termo de Responsabilidade</a>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../../scripts/login/sair.php">Sair</a>
		<span class="qmdivider qmdividerx" ></span>
		</div>
	<span class="qmdivider qmdividery" ></span>
	
		<?php 
		// CHAGAS
		// Fala Dieison, eh o Chagas.. comentei aqui e em cima 
                // para evitar que o usuario não tente pagar a conta por fora..
		
		// DIEISON
		// Meu caro Chagas, acredito ter solucionado o problema do valor das ligações
		// Assim que puder me ligue, estou habilitando a parte de justificativa para que o usuário veja suas ligações
		// Para testar-mos se realmente funcionaou


		?>

		<a href="javascript:void(0)">Minha Conta - GRU</a>
		<div>
	<span class="qmdivider qmdividerx" ></span>		
        <a href="../conta_telefonica/excluir_contas_devendo.php"><strong>Visualizar / Excluir Conta e GRU</strong></a>	
        <a href="../conta_telefonica/contas_devendo.php">Gerar Conta Telef&ocirc;nica e GRU</a>
		<a href="../conta_telefonica/contas_pagas.php">Contas Telef&ocirc;nicas Quitadas</a>					
		<span class="qmdivider qmdividerx" ></span>
		</div>
	

	<span class="qmdivider qmdividery"></span>
	<a href="javascript:void(0)">Minhas Liga&ccedil;&otilde;es</a>
	 
		<div>
		<span class="qmdivider qmdividerx"></span>
		<a href="../minhas_ligacoes/minhas_ligacoes_sem_justificativa.php" >Sem Classifica&ccedil;&atilde;o (Com custo)</a>
        <a href="../minhas_ligacoes/minhas_ligacoes_sem_justificativa_edit.php" >Editar Classifica&ccedil;&atilde;o</a>
		<!--<a href="../minhas_ligacoes/minhas_ligacoes_sem_justificativa_por_dia.php">Sem Justificativa por Dia</a>
		<a href="../minhas_ligacoes/minhas_ligacoes_sem_justificativa_por_mes.php">Sem Justificativa por M&ecirc;s</a>-->
		<span class="qmdivider qmdividerx" ></span>
        <a href="../minhas_ligacoes/index.php">Todas Liga&ccedil;&otilde;es</a>
		<a href="../minhas_ligacoes/minhas_ligacoes_por_dia.php">Liga&ccedil;&otilde;es por Dia</a>
		<a href="../minhas_ligacoes/minhas_ligacoes_por_mes.php">Liga&ccedil;&otilde;es por M&ecirc;s</a>
		<span class="qmdivider qmdividerx" ></span>
		</div>
	
		
     <!-- rea restrita ao usurio TARIFADOR -->
	 <?php if(GetVarSESSION('permissao')>='2'){ ?>
	 <span class="qmdivider qmdividery"></span>
	<a href="javascript:void(0)">Gerenciar Usu&aacute;rios</a>
		<div>
		<span class="qmdivider qmdividerx"></span>
		<a href="../usuario">Usu&aacute;rios</a>
		<!--<a href="../usuario">Buscar por Senha</a>
		<a href="../usuario">Buscar por Email</a>
		<a href="../usuario">Busca Avan&ccedil;ada</a>-->
		<span class="qmdivider qmdividerx"></span>
		<a href="../msg_inicial/index.php">Mensagem na P&aacute;gina Inicial do Usu&aacute;rio</a>		
		<span class="qmdivider qmdividerx" ></span>
		<!--<a href="../ligacoes/ligacoes_para_aprovar.php">Aprovar Justificativas</a>
		<a href="../ligacoes/ligacoes_por_codigo.php">Rejeitar Justificativas</a>-->
		<a href="../ligacoes/justificativas_por_usuario.php">Visualizar Justificativas</a>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../usuario/sessao.php">Alternar entre UNIDADES</a>
		<span class="qmdivider qmdividerx" ></span>
		</div>
		
	<span class="qmdivider qmdividery"></span>
	<a href="javascript:void(0)">Central Telef&ocirc;nica</a>
		<div>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../central_telefonica/diagnostico.php">Diagn&oacute;stico de Centrais Telef&ocirc;nicas</a>
		<span class="qmdivider qmdividerx" ></span>
		</div>
	
	<span class="qmdivider qmdividery"></span>
	<a href="javascript:void(0)">Financeiro</a>
		<div>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../tarifas/index.php"><strong>Tarifa&ccedil;&atilde;o</strong></a>
		<a href="../tarifas/index.php">M&aacute;scaras</a>
		<a href="../tarifas/test_mask.php"> Teste M&aacute;scara</a>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../pagamento/contas_por_codigo.php"><strong>Aprovar Pagamento do Usu&aacute;rio</strong></a>
		<!--<a href="../pagamento/contas_por_codigo.php">Por C&oacute;digo</a>-->
		<a href="../pagamento/contas_por_usuario.php">Por Usu&aacute;rio</a>
		<a href="../pagamento/contas_por_comprovante.php">Por Comprovantes Enviados</a>		
		<span class="qmdivider qmdividerx" ></span>
        
		</div>
	
	
	<span class="qmdivider qmdividery"></span>
	<a href="javascript:void(0)">Relat&oacute;rios</a>
		<div>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../ligacoes/senha_sem_usuario.php">CILCODES/SENHA Utilizados sem Cadastro</a>
		<span class="qmdivider qmdividerx" ></span>	
        <a href="../relatorios/relatorio_usuarios_lig_sem_class.php">Usu&aacute;rios com lig. sem Classifica&ccedil;&atilde;o</a>
        <a href="../relatorios/relatorio_usuarios_lig_class_sem_gru.php">Usu&aacute;rios com lig. Particulares sem GRU</a>
        <a href="../relatorios/relatorio_usuarios_lig_class_gru_nao_quitada.php">Usu&aacute;rios com GRUs N&Atilde;O quitadas</a>
        <span class="qmdivider qmdividerx" ></span>
		<a href="../relatorios/relatorio_ligacoes_por_ano.php">Gr&aacute;fico Financeiro por  Ano</a>
		<a href="../relatorios/relatorio_ligacoes_por_mes.php">Gr&aacute;fico Financeiro por  M&ecirc;s</a>
		<a href="../relatorios/relatorio_financeiro_usuario_ano.php">Gr&aacute;fico 5+ Financeiro por  Ano</a>
		<a href="../relatorios_new/relatorio_usuario_consumo_por_mes.php">Relatorio de Consumo por Usuario</a>
        <span class="qmdivider qmdividerx" ></span>
        
        <!--<span class="qmdivider qmdividerx" ></span>
		<a href="../relatorios/relatorio_usuario_nao_justificou.php">Usu&aacute;rio com Justificativa Pendente</a>
		<span class="qmdivider qmdividerx" ></span>	-->
        <a href="../ligacoes/index.php">Todas Liga&ccedil;&otilde;es </a>	
		<a href="../ligacoes/ligacoes_por_ramal.php">Liga&ccedil;&otilde;es Por RAMAL </a>	
		<a href="../ligacoes/ligacoes_por_cilcod.php">Liga&ccedil;&otilde;es Por Cilcod </a>		
		<!--<a href="../ligacoes/ligacoes_por_codigo.php">Liga&ccedil;&otilde;es Por C&oacute;digo </a>-->
		<a href="../ligacoes/ligacoes_por_usuario.php">Liga&ccedil;&otilde;es Por Usu&aacute;rio </a>
		<!--<a href="../ligacoes/ligacoes_por_senha.php">Liga&ccedil;&otilde;es Por Senha </a>-->
		<a href="../ligacoes/ligacoes_por_n_discado.php">Liga&ccedil;&otilde;es Por N&uacute;mero Discado</a>
		
		<!--<span class="qmdivider qmdividerx" ></span>
		<a href="../relatorios/relatorio_usuario_senha.php">Rela&ccedil;&atilde;o de Usu&aacute;rios e Senhas</a>-->
		<span class="qmdivider qmdividerx" ></span>
		</div>
	<?php } ?>
	<?php  if(GetVarSESSION('permissao')=='3'){ ?>
	<span class="qmdivider qmdividery"></span>
	<a href="javascript:void(0)">Ferramentas</a>
		<div>
		<!--<a href="../captcha">Imagem de Verifica&ccedil;&atilde;o</a>-->	
		<span class="qmdivider qmdividerx"></span>
		<a href="../central_telefonica/configura_cliente.php">Configura&ccedil;&otilde;es do Cliente (Coletor)</a>
		<a href="../central_telefonica/configura_servidor.php">Configura&ccedil;&otilde;es do Servidor</a>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../central_telefonica/start_cron.php">Ferramentas de Inicializa&ccedil;&atilde;o</a>		
		<span class="qmdivider qmdividerx" ></span>	
		<a href="../central_telefonica">Gerenciar Cent. Telef&ocirc;nicas</a>
		<a href="../central_telefonica/diagnostico.php">Diagn&oacute;stico de Cent. Telef&ocirc;nicas</a>
		<span class="qmdivider qmdividerx" ></span>	
		<a href="../unidades">Unidades</a>
		<span class="qmdivider qmdividerx" ></span>	
        <a href="../usuario_adm">Gerenciar Administradores</a>	
		<a href="../usuario_adm/to_adm.php">Transf. em Administrador/Tarifador</a>		
		<span class="qmdivider qmdividerx" ></span>		
		<a href="../ligacoes/inserir.php">Inserir Lig. Manualmente</a>
		<span class="qmdivider qmdividerx" ></span>
		<a href="../logs/index.php">Verificar LOGS do Sistema WEB</a>
		<a href="../logs/coleta.php">Verificar LOGS de Coleta de Dados</a>
		<span class="qmdivider qmdividerx" ></span>	
        <a href="../conta_telefonica/gerador_gru_avulsa.php">Teste de GRU</a>
        <span class="qmdivider qmdividerx" ></span>
		</div>

	<?php } ?>

<span class="qmclear">&nbsp;</span></div>

<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click ('all' or 'lev2'), Right to Left, Horizontal Subs, Flush Left, Flush Top) -->
<script type="text/javascript">qm_create(0,false,0,250,false,false,false,false,false);</script>
		
		
    </div>
<?php } ?>

