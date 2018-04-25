				<?php 
					switch($usuario->tbPermissoes_id)
			  		{
			  		case 1:
						echo '<option selected="selected" value="1">Usuario</option>';
						break;
					case 2:
						echo '<option selected="selected" value="2">Tarifador</option>';
						break;
					case 3:
						echo '<option selected="selected" value="2">Tarifador</option>';
						break;
					}
				?>
				<option value="1">Usuario</option>
                <option value="2">Tarifador</option>
				<option value="2">Administrador</option>
				