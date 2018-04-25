<?php 

	if (ping('10.112.24.45')==0)
	{
		echo "Não pingou o IP";
	}
	else
	{
		echo "Pingou o IP";
	}
