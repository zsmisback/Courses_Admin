<?php

class Courses{
	
	public $course_id=null;
	public $course_name=null;
	public $course_code=null;
	public $course_summary=null;
	public $course_tags=null;
	public $course_by=null;
	public $course_language=null;
	public $course_image="";
	public $course_rating=null;
	public $course_total_time=null;
	public $course_reading=null;
	public $course_award=null;
	public $course_material=null;
	public $course_age_group=null;
	
	
	public function __construct($data=array())
	{
		if(isset($data['course_id'])) 
		{
		$this->course_id = $data['course_id'];
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
	}
	
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
	
	public static function getDuplicateList($name)
	{
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM category WHERE cat_name = :name";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":name",$name,PDO::PARAM_STR);
		$stmt->execute();
		$list = array();
		
		while($row = $stmt->fetch())
		{
			$category = new Category($row);
			$list[] = $category;
		}
		
		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		$conn = null;
        return(array("results" => $list,"totalRows" => $totalRows[0]));
	}
	
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
	
	public static function getCoursesById2($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM category WHERE cat_id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Category($row);
	}
	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
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
			
		$this->edit2();
		}
	}
	
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
	
	public function getImagePath( $type=IMG_TYPE_FULLSIZE ) {
    return ( $this->course_id && $this->course_image ) ? ( CATEGORY_IMAGE_PATH . "/$type/" . $this->course_id . $this->course_image ) : false;
  }
	
	public function insert(){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO courses(course_name,course_code,course_summary,course_tags,course_by,course_language)VALUES(:course_name,:course_code,:course_summary,:course_tags,:course_by,:course_language)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":course_name",$this->course_name,PDO::PARAM_STR);
		$stmt->bindValue(":course_code",$this->course_code,PDO::PARAM_STR);
		$stmt->bindValue(":course_summary",$this->course_summary,PDO::PARAM_STR);
		$stmt->bindValue(":course_tags",$this->course_tags,PDO::PARAM_STR);
		$stmt->bindValue(":course_by",$this->course_by,PDO::PARAM_STR);
		$stmt->bindValue(":course_language",$this->course_language,PDO::PARAM_STR);
		$stmt->execute();
		$this->course_id = $conn->lastInsertId();
		$conn = null;
	}
	
	public function insert2(){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO courses_continue(course_image,course_rating,course_total_time,course_reading,course_award,course_material,course_age_group)VALUES(:course_image,:course_rating,:course_total_time,:course_reading,:course_award,:course_material,:course_age_group)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":course_image",$this->course_image,PDO::PARAM_STR);
		$stmt->bindValue(":course_rating",$this->course_rating,PDO::PARAM_STR);
		$stmt->bindValue(":course_total_time",$this->course_total_time,PDO::PARAM_STR);
		$stmt->bindValue(":course_reading",$this->course_reading,PDO::PARAM_STR);
		$stmt->bindValue(":course_award",$this->course_award,PDO::PARAM_STR);
		$stmt->bindValue(":course_material",$this->course_material,PDO::PARAM_STR);
		$stmt->bindValue(":course_age_group",$this->course_age_group,PDO::PARAM_STR);
		$stmt->execute();
		$this->course_id = $conn->lastInsertId();
		$conn = null;
	}
	
	public function edit(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE category SET cat_name = :cat_name,cat_desc = :cat_desc,cat_img = :cat_img WHERE cat_id = :cat_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":cat_name",$this->cat_name,PDO::PARAM_STR);
		$stmt->bindValue(":cat_desc",$this->cat_desc,PDO::PARAM_STR);
		$stmt->bindValue(":cat_img",$this->cat_img,PDO::PARAM_STR);
		$stmt->bindValue(":cat_id",$this->cat_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
	}
	
	public function edit2(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE courses_continue SET course_image = :course_image,course_rating = :course_rating,course_total_time = :course_total_time,course_reading = :course_reading,course_award = :course_award,course_material = :course_material,course_age_group = :course_age_group WHERE course_id = :course_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":course_image",$this->course_image,PDO::PARAM_STR);
		$stmt->bindValue(":course_rating",$this->course_rating,PDO::PARAM_STR);
		$stmt->bindValue(":course_total_time",$this->course_total_time,PDO::PARAM_STR);
		$stmt->bindValue(":course_reading",$this->course_reading,PDO::PARAM_STR);
		$stmt->bindValue(":course_award",$this->course_award,PDO::PARAM_STR);
		$stmt->bindValue(":course_material",$this->course_material,PDO::PARAM_STR);
		$stmt->bindValue(":course_age_group",$this->course_age_group,PDO::PARAM_STR);
		$stmt->bindValue(":course_id",$this->course_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
	}
	
	public function editonlytext(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE category SET cat_name = :cat_name,cat_desc = :cat_desc WHERE cat_id = :cat_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":cat_name",$this->cat_name,PDO::PARAM_STR);
		$stmt->bindValue(":cat_desc",$this->cat_desc,PDO::PARAM_STR);
		$stmt->bindValue(":cat_id",$this->cat_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
	}
	
	public function deletes(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "DELETE FROM category WHERE cat_id = :cat_id LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":cat_id",$this->cat_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}
	
}


?>