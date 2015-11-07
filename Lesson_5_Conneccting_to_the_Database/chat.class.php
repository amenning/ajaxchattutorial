<?php
require_once('config.php');
require_once('bucky_error_handler.php');

class Chat
{

	private $mysqli;
	
	//constructor open database connection
	function __construct(){
		$this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	}
	
	//destructor closes database connection
	function __destruct(){
		$this->mysqli_close();
	}
	
	
}

?>