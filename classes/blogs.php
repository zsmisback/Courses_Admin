<?php

class Blogs{
	
	public $id = null;
	public $title = null;
	public $author = null;
	public $tags = null;
	public $content = null;
	public $dates = null;
	public $image = "";
	public $blog_unique = null;

	
	public function __construct($data=array())
	{
		if(isset($data['id'])) 
		{
		$this->id = $data['id'];
		}
		if(isset($data['title']))
		{
			$this->title = $data['title'];
		}
		if(isset($data['author']))
		{
			$this->author = $data['author'];
		}
		if(isset($data['tags']))
		{
			$this->tags = $data['tags'];
		}
		if(isset($data['content']))
		{
			$this->content = $data['content'];
		}
		if(isset($data['dates']))
		{
			$this->dates = $data['dates'];
		}
		if(isset($data['image']))
		{
			$this->image = $data['image'];
		}
		if(isset($data['blog_unique']))
		{
			$this->blog_unique = $data['blog_unique'];
		}
		
	}
	
//Store and move an uploaded image
	
	public function storeUploadedImage($image){
		
		if($image['error'] == UPLOAD_ERR_OK)
		{
			
			
			$this->deleteImages();
			
			$this->image = strtolower(strrchr($image['name'],'.'));
			$tempFilename = trim($image['tmp_name']);
			
			if(is_uploaded_file($tempFilename)){
				
				if(!(move_uploaded_file($tempFilename,$this->getImagePath()))) trigger_error( "Blogs::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
				
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
                trigger_error ( "Blogs::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
			}
			
			$thumbHeight = 400;
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
          trigger_error ( "Blogs::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }
	  
	  		$thumbHeight = 65;
			$thumbResource = imagecreatetruecolor(CATEGORY_THUMB_WIDTH_SMALL,$thumbHeight);
			imagecopyresampled($thumbResource,$imageResource,0,0,0,0,CATEGORY_THUMB_WIDTH_SMALL, $thumbHeight, $imageWidth, $imageHeight );
			
		// Save the small thumbnail
      switch ( $imageType ) {
        case IMAGETYPE_GIF:
          imagegif ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB_SMALL ) );
          break;
        case IMAGETYPE_JPEG:
          imagejpeg ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB_SMALL ), JPEG_QUALITY_SMALL );
          break;
        case IMAGETYPE_PNG:
          imagepng ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB_SMALL ) );
          break;
        default:
          trigger_error ( "Blogs::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }
	  
		$this->edit();
		}
	}
	
//Delete an image based off the course table Id 	
	public function deleteImages(){
		
	 foreach (glob(BLOG_IMAGE_PATH ."/".IMG_TYPE_FULLSIZE . "/" . $this->id . ".*") as $filename)
	 {
		 if(!unlink($filename)) trigger_error("Blogs::deleteImages(): Couldn't delete image file.",E_USER_ERROR);
	 }
	 foreach (glob(BLOG_IMAGE_PATH ."/".IMG_TYPE_THUMB . "/" . $this->id . ".*") as $filename)
	 {
		 if(!unlink($filename)) trigger_error("Blogs::deleteImages(): Couldn't delete image file.",E_USER_ERROR);
	 }
	 $this->image = "";
	}
	
//Get the path of the folder where the image will be stored
	
	public function getImagePath( $type=IMG_TYPE_FULLSIZE ) {
    return ( $this->id && $this->image ) ? ( BLOG_IMAGE_PATH . "/$type/" . $this->id . $this->image ) : false;
  }
  
//Store a Forms Value	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
//Get all the blogs list
	
	public static function getBlogsList(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM blogs";
		$result = $conn->query($sql);
		$list = array();
		while($row = $result->fetch())
		{
			$blogs = new Blogs($row);
			$list[] = $blogs;
		}
		$conn = null;
		return(array("results"=>$list));
		
	}

	//Get Blogs List With a Limit

    public static function getLimitedBlogs($numRows = 12){
		
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $numRows;
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM blogs ORDER BY dates DESC LIMIT :start,:numRows";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":start",$start,PDO::PARAM_INT);
		$stmt->bindValue(":numRows",$numRows,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		
		while($row = $stmt->fetch())
		{
			$blogs = new Blogs($row);
			$list[] = $blogs;
		}
		
		$conn = null;
		return(array("results"=>$list));
	}


//Get Blogs Pagination That is limited

    public static function getPagination($numRows = 12){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM blogs ORDER BY dates DESC";
		$result = $conn->query($sql);
		$list = array();
		
		while($row = $result->fetch())
		{
			$blogs = new Blogs($row);
			$list[] = $blogs;
		}
		
		
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = 1;
		$prev = $page - 1;
        $next = $page + 1;
		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		$total_pages = ceil($totalRows[0]/$numRows);
		$conn = null;
		return(array("results" => $list,"page" => $page,"prev" => $prev,"next" => $next,"totalPages" => $total_pages,"totalRows" => $totalRows[0]));
	}
	
//Get a single course row data by Id
	
	public static function getBlogsById($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM blogs WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Blogs($row);
	}
	
//Add a Blogs

	public function insert(){
		
		$token = 'sadkjeawhijwajdilhasilfjaehioryweapirjpway9uprpjrpewahjrej23136513123q08192383431';
		$token = str_shuffle($token);
		$token= substr($token,0,10);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO blogs(title,author,tags,content,dates,image,blog_unique)VALUES(:title,:author,:tags,:content,NOW(),:image,:blog_unique)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":title",$this->title,PDO::PARAM_STR);
		$stmt->bindValue(":author",$this->author,PDO::PARAM_STR);
		$stmt->bindValue(":tags",$this->tags,PDO::PARAM_STR);
		$stmt->bindValue(":content",$this->content,PDO::PARAM_STR);
		$stmt->bindValue(":image",$this->image,PDO::PARAM_STR);
		$stmt->bindValue(":blog_unique",$token,PDO::PARAM_STR);
		$stmt->execute();
		$this->id = $conn->lastInsertId();
		$conn = null;
	}
	
//Edit a Blog

	public function edit(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		if(empty($_FILES['image']['name']))
		{
			$sql = "UPDATE blogs SET title = :title,author = :author,tags = :tags,content = :content WHERE id = :id";
		}
		else
		{
		$sql = "UPDATE blogs SET title = :title,author = :author,tags = :tags,content = :content,image = :image WHERE id = :id";
		}
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":title",$this->title,PDO::PARAM_STR);
		$stmt->bindValue(":author",$this->author,PDO::PARAM_STR);
		$stmt->bindValue(":tags",$this->tags,PDO::PARAM_STR);
		$stmt->bindValue(":content",$this->content,PDO::PARAM_STR);
		if(!empty($_FILES['image']['name']))
		{
			$stmt->bindValue(":image",$this->image,PDO::PARAM_STR);
		}
		
		$stmt->bindValue(":id",$this->id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}
	
//Delete a Blog
	
	public function deletes(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "DELETE FROM blogs WHERE id = :id LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$this->id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}	
	
}

?>