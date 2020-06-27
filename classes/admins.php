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
	
//Gets the Users List
	
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
	
	
//Gets Both the Admins and Users Data Based on their Id	
	public static function getUsersById($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM users WHERE user_id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Admins($row);
	}
	
	
	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
//Inserts both the user and admins details
	
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
		
		$hash = password_hash($this->user_password,PASSWORD_DEFAULT);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		if(empty($this->user_password))
		{
		$sql = "UPDATE users SET user_name = :user_name,user_contact = :user_contact,user_email_address = :user_email_address WHERE user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_name",$this->user_name,PDO::PARAM_STR);
		$stmt->bindValue(":user_contact",$this->user_contact,PDO::PARAM_STR);
		$stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		}
		else
		{
			$sql = "UPDATE users SET user_name = :user_name,user_contact = :user_contact,user_email_address = :user_email_address,user_password = :user_password WHERE user_id = :user_id";
			$stmt = $conn->prepare($sql);
		    $stmt->bindValue(":user_name",$this->user_name,PDO::PARAM_STR);
		    $stmt->bindValue(":user_contact",$this->user_contact,PDO::PARAM_STR);
		    $stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
		    $stmt->bindValue(":user_password",$hash,PDO::PARAM_STR);
		    $stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		    $stmt->execute();
		    $conn = null;
		
		}
		
		
	}
	
//Bans/Unbans a user or an admin


    public function ban(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE users SET user_ban = :ban WHERE user_id = :user_id";
		$stmt = $conn->prepare($sql);
		if($this->user_ban == 0)
		{
		$stmt->bindValue(":ban",1,PDO::PARAM_INT);
		}
		else
		{
		 $stmt->bindValue(":ban",0,PDO::PARAM_INT);
		}
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}	
	
	
	
	
	public function deletes(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "DELETE FROM users WHERE user_id = :user_id LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}
	
}


?>