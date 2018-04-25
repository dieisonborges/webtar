<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="mootools-trunk.js"></script>
<script type="text/javascript" src="Swiff.Uploader.js"></script>
<script type="text/javascript" src="Fx.ProgressBar.js"></script>
<script type="text/javascript" src="FancyUpload2.js"></script>
<script type="text/javascript" src="evento.js"></script>	
<div>
<form action="script.php" method="post" enctype="multipart/form-data" id="form_imagens">
<div id="loading">
<img src="uploading.gif" alt="" /><br />Carregando...
</div>
	
<div id="status" class="hide">
<p>
<a href="#" id="add-image"><input name="Button" type="button" value="Procurar arquivos" /></a> |
<a href="#" id="clear-list"><input name="Button" type="button" value="Limpar a Lista" /></a> |
<a href="#" id="upload-images"><input type="submit" value="Enviar" /></a></p>
<p>


<div>

<strong class="overall-title">Progresso Total</strong><br />
<img src="bar.gif" class="progress overall-progress" />
</div>

<div>
<strong class="current-title">Arquivo atual</strong><br />
<img src="bar.gif" class="progress current-progress" />
</div>

<div class="current-text"></div>
</div>
 
<div id="images-list"></div>
</form>
</div>
