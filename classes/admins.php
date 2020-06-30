<?php

class Admins{
	
	public $user_id=null;
	public $user_name=null;
	public $user_contact=null;
	public $user_email_address=null;
	public $user_password=null;
	public $user_certificates=null;
	public $user_about=null;
	public $user_image="";
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
		if(isset($data['user_about']))
		{
			$this->user_about = $data['user_about'];
		}
		if(isset($data['user_image']))
		{
			$this->user_image = $data['user_image'];
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
	
	
//Stores the forms value
	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
//Store and move an uploaded image
	
	public function storeUploadedImage($image){
		
		if($image['error'] == UPLOAD_ERR_OK)
		{
			
			
			$this->deleteImages();
			
			$this->user_image = strtolower(strrchr($image['name'],'.'));
			$tempFilename = trim($image['tmp_name']);
			if(is_uploaded_file($tempFilename)){
				
				if(!(move_uploaded_file($tempFilename,$this->getImagePath()))) trigger_error( "Admins::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
				
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
                trigger_error ( "Admins::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
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
          trigger_error ( "Admins::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }
			
		$this->edit_with_image();
		}
	}
	
//Store and move uploaded Images-Admin Area

	public function storeUploadedImageAdmin($image){
		
		if($image['error'] == UPLOAD_ERR_OK)
		{
			
			
			$this->deleteImages();
			
			$this->user_image = strtolower(strrchr($image['name'],'.'));
			$tempFilename = trim($image['tmp_name']);
			
			if(is_uploaded_file($tempFilename)){
				
				if(!(move_uploaded_file($tempFilename,$this->getImagePath()))) trigger_error( "Admins::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
				
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
                trigger_error ( "Admins::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
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
          trigger_error ( "Admins::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
      }
			
		$this->edit_with_image_admin();
		}
	}
	
//Delete an image based off the course table Id 	
	public function deleteImages(){
		
	 foreach (glob(USER_IMAGE_PATH ."/".IMG_TYPE_FULLSIZE . "/" . $this->user_id . ".*") as $filename)
	 {
		 
		 if(!unlink($filename)) trigger_error("Admins::deleteImages(): Couldn't delete image file.",E_USER_ERROR);
	 }
	 foreach (glob(USER_IMAGE_PATH ."/".IMG_TYPE_THUMB . "/" . $this->user_id . ".*") as $filename)
	 {
		 if(!unlink($filename)) trigger_error("Admins::deleteImages(): Couldn't delete image file.",E_USER_ERROR);
	 }
	 $this->user_image = "";
	}
	
//Get the path of the folder where the image will be stored
	
	public function getImagePath( $type=IMG_TYPE_FULLSIZE ) {
    return ( $this->user_id && $this->user_image ) ? ( USER_IMAGE_PATH . "/$type/" . $this->user_id . $this->user_image ) : false;
  }	
	
//Inserts both the user and admins details
	
	public function insert(){
		
		$token = 'sadkjeawhijwajdilhasilfjaehioryweapirjpway9uprpjrpewahjrej23136513123q08192383431';
		$token = str_shuffle($token);
		$token= substr($token,0,10);
		$hash = password_hash($this->user_password,PASSWORD_DEFAULT);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO users(users.user_name,users.user_contact,users.user_email_address,users.user_password,users.user_lvl,users.user_unique)VALUES(:user_name,:user_contact,:user_email_address,:user_password,:user_lvl,:user_unique)";
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
	
//Insert New

	
//Edits both the users and admins details
	
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
	
//Edit New

	public function edit_new(){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE users SET user_name = :user_name,user_contact = :user_contact,user_email_address = :user_email_address,user_about = :user_about WHERE user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_name",$this->user_name,PDO::PARAM_STR);
		$stmt->bindValue(":user_contact",$this->user_contact,PDO::PARAM_STR);
		$stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
		$stmt->bindValue(":user_about",$this->user_about,PDO::PARAM_STR);
		$stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
		
		
	}
	
//Edit New Admin

    public function edit_new_admin(){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE users SET user_name = :user_name,user_contact = :user_contact,user_email_address = :user_email_address,user_about = :user_about WHERE user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_name",$this->user_name,PDO::PARAM_STR);
		$stmt->bindValue(":user_contact",$this->user_contact,PDO::PARAM_STR);
		$stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
		$stmt->bindValue(":user_about",$this->user_about,PDO::PARAM_STR);
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
		
		
	}	
	
//Update the user data if an image is uploaded
	
	public function edit_with_image(){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		
			$sql = "UPDATE users SET user_name = :user_name,user_contact = :user_contact,user_email_address = :user_email_address,user_about = :user_about,user_image = :user_image WHERE user_id = :user_id";
			$stmt = $conn->prepare($sql);
		    $stmt->bindValue(":user_name",$this->user_name,PDO::PARAM_STR);
		    $stmt->bindValue(":user_contact",$this->user_contact,PDO::PARAM_STR);
		    $stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
			$stmt->bindValue(":user_about",$this->user_about,PDO::PARAM_STR);
			$stmt->bindValue(":user_image",$this->user_image,PDO::PARAM_STR);
		    $stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
		    $stmt->execute();
		    $conn = null;
	
		
		
		
	}
	
//Update the user data if an image is uploaded-Admin Area

	public function edit_with_image_admin(){
		
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		
			$sql = "UPDATE users SET user_name = :user_name,user_contact = :user_contact,user_email_address = :user_email_address,user_about = :user_about,user_image = :user_image WHERE user_id = :user_id";
			$stmt = $conn->prepare($sql);
		    $stmt->bindValue(":user_name",$this->user_name,PDO::PARAM_STR);
		    $stmt->bindValue(":user_contact",$this->user_contact,PDO::PARAM_STR);
		    $stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
			$stmt->bindValue(":user_about",$this->user_about,PDO::PARAM_STR);
			$stmt->bindValue(":user_image",$this->user_image,PDO::PARAM_STR);
		    $stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		    $stmt->execute();
		    $conn = null;
	
		
		
		
	}
	
//Get Users Current Password

      public static function get_current_password($id){
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT user_password FROM users WHERE user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$stmt->bindColumn("user_password",$password);
		$stmt->fetch();
		$conn = null;
		return(array("password"=>$password));
	  }
//Edit the Users Password

    public function edit_password(){
		
		$hash = password_hash($this->user_password,PASSWORD_DEFAULT);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE users SET user_password = :user_password WHERE user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_password",$hash,PDO::PARAM_STR);
		$stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}
	
//Edit the User/Admin Password-Admin area

	public function edit_password_admin(){
		
		$hash = password_hash($this->user_password,PASSWORD_DEFAULT);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE users SET user_password = :user_password WHERE user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_password",$hash,PDO::PARAM_STR);
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
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
	
//User Login

	public function login(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT user_id,user_email_address,user_password,user_ban FROM users WHERE user_email_address = :user_email_address and user_lvl = 0";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
		$stmt->execute();
		$stmt->bindColumn("user_id",$id);
		$stmt->bindColumn("user_password",$pass);
		$stmt->bindColumn("user_ban",$ban);
		$exists = $stmt->fetch();
	    $conn = null;
		
		
		return(array("exists"=>$exists,"pass"=>$pass,"ban"=>$ban,"id"=>$id));
		
	}
	
//Check if the user is an admin	

    public static function checkIfAdmin(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM users WHERE user_id = :user_id and user_lvl = 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$_SESSION['user_id'],PDO::PARAM_INT);
		$stmt->execute();
		$exists = $stmt->fetch();
	    $conn = null;
		
		
		return(array("exists"=>$exists));
		
	}
	
//Admin Login	
	public function login_admin(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT user_id,user_email_address,user_password,user_ban FROM users WHERE user_email_address = :user_email_address and user_lvl = 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_email_address",$this->user_email_address,PDO::PARAM_STR);
		$stmt->execute();
		$stmt->bindColumn("user_id",$id);
		$stmt->bindColumn("user_password",$pass);
		$stmt->bindColumn("user_ban",$ban);
		$exists = $stmt->fetch();
	    $conn = null;
		
		
		return(array("exists"=>$exists,"pass"=>$pass,"ban"=>$ban,"id"=>$id));
		
	}
	
}



?>