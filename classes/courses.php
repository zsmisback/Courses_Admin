<?php

class Courses{
	
//Pass variables with the same name as the sql columns	
    
	public $course_id=null;
	public $user_id=null;
	public $courses_added=null;
	public $course_name=null;
	public $course_code=null;
	public $course_summary=null;
	public $course_tags=null;
	public $course_by=null;
	public $course_language=null;
	public $course_image="";
	public $course_price=null;
	public $course_rating=null;
	public $course_total_time=null;
	public $course_reading=null;
	public $course_award=null;
	public $course_material=null;
	public $course_age_group=null;
	public $course_pre_requisite=null;
	public $course_unique=null;
//Purchases----------------------
    public $purchase_id=null;
	public $purchase_type=null;
	public $purchase_for=null;
	public $purchase_amount=null;
	public $purchase_at=null;
	public $purchase_status=null;

//Store data when object is called
	
	public function __construct($data=array())
	{
		if(isset($data['course_id'])) 
		{
		$this->course_id = $data['course_id'];
		}
		if(isset($data['user_id'])) 
		{
		$this->user_id = $data['user_id'];
		}
		if(isset($data['courses_added'])) 
		{
		$this->courses_added = $data['courses_added'];
		}
		if(isset($data['course_name']))
		{
			$this->course_name = $data['course_name'];
		}
		if(isset($data['course_code']))
		{
			$this->course_code = $data['course_code'];
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
		if(isset($data['course_image']))
		{
			$this->course_image = $data['course_image'];
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
		if(isset($data['course_unique']))
		{
			$this->course_unique = $data['course_unique'];
		}
		if(isset($data['purchase_id']))
		{
			$this->purchase_id = $data['purchase_id'];
		}
		if(isset($data['purchase_type']))
		{
			$this->purchase_type = $data['purchase_type'];
		}
		if(isset($data['purchase_for']))
		{
			$this->purchase_for = $data['purchase_for'];
		}
		if(isset($data['purchase_amount']))
		{
			$this->purchase_amount = $data['purchase_amount'];
		}
		if(isset($data['purchase_at']))
		{
			$this->purchase_at = $data['purchase_at'];
		}
		if(isset($data['purchase_status']))
		{
			$this->purchase_status = $data['purchase_status'];
		}
	}
	
//Get Courses List
	
	public static function getCoursesList()
	{
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM courses";
		$result = $conn->query($sql);
		$list = array();
		
		while($row = $result->fetch())
		{
			$courses = new Courses($row);
			$list[] = $courses;
		}
		
		$conn = null;
        return(array("results" => $list));
	}

//Get Courses List With a Limit

    public static function getLimitedCourses($numRows = 12){
		
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $numRows;
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM courses ORDER BY course_id DESC LIMIT :start,:numRows";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":start",$start,PDO::PARAM_INT);
		$stmt->bindValue(":numRows",$numRows,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		
		while($row = $stmt->fetch())
		{
			$courses = new Courses($row);
			$list[] = $courses;
		}
		
		$conn = null;
		return(array("results"=>$list));
	}


//Get Courses Pagination That is limited

    public static function getPagination($numRows = 12){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM courses ORDER BY course_id DESC";
		$result = $conn->query($sql);
		$list = array();
		
		while($row = $result->fetch())
		{
			$courses = new Courses($row);
			$list[] = $courses;
		}
		
		
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = 1;
		$prev = $page - 1;
        $next = $page + 1;
		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		$total_pages = ceil($totalRows[0]/$numRows);
		$conn = null;
		return(array("results" => $list,"page" => $page,"prev" => $prev,"next" => $next,"totalPages" => $total_pages));
	}	
	
//Get a single course row data by Id
	
	public static function getCoursesById($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM courses WHERE course_id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Courses($row);
	}
	
//Get a single course row data related to the courses table from the courses_continue table
	
	public static function getCoursesById2($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM courses_continue WHERE course_id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Courses($row);
	}
	
//Store a forms value
	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
//Store and move an uploaded image
	
	public function storeUploadedImage($image){
		
		if($image['error'] == UPLOAD_ERR_OK)
		{
			
			
			$this->deleteImages();
			
			$this->course_image = strtolower(strrchr($image['name'],'.'));
			$tempFilename = trim($image['tmp_name']);
			
			if(is_uploaded_file($tempFilename)){
				
				if(!(move_uploaded_file($tempFilename,$this->getImagePath()))) trigger_error( "Courses::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
				
			}
			
			
			$attrs = getimagesize($this->getImagePath());
			$imageWidth = $attrs[0];
			$imageHeight = $attrs[1];
			$imageType = $attrs[2];
			
			switch($imageType){
				case IMAGETYPE_GIF:
				$imageResource = imagecreatefromgif($this->getImagePath());
				break;
				
				case IMAGETYPE_JPEG:
				$imageResource = imagecreatefromjpeg($this->getImagePath());
				break;
				
				case IMAGETYPE_PNG:
				$imageResource = imagecreatefrompng($this->getImagePath());
				break;
				
				default:
                trigger_error ( "Courses::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
			}
			
			$thumbHeight = intval($imageHeight/$imageWidth * CATEGORY_THUMB_WIDTH);
			$thumbResource = imagecreatetruecolor(CATEGORY_THUMB_WIDTH,$thumbHeight);
			imagecopyresampled($thumbResource,$imageResource,0,0,0,0,CATEGORY_THUMB_WIDTH, $thumbHeight, $imageWidth, $imageHeight );
			
			// Save the thumbnail
      switch ( $imageType ) {
        case IMAGETYPE_GIF:
          imagegif ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
          break;
        case IMAGETYPE_JPEG:
          imagejpeg ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ), JPEG_QUALITY );
          break;
        case IMAGETYPE_PNG:
          imagepng ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
          break;
        default:
          trigger_error ( "Courses::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }
			
		$this->edit();
		}
	}
	
//Delete an image based off the course table Id 	
	public function deleteImages(){
		
	 foreach (glob(CATEGORY_IMAGE_PATH ."/".IMG_TYPE_FULLSIZE . "/" . $this->course_id . ".*") as $filename)
	 {
		 if(!unlink($filename)) trigger_error("Courses::deleteImages(): Couldn't delete image file.",E_USER_ERROR);
	 }
	 foreach (glob(CATEGORY_IMAGE_PATH ."/".IMG_TYPE_THUMB . "/" . $this->course_id . ".*") as $filename)
	 {
		 if(!unlink($filename)) trigger_error("Courses::deleteImages(): Couldn't delete image file.",E_USER_ERROR);
	 }
	 $this->course_image = "";
	}
	
//Get the path of the folder where the image will be stored
	
	public function getImagePath( $type=IMG_TYPE_FULLSIZE ) {
    return ( $this->course_id && $this->course_image ) ? ( CATEGORY_IMAGE_PATH . "/$type/" . $this->course_id . $this->course_image ) : false;
  }
	
//Insert data into both the courses and courses_continue tables
	
	public function insert(){
		
		$token = 'sadkjeawhijwajdilhasilfjaehioryweapirjpway9uprpjrpewahjrej23136513123q08192383431';
		$token = str_shuffle($token);
		$token= substr($token,0,10);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO courses(course_name,course_code,course_summary,course_tags,course_by,course_language,course_image,course_price,course_unique)VALUES(:course_name,:course_code,:course_summary,:course_tags,:course_by,:course_language,:course_image,:course_price,:course_unique)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":course_name",$this->course_name,PDO::PARAM_STR);
		$stmt->bindValue(":course_code",$this->course_code,PDO::PARAM_STR);
		$stmt->bindValue(":course_summary",$this->course_summary,PDO::PARAM_STR);
		$stmt->bindValue(":course_tags",$this->course_tags,PDO::PARAM_STR);
		$stmt->bindValue(":course_by",$this->course_by,PDO::PARAM_STR);
		$stmt->bindValue(":course_language",$this->course_language,PDO::PARAM_STR);
		$stmt->bindValue(":course_image",$this->course_image,PDO::PARAM_STR);
		$stmt->bindValue(":course_price",$this->course_price,PDO::PARAM_STR);
		$stmt->bindValue(":course_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->course_id = $conn->lastInsertId();
		$sql2 = "INSERT INTO courses_continue(course_rating,course_total_time,course_reading,course_award,course_material,course_age_group,course_pre_requisite,course_unique)VALUES(:course_rating,:course_total_time,:course_reading,:course_award,:course_material,:course_age_group,:course_pre_requisite,:course_unique)";
		$stmt = $conn->prepare($sql2);
		
		$stmt->bindValue(":course_rating",$this->course_rating,PDO::PARAM_STR);
		$stmt->bindValue(":course_total_time",$this->course_total_time,PDO::PARAM_STR);
		$stmt->bindValue(":course_reading",$this->course_reading,PDO::PARAM_STR);
		$stmt->bindValue(":course_award",$this->course_award,PDO::PARAM_STR);
		$stmt->bindValue(":course_material",$this->course_material,PDO::PARAM_STR);
		$stmt->bindValue(":course_age_group",$this->course_age_group,PDO::PARAM_STR);
		$stmt->bindValue(":course_pre_requisite",$this->course_pre_requisite,PDO::PARAM_STR);
		$stmt->bindValue(":course_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->course_id = $conn->lastInsertId();
		$conn = null;
	}
	
	
//Update data in both the courses and courses_continue table
	
	public function edit(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE courses SET course_name = :course_name,course_code = :course_code,course_summary = :course_summary,course_tags = :course_tags,course_by = :course_by,course_language = :course_language,course_image = :course_image,course_price = :course_price WHERE course_id = :course_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":course_name",$this->course_name,PDO::PARAM_STR);
		$stmt->bindValue(":course_code",$this->course_code,PDO::PARAM_STR);
		$stmt->bindValue(":course_summary",$this->course_summary,PDO::PARAM_STR);
		$stmt->bindValue(":course_tags",$this->course_tags,PDO::PARAM_STR);
		$stmt->bindValue(":course_by",$this->course_by,PDO::PARAM_STR);
		$stmt->bindValue(":course_language",$this->course_language,PDO::PARAM_STR);
		$stmt->bindValue(":course_image",$this->course_image,PDO::PARAM_STR);
		$stmt->bindValue(":course_price",$this->course_price,PDO::PARAM_STR);
		$stmt->bindValue(":course_id",$this->course_id,PDO::PARAM_INT);
		$stmt->execute();
		$sql2 = "UPDATE courses_continue SET course_rating = :course_rating,course_total_time = :course_total_time,course_reading = :course_reading,course_award = :course_award,course_material = :course_material,course_age_group = :course_age_group,course_pre_requisite = :course_pre_requisite WHERE course_id = :course_id";
		$stmt = $conn->prepare($sql2);
		
		$stmt->bindValue(":course_rating",$this->course_rating,PDO::PARAM_STR);
		$stmt->bindValue(":course_total_time",$this->course_total_time,PDO::PARAM_STR);
		$stmt->bindValue(":course_reading",$this->course_reading,PDO::PARAM_STR);
		$stmt->bindValue(":course_award",$this->course_award,PDO::PARAM_STR);
		$stmt->bindValue(":course_material",$this->course_material,PDO::PARAM_STR);
		$stmt->bindValue(":course_age_group",$this->course_age_group,PDO::PARAM_STR);
		$stmt->bindValue(":course_pre_requisite",$this->course_pre_requisite,PDO::PARAM_STR);
		$stmt->bindValue(":course_id",$this->course_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
	}
	
	
//Update only the text of the courses and courses_continue table without removing the Image
	
	public function editonlytext(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE courses SET course_name = :course_name,course_code = :course_code,course_summary = :course_summary,course_tags = :course_tags,course_by = :course_by,course_language = :course_language,course_price = :course_price WHERE course_id = :course_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":course_name",$this->course_name,PDO::PARAM_STR);
		$stmt->bindValue(":course_code",$this->course_code,PDO::PARAM_STR);
		$stmt->bindValue(":course_summary",$this->course_summary,PDO::PARAM_STR);
		$stmt->bindValue(":course_tags",$this->course_tags,PDO::PARAM_STR);
		$stmt->bindValue(":course_by",$this->course_by,PDO::PARAM_STR);
		$stmt->bindValue(":course_language",$this->course_language,PDO::PARAM_STR);
		$stmt->bindValue(":course_price",$this->course_price,PDO::PARAM_STR);
		$stmt->bindValue(":course_id",$this->course_id,PDO::PARAM_INT);
		$stmt->execute();
		$sql2 = "UPDATE courses_continue SET course_rating = :course_rating,course_total_time = :course_total_time,course_reading = :course_reading,course_award = :course_award,course_material = :course_material,course_age_group = :course_age_group,course_pre_requisite = :course_pre_requisite WHERE course_id = :course_id";
		$stmt = $conn->prepare($sql2);
		
		$stmt->bindValue(":course_rating",$this->course_rating,PDO::PARAM_STR);
		$stmt->bindValue(":course_total_time",$this->course_total_time,PDO::PARAM_STR);
		$stmt->bindValue(":course_reading",$this->course_reading,PDO::PARAM_STR);
		$stmt->bindValue(":course_award",$this->course_award,PDO::PARAM_STR);
		$stmt->bindValue(":course_material",$this->course_material,PDO::PARAM_STR);
		$stmt->bindValue(":course_age_group",$this->course_age_group,PDO::PARAM_STR);
		$stmt->bindValue(":course_pre_requisite",$this->course_pre_requisite,PDO::PARAM_STR);
		$stmt->bindValue(":course_id",$this->course_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
	}
	
//Delete data from both courses and courses_continue table by their Id
	
	public function deletes(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "DELETE FROM courses WHERE course_id = :course_id LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":course_id",$this->course_id,PDO::PARAM_INT);
		$stmt->execute();
		$sql2 = "DELETE FROM courses_continue WHERE course_id = :course_id LIMIT 1";
		$stmt = $conn->prepare($sql2);
		$stmt->bindValue(":course_id",$this->course_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}

//Check if a lesson/lessons exist in a course
	
	public static function checkLessonsExist($id){
	
	$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
	$sql = "SELECT * FROM lessons LEFT JOIN courses ON course_id = lesson_for WHERE lessons = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":id",$id,PDO::PARAM_INT);
	$stmt->execute();
	$list = array();
	while($row = $stmt->fetch())
		{
			$courses = new Courses($row);
			$list[] = $courses;
		}
		
		$conn = null;
        return(array("results" => $list));
}


//Checks if a course is already added by Id

    public static function getAddCoursesById($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM addcourses_test WHERE courses_added = :courses_added AND user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":courses_added",$id,PDO::PARAM_INT);
		$stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch();
		if($row)return new Courses($row);
		
	}

//Adds a course to the payment table if its free

    public static function addaCourse($id){
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO purchases(user_id,purchase_for,purchase_amount,purchase_at,purchase_status,t_id)VALUES(:user_id,:purchase_for,:purchase_amount,NOW(),:purchase_status,:t_id)";
		$stmt= $conn->prepare($sql);
		$stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
		$stmt->bindValue(":purchase_for",$id,PDO::PARAM_INT);
		$stmt->bindValue(":purchase_amount","Free",PDO::PARAM_STR);
		$stmt->bindValue(":purchase_status","success",PDO::PARAM_STR);
		$stmt->bindValue(":t_id",$txnid,PDO::PARAM_STR);
		$stmt->execute();
		$conn = null;
	}
	

	
//List all the courses owned by the user through payment

	public static function listYourPaidCourses($id,$numRows = 12){
		
		
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $numRows;
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM purchases LEFT JOIN courses ON course_id = purchase_for WHERE user_id = :user_id AND purchase_status = 'success' ORDER BY purchase_at DESC LIMIT :start,:numRows";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$id,PDO::PARAM_INT);
		$stmt->bindValue(":start",$start,PDO::PARAM_INT);
		$stmt->bindValue(":numRows",$numRows,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		while($row = $stmt->fetch())
		{
			$courses = new Courses($row);
			$list[] = $courses;
		}
		$conn = null;
		return(array("results"=>$list));
		
	}
	
//Check if the user owns the course

	public static function checkOwnedCourse($id){
		
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM purchases WHERE user_id = :user_id AND purchase_status = 'success' AND purchase_for = :purchase_for";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
		$stmt->bindValue(":purchase_for",$id,PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch();
		if($row)return new Courses($row);
		
	}	
	
//Get the pagination for Your Courses

    public static function getYourCoursesPagination($numRows = 12){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM purchases LEFT JOIN courses ON course_id = purchase_for WHERE user_id = :user_id AND purchase_status = 'success' ORDER BY purchase_at DESC";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
        $stmt->execute();		
		$list = array();
		
		while($row = $stmt->fetch())
		{
			$courses = new Courses($row);
			$list[] = $courses;
		}
		
		
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = 1;
		$prev = $page - 1;
        $next = $page + 1;
		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		$total_pages = ceil($totalRows[0]/$numRows);
		$conn = null;
		return(array("results" => $list,"page" => $page,"prev" => $prev,"next" => $next,"totalPages" => $total_pages));
	}	
	
}




?>