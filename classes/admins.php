<?php

class Admins{
	
	public $user_id=null;
	public $user_name=null;
	public $user_contact=null;
	public $user_email_address=null;
	public $user_password=null;
	public $user_certificates=null;
	public $user_lvl=null;
	public $user_ban=null;
	public $user_unique=null;
	
	public function __construct($data=array())
	{
		if(isset($data['user_id'])) 
		{
		$this->user_id = $data['user_id'];
		}
		if(isset($data['user_name']))
		{
			$this->user_name = $data['user_name'];
		}
		if(isset($data['user_contact']))
		{
			$this->user_contact = $data['user_contact'];
		}
		if(isset($data['user_email_address']))
		{
			$this->user_email_address = $data['user_email_address'];
		}
		if(isset($data['user_password']))
		{
			$this->user_password = $data['user_password'];
		}
		if(isset($data['user_certificates']))
		{
			$this->user_certificates = $data['user_certificates'];
		}
		if(isset($data['user_lvl']))
		{
			$this->user_lvl = $data['user_lvl'];
		}
		if(isset($data['user_ban']))
		{
			$this->user_ban = $data['user_ban'];
		}
		if(isset($data['user_unique']))
		{
			$this->user_unique = $data['user_unique'];
		}
		
	}
	
//Get the admins list 
	
	public static function getAdminsList()
	{
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM users WHERE user_lvl = :user_lvl";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_lvl",1,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		
		while($row = $stmt->fetch())
		{
			$admins = new Admins($row);
			$list[] = $admins;
		}
		
		$conn = null;
        return(array("results" => $list));
	}
	
	public static function getUsersList()
	{
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM users WHERE user_lvl = :user_lvl";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_lvl",0,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		
		while($row = $stmt->fetch())
		{
			$users = new Admins($row);
			$list[] = $users;
		}
		
		$conn = null;
        return(array("results" => $list));
	}
	
	
	public static function getLessonsById($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM lessons WHERE lesson_id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Lessons($row);
	}
	
	
	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
	
	public function insert(){
		
		$token = 'sadkjeawhijwajdilhasilfjaehioryweapirjpway9uprpjrpewahjrej23136513123q08192383431';
		$token = str_shuffle($token);
		$token= substr($token,0,10);
		$hash = password_hash($this->user_password,PASSWORD_DEFAULT);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO users(user_name,user_contact,user_email_address,user_password,user_lvl,user_unique)VALUES(:user_name,:user_contact,:user_email_address,:user_password,:user_lvl,:user_unique)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_name",$this->user_name,PDO::PARAM_STR);
		$stmt->bindValue(":user_contact",$this->user_contact,PDO::PARAM_STR);
		$stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
		$stmt->bindValue(":user_password",$hash,PDO::PARAM_STR);
		$stmt->bindValue(":user_lvl",$this->user_lvl,PDO::PARAM_INT);
		$stmt->bindValue(":user_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->user_id = $conn->lastInsertId();
		$conn = null;
	}
	
	
	
	public function edit(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE lessons SET lesson_name = :lesson_name,lesson_no = :lesson_no,lesson_for = :lesson_for,lesson_content = :lesson_content,lesson_by = :lesson_by,lesson_vid_url = :lesson_vid_url WHERE lesson_id = :lesson_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_name",$this->lesson_name,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_no",$this->lesson_no,PDO::PARAM_INT);
		$stmt->bindValue(":lesson_for",$this->lesson_for,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_content",$this->lesson_content,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_by",$this->lesson_by,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_vid_url",$this->lesson_vid_url,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_id",$this->lesson_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
	}
	
	
	
	
	public function deletes(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "DELETE FROM lessons WHERE lesson_id = :lesson_id LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_id",$this->lesson_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}
	
}


?>