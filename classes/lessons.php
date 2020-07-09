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
	public $lesson_status=null;
	public $lesson_unique=null;
	public $course_name=null;
	public $course_summary=null;
	public $course_tags=null;
	public $course_by=null;
	public $course_language=null;
	public $course_price=null;
	public $course_rating=null;
	public $course_total_time=null;
	public $course_reading=null;
	public $course_award=null;
	public $course_material=null;
	public $course_age_group=null;
	public $course_pre_requisite=null;
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
		if(isset($data['lesson_status']))
		{
			$this->lesson_status = $data['lesson_status'];
		}
		if(isset($data['lesson_unique']))
		{
			$this->lesson_unique = $data['lesson_unique'];
		}
		if(isset($data['course_name']))
		{
			$this->course_name = $data['course_name'];
		}
		if(isset($data['course_summary']))
		{
			$this->course_summary = $data['course_summary'];
		}
		if(isset($data['course_tags']))
		{
			$this->course_tags = $data['course_tags'];
		}
		if(isset($data['course_by']))
		{
			$this->course_by = $data['course_by'];
		}
		if(isset($data['course_language']))
		{
			$this->course_language = $data['course_language'];
		}
		if(isset($data['course_price']))
		{
			$this->course_price = $data['course_price'];
		}
		if(isset($data['course_rating']))
		{
			$this->course_rating = $data['course_rating'];
		}
		if(isset($data['course_total_time']))
		{
			$this->course_total_time = $data['course_total_time'];
		}
		if(isset($data['course_reading']))
		{
			$this->course_reading = $data['course_reading'];
		}
		if(isset($data['course_award']))
		{
			$this->course_award = $data['course_award'];
		}
		if(isset($data['course_material']))
		{
			$this->course_material = $data['course_material'];
		}
		if(isset($data['course_age_group']))
		{
			$this->course_age_group = $data['course_age_group'];
		}
		if(isset($data['course_pre_requisite']))
		{
			$this->course_pre_requisite = $data['course_pre_requisite'];
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
		$sql = "SELECT * FROM lessons LEFT JOIN courses ON course_id = lesson_for WHERE lesson_id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Lessons($row);
	}
	
	
//Get All the lessons in a course By Id

	public static function getLessonsByCourseId($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM lessons LEFT JOIN courses ON course_id = lesson_for WHERE lesson_for = :lesson_for";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_for",$id,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		while($row = $stmt->fetch())
		{
			$lessons = new Lessons($row);
			$list[] = $lessons;
		}
		$sql = "SELECT * FROM lessons LEFT JOIN courses_continue ON course_id = lesson_for WHERE lesson_for = :lesson_for";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_for",$id,PDO::PARAM_INT);
		$stmt->execute();
		$list2 = array();
		while($row2 = $stmt->fetch())
		{
			$lessons2 = new Lessons($row2);
			$list2[] = $lessons2;
		}
		$conn = null;
		return(array("results"=>$list,"results_cont"=>$list2));
	}


//Get the Side pagination for all lessons in a course 

	public static function getPagination($id){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM lessons LEFT JOIN courses ON course_id = lesson_for WHERE lesson_for = :lesson_for";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_for",$id,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		
		while($row = $stmt->fetch())
		{
			$lessons = new Lessons($row);
			$list[] = $lessons;
		}
		
		
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = 1;
		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		$total_pages = $totalRows[0];
		$conn = null;
		return(array("results" => $list,"page" => $page,"totalPages" => $total_pages));
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
		$sql = "INSERT INTO lessons(lesson_name,lesson_no,lesson_for,lesson_content,lesson_by,lesson_vid_url,lesson_status,lesson_unique)VALUES(:lesson_name,:lesson_no,:lesson_for,:lesson_content,:lesson_by,:lesson_vid_url,:lesson_status,:lesson_unique)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_name",$this->lesson_name,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_no",$this->lesson_no,PDO::PARAM_INT);
		$stmt->bindValue(":lesson_for",$this->lesson_for,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_content",$this->lesson_content,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_by",$this->lesson_by,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_vid_url",$this->lesson_vid_url,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_status",$this->lesson_status,PDO::PARAM_INT);
		$stmt->bindValue(":lesson_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->lesson_id = $conn->lastInsertId();
		$conn = null;
	}
	
	
//Update a forms value in the lessons table
	
	public function edit(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE lessons SET lesson_name = :lesson_name,lesson_no = :lesson_no,lesson_for = :lesson_for,lesson_content = :lesson_content,lesson_by = :lesson_by,lesson_vid_url = :lesson_vid_url,lesson_status = :lesson_status WHERE lesson_id = :lesson_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":lesson_name",$this->lesson_name,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_no",$this->lesson_no,PDO::PARAM_INT);
		$stmt->bindValue(":lesson_for",$this->lesson_for,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_content",$this->lesson_content,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_by",$this->lesson_by,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_vid_url",$this->lesson_vid_url,PDO::PARAM_STR);
		$stmt->bindValue(":lesson_status",$this->lesson_status,PDO::PARAM_INT);
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