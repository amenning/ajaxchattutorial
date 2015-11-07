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
		$result = $this->mysqli->query($query);
	}
	
	public function postNewMessage($user_name, $message, $color){
		$user_name = $this->mysqli->real_escape_string($user_name);
		$message = $this->mysqli->real_escape_string($message);
		$color = $this->mysqli->real_escape_string($color);
		$query = 'INSERT INTO chat (posted_on, user_name, message, color)' . ' VALUES ( NOW(), "'.$user_name.'", "'.$message.'", "'.$color.'")';
		$result = $this->mysqli->query($query);
	}
	
	//Get new messages
	public function getNewMessages($id=0){
		$id = $this->mysqli->real_escape_string($id);
		if($id>0){
			$query = 
			'
			SELECT message_id, user_name, message, color, DATE_FORMAT(posted_on, "%H:%i:%s")
			AS posted_on FROM chat WHERE message_id > '
			. $id .
			' ORDER BY message_id ASC ';
		}else{
			$query = 
			'
			SELECT message_id, user_name, message, color, posted_on
			FROM (SELECT message_id, user_name, message, color, DATE_FORMAT(posted_on, "%H:%i:%s")
			AS posted_on FROM chat ORDER BY message_id DESC LIMIT 50) AS Last50
			ORDER_BY message_id ASC';
		}
		
		$result = $this->mysqli->query($query);
		
		//XML response
		
	}
	
}

?>