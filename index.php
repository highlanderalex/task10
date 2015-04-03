<?php
	
	require_once "lib/func.php";
	require_once "config.php";
	
	$data = array('table' => 'book', 'field' => 'name', 'where' => 'id > 2', 'limit' => 2);
	
	$stmt = MyPdo::Command(HOST, USER, PASS, DBNAME)->Select('id, name, val')
							->From('book')
							->Where('id=', 1)
							->Limit(2)
							->Execute();
							
	if ( is_array($stmt) )
	{
		$rezult = $stmt;
	}
	
	require_once "templates/index.php";
?>
