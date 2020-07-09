<?php

class Orders{
	
	public $purchase_id = null;
	public $user_id = null;
	public $purchase_type = null;
	public $purchase_for = null;
	public $purchase_amount = null;
	public $purchase_at = null;
	public $purchase_status = null;
	public $user_name = null;
	public $user_contact = null;
	public $user_email_address = null;
	public $course_name = null;
	public $t_id = null;

	
	public function __construct($data=array())
	{
		if(isset($data['purchase_id'])) 
		{
		$this->purchase_id = $data['purchase_id'];
		}
		if(isset($data['user_id']))
		{
			$this->user_id = $data['user_id'];
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
		if(isset($data['course_name']))
		{
			$this->course_name = $data['course_name'];
		}
		if(isset($data['t_id']))
		{
			$this->t_id = $data['t_id'];
		}
	}
	
//Store a Forms Value	
	public function storeFormValues($params){
		$this->__construct($params);
	}
	
//Get all the purchases list
	
	public static function getOrdersList(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM purchases LEFT JOIN users ON users.user_id = purchases.user_id";
		$result = $conn->query($sql);
		$list = array();
		while($row = $result->fetch())
		{
			$orders = new Orders($row);
			$list[] = $orders;
		}
		$conn = null;
		return(array("results"=>$list));
		
	}
	
//Get All the Users Orders
	public static function getUsersOrders($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM purchases LEFT JOIN users ON users.user_id = purchases.user_id LEFT JOIN courses ON courses.course_id = purchases.purchase_for WHERE purchases.user_id = :id AND purchases.purchase_status = 'success'";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$list = array();
		while($row = $stmt->fetch())
		{
			$orders = new Orders($row);
			$list[] = $orders;
		}
		$conn = null;
		return(array("results"=>$list));
		
	
	}
	
//Get User Invoice
	//Get All the Users Orders
	public static function getInvoice($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM purchases LEFT JOIN users ON users.user_id = purchases.user_id LEFT JOIN courses ON courses.course_id = purchases.purchase_for WHERE purchases.purchase_id = :id AND purchases.purchase_status = 'success'";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Orders($row);
		
	
	}
	
//Get a single purchases row By Id
	
	public static function getOrderById($id){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT * FROM purchases WHERE purchase_id = :purchase_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":purchase_id",$id,PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		$conn = null;
		if($row) return new Orders($row);
	}	
	
//Check if a user already owns a course
	
	public function checkOrderById(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM purchases WHERE user_id = :user_id AND purchase_for = :purchase_for AND purchase_status = 'success'";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->bindValue(":purchase_for",$this->purchase_for,PDO::PARAM_INT);
		$stmt->execute();

		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		return(array("totalRows" => $totalRows[0]));
	}	
	
//Check if a user already owns a course - Static Version For Lessons
	//Check if a user already owns a course
	
	public static function checkOrderByIdStatic($id,$course){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM purchases WHERE user_id = :user_id AND purchase_for = :purchase_for AND purchase_status = 'success'";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$id,PDO::PARAM_INT);
		$stmt->bindValue(":purchase_for",$course,PDO::PARAM_INT);
		$stmt->execute();

		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		return(array("totalRows" => $totalRows[0]));
	}
	
//Add an order 

     //Insert a forms value into the purchases table
	
	public function insert(){
		
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "INSERT INTO purchases(user_id,purchase_type,purchase_for,purchase_amount,purchase_at,purchase_status,t_id)VALUES(:user_id,:purchase_type,:purchase_for,:purchase_amount,NOW(),:purchase_status,:t_id)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->bindValue(":purchase_type",$this->purchase_type,PDO::PARAM_STR);
		$stmt->bindValue(":purchase_for",$this->purchase_for,PDO::PARAM_INT);
		if(empty($this->purchase_amount))
		{
		 $stmt->bindValue(":purchase_amount","Free",PDO::PARAM_STR);
		}
		else
		{
			$stmt->bindValue(":purchase_amount",$this->purchase_amount,PDO::PARAM_STR);
		}
		$stmt->bindValue(":purchase_status","success",PDO::PARAM_STR);
		$stmt->bindValue(":t_id",$txnid,PDO::PARAM_STR);
		$stmt->execute();
		$this->purchase_id = $conn->lastInsertId();
		$conn = null;
	}

//Edit an order
	
     public function edit(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "UPDATE purchases SET user_id = :user_id,purchase_type = :purchase_type,purchase_for = :purchase_for,purchase_amount = :purchase_amount WHERE purchase_id = :purchase_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":user_id",$this->user_id,PDO::PARAM_INT);
		$stmt->bindValue(":purchase_type",$this->purchase_type,PDO::PARAM_STR);
		$stmt->bindValue(":purchase_for",$this->purchase_for,PDO::PARAM_INT);
		if(empty($this->purchase_amount))
		{
		 $stmt->bindValue(":purchase_amount","Free",PDO::PARAM_STR);
		}
		else
		{
			$stmt->bindValue(":purchase_amount",$this->purchase_amount,PDO::PARAM_STR);
		}
		$stmt->bindValue(":purchase_id",$this->purchase_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
		
	}
	
//Delete a row from the purchases table 
	
	public function deletes(){
		
		$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
		$sql = "DELETE FROM purchases WHERE purchase_id = :purchase_id LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":purchase_id",$this->purchase_id,PDO::PARAM_INT);
		$stmt->execute();
		$conn = null;
	}
	
}

?>