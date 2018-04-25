<?php 

//PROXY PARA GRU



//$auth = base64_encode('');

$opts = array(
		'http'=>array(					
					'method'=>"GET",
					'header'=>"Accept-language: en\r\n" .
					"Cookie: foo=bar\r\n",
					'proxy' => 'tcp://',
					)
		);

//LOCAL
		/*
		$opts = array(
				'http'=>array(
					'method'=>"GET",
					'header'=>"Accept-language: en\r\n" .
					"Cookie: foo=bar\r\n",
					'proxy' => '',
					)
		);
		*/
		

?>
