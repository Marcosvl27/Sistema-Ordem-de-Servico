<?php	
    $banco = 'ms';  
	$host = 'localhost';
	$usuario = 'root';
	$senha = '';
	
	$conn = new mysqli($host,$usuario,$senha,$banco);

	if (!$conn){
		echo "NÃ£o foi possivel conectar ao Mysql. Erro #" .
		mysqli_connect_errno() . " : " . mysqli_connect_error();
	} else {
		
	}
	$charset = $conn->set_charset('utf8');





?>
