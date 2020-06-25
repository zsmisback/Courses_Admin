<?php

class Comments{
	
	public $comment_id=null;
	public $comment_summary=null;
	public $comment_lesson=null;
	public $comment_create=null;
	public $comment_by=null;
	public $comment_unique=null;
	public $lesson_name=null;
	
	public function __construct($data=array())
	{
		if(isset($data['comment_id'])) 
		{
		$this->comment_id = $data['comment_id'];
		}
		if(isset($data['comment_summary']))
		{
			$this->comment_summary = $data['comment_summary'];
		}
		if(isset($data['comment_lesson']))
		{
			$this->comment_lesson = $data['comment_lesson'];
		}
		if(isset($data['comment_create']))
		{
			$this->comment_create = $data['comment_create'];
		}
		if(isset($data['comment_by']))
		{
			$this->comment_by = $data['comment_by'];
		}
		if(isset($data['comment_unique']))
		{
			$this->comment_unique = $data['comment_unique'];
		}
		if(isset($data['lesson_name']))
		{
			$this->lesson_name = $data['lesson_name'];
		}
		
		
	}
	
//Get the Comments list 
	
	public static function getCommentsList()
	{
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM comments LEFT JOIN lessons ON lesson_id = comment_lesson";
		$result = $conn->query($sql);
		$list = array();
		
		while($row = $result->fetch())
		{
			$comments = new Comments($row);
			$list[] = $comments;
		}
		
		$conn = null;
        return(array("results" => $list));
	}
	

	
	
//Gets Comment Data Based on its Id	
	public static function getCommentsById($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM comments WHERE comment_id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Comments($row);
	}
	
	
//StoreFormValues	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
	
	public function insert(){
		
		$token = 'sadkjeawhijwajdilhasilfjaehioryweapirjpway9uprpjrpewahjrej23136513123q08192383431';
		$token = str_shuffle($token);
		$token= substr($token,0,10);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO comments(comment_summary,comment_lesson,comment_create,comment_by,comment_unique)VALUES(:comment_summary,:comment_lesson,NOW(),:comment_by,:comment_unique)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":comment_summary",$this->comment_summary,PDO::PARAM_STR);
		$stmt->bindValue(":comment_lesson",$this->comment_lesson,PDO::PARAM_INT);
		$stmt->bindValue(":comment_by",$this->comment_by,PDO::PARAM_STR);
		$stmt->bindValue(":comment_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->comment_id = $conn->lastInsertId();
		$conn = null;
	}
	
	
//Edit the comment	
	public function edit(){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		
		$sql = "UPDATE comments SET comment_summary = :comment_summary,comment_lesson = :comment_lesson,comment_create = NOW() WHERE comment_id = :comment_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":comment_summary",$this->comment_summary,PDO::PARAM_STR);
		$stmt->bindValue(":comment_lesson",$this->comment_lesson,PDO::PARAM_INT);
		$stmt->bindValue(":comment_id",$this->comment_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
		
		
		
	}
	
	
		
	
//Deletes a comment	
	public function deletes(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "DELETE FROM comments WHERE comment_id = :comment_id LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":comment_id",$this->comment_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}
	
}


?>