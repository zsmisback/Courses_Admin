<?php

class Support{
	
	public $support_id = null;
	public $user_id = null;
	public $support_name = null;
	public $support_email = null;
	public $support_course = null;
	public $support_lesson = null;
	public $support_query = null;
	public $support_for = null;
	public $support_unique = null;

	
	public function __construct($data=array())
	{
		if(isset($data['support_id'])) 
		{
		$this->support_id = $data['support_id'];
		}
		if(isset($data['user_id']))
		{
			$this->user_id = $data['user_id'];
		}
		if(isset($data['support_name']))
		{
			$this->support_name = $data['support_name'];
		}
		if(isset($data['support_email']))
		{
			$this->support_email = $data['support_email'];
		}
		if(isset($data['support_course']))
		{
			$this->support_course = $data['support_course'];
		}
		if(isset($data['support_lesson']))
		{
			$this->support_lesson = $data['support_lesson'];
		}
		if(isset($data['support_query']))
		{
			$this->support_query = $data['support_query'];
		}
		if(isset($data['support_for']))
		{
			$this->support_for = $data['support_for'];
		}
		if(isset($data['support_unique']))
		{
			$this->support_unique = $data['support_unique'];
		}

	}
	
//Store a Forms Value	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
//Insert support query 
		
		public function insert(){
			
			$headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <coolzsm36@gmail.com>' . "\r\n".'Reply-To: <'.$this->support_email.'>' . "\r\n";
	  $to = "coolzsm36@gmail.com";
	  $msg="<html><body><p>Name = ".$this->support_name."<br>Email Address = ".$this->support_email."<br>Course - ".$this->support_course."<br>Lesson = ".$this->support_lesson."<br>Query = ".$this->support_query."</p></body></html>";
	  mail($to,"Support Query",$msg,$headers);
		
		$token = 'sadkjeawhijwajdilhasilfjaehioryweapirjpway9uprpjrpewahjrej23136513123q08192383431';
		$token = str_shuffle($token);
		$token= substr($token,0,10);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO support(support_name,support_email,support_course,support_lesson,support_query,support_for,support_unique)VALUES(:support_name,:support_email,:support_course,:support_lesson,:support_query,:support_for,:support_unique)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":support_name",$this->support_name,PDO::PARAM_STR);
		$stmt->bindValue(":support_email",$this->support_email,PDO::PARAM_STR);
		$stmt->bindValue(":support_course",$this->support_course,PDO::PARAM_STR);
		$stmt->bindValue(":support_lesson",$this->support_lesson,PDO::PARAM_STR);
		$stmt->bindValue(":support_query",$this->support_query,PDO::PARAM_STR);
		$stmt->bindValue(":support_for",$this->support_for,PDO::PARAM_STR);
		$stmt->bindValue(":support_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->support_id = $conn->lastInsertId();
		
		
	 
		$conn = null;
	}
	
}

?>