<?php
	function __autoload($class)
	{
		require_once "lib/" . $class . ".php";
		
	}
?>