<?php

class Lessons{
	
//Pass variables with the same name as the sql columns
	
	public $lesson_id=null;
	public $lesson_name=null;
	public $lesson_no=null;
	public $lesson_for=null;
	public $lesson_content=null;
	public $lesson_by=null;
	public $lesson_vid_url=null;
	public $lesson_unique=null;
	public $course_name=null;
	
//Store data when object is called
	
	public function __construct($data=array())
	{
		if(isset($data['lesson_id'])) 
		{
		$this->lesson_id = $data['lesson_id'];
		}
		if(isset($data['lesson_name']))
		{
			$this->lesson_name = $data['lesson_name'];
		}
		if(isset($data['lesson_no']))
		{
			$this->lesson_no = $data['lesson_no'];
		}
		if(isset($data['lesson_for']))
		{
			$this->lesson_for = $data['lesson_for'];
		}
		if(isset($data['lesson_content']))
		{
			$this->lesson_content = $data['lesson_content'];
		}
		if(isset($data['lesson_by']))
		{
			$this->lesson_by = $data['lesson_by'];
		}
		if(isset($data['lesson_vid_url']))
		{
			$this->lesson_vid_url = $data['lesson_vid_url'];
		}
		if(isset($data['lesson_unique']))
		{
			$this->lesson_unique = $data['lesson_unique'];
		}
		if(isset($data['course_name']))
		{
			$this->course_name = $data['course_name'];
		}
		
	}

//Get Lessons List Along with courses data
	
	public static function getLessonsList()
	{
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM lessons LEFT JOIN courses ON course_id = lesson_for";
		$result = $conn->query($sql);
		$list = array();
		
		while($row = $result->fetch())
		{
			$lessons = new Lessons($row);
			$list[] = $lessons;
		}
		
		$conn = null;
        return(array("results" => $list));
	}
	
	
	
//Get a single lesson row By Id
	
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
	
	
	
//Store a Forms Value	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
	
//Insert a forms value into the lessons table
	
	public function insert(){
		
		$token = 'sadkjeawhijwajdilhasilfjaehioryweapirjpway9uprpjrpewahjrej23136513123q08192383431';
		$token = str_shuffle($token);
		$token= substr($token,0,10);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO lessons(lesson_name,lesson_no,lesson_for,lesson_content,lesson_by,lesson_vid_url,lesson_unique)VALUES(:lesson_name,:lesson_no,:lesson_for,:lesson_content,:lesson_by,:lesson_vid_url,:lesson_unique)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_name",$this->lesson_name,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_no",$this->lesson_no,PDO::PARAM_INT);
		$stmt->bindValue(":lesson_for",$this->lesson_for,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_content",$this->lesson_content,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_by",$this->lesson_by,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_vid_url",$this->lesson_vid_url,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->lesson_id = $conn->lastInsertId();
		$conn = null;
	}
	
	
//Update a forms value in the lessons table
	
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
	
	
	
//Delete a row from the lessons table 
	
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