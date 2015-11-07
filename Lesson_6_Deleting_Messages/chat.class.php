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
		$this->mysqli->close();
	}
	
	//Truncates (empties) the table containing all messages
	public function deleteAllMessages(){
		$query = 'TRUNCATE TABLE chat';
		$result = $this->$mysqli->query($query);
	}
	
	public function postNewMessage($user_name, $message, $color){
		$user_name = $this->mysqli->real_escape_string($user_name);
		$message = $this->mysqli->real_escape_string($message);
		
	}
	
}

?>