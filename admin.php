<?php

require( "config.php" );
require("checkauthentication.php");
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$loggedin = isset( $_SESSION['loggedin'] ) ? $_SESSION['loggedin'] : "";

if ( $action != "login" && $action != "logout" && !$loggedin ) {
  login();
  exit;
}

switch ( $action ) {
  
  case 'dashboard':
  dashboard();
  break;
  
  case 'login':
  login();
  break;
  
  case 'addcourses':
  addcourses();
  break;
  
   case 'editcourses':
  editcourses();
  break;
  
  case 'deletecourses';
  deletecourses();
  break;
  
  case 'viewcourses':
  viewcourses();
  break;
  
  case 'addlessons';
  addlessons();
  break;
  
  case 'editlessons':
  editlessons();
  break;
  
  case 'deletelessons':
  deletelessons();
  break;
  
  case 'viewlessons':
  viewlessons();
  break;
  
  case 'addcomments':
  addcomments();
  break;
  
  case 'editcomments':
  editcomments();
  break;
  
  case 'deletecomments':
  deletecomments();
  break;
  
  case 'viewcomments':
  viewcomments();
  break;
  
  case 'addadmins':
  addadmins();
  break;
  
  case 'editusers':
  editusers();
  break;
  
  case 'edituserspass':
  edituserspass();
  break;
  
  case 'banusers':
  banusers();
  break;
  
  case 'deleteusers':
  deleteusers();
  break;
  
  case 'viewadmins':
  viewadmins();
  break;
  
  case 'viewusers':
  viewusers();
  break;
  
  case 'addorders':
  addorders();
  break;
  
  case 'editorders':
  editorders();
  break;
  
  case 'deleteorders':
  deleteorders();
  break;
  
  case 'listorders':
  listorders();
  break;
  
  case 'logout':
  logout();
  break;
  
  default:
  login();
  break;
}

//Dashboard-------------------------------------

function dashboard(){
	
	
	require(TEMPLATE_PATH."/index.php");
	
}

//Courses------------------------------------------------

function addcourses(){
	
	$error = '';
	$course_name = '';
	$course_code = '';
	$course_summary = '';
	$course_tags = '';
	$course_by = '';
	$course_price = '';
	$course_total_time = '';
	$course_reading = '';
	$course_award = '';
	$course_material = '';
	$course_pre_requisite = '';
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$course_name = $_POST['course_name'];
	    $course_code = $_POST['course_code'];
	    $course_summary = $_POST['course_summary'];
 	    $course_tags = $_POST['course_tags'];
	    $course_by = $_POST['course_by'];
	    $course_price = $_POST['course_price'];
	    $course_total_time = $_POST['course_total_time'];
	    $course_reading = $_POST['course_reading'];
	    $course_award = $_POST['course_award'];
	    $course_material = $_POST['course_material'];
	    $course_pre_requisite = $_POST['course_pre_requisite'];
		
	  $authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  elseif(empty($_FILES['image']['name']))
	  {
		  $error = "Please include an image";
	  }
	  else
	  {
		
	   $courses = new Courses;
	   $courses->storeFormValues($_POST);
	   $courses->insert();
       $courses->storeUploadedImage($_FILES['image']);
	   viewcourses();
	   return;
	  }

	
	}
	require(TEMPLATE_PATH."/addcourses.php");
}

function editcourses(){
	
	if(!isset($_GET['course_id']) || !$_GET['course_id'])
	{
		viewcourses();
		return;
	}
	
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	  {
		
		if (empty($_FILES['image']['name']))
        {			
		
              $courses = new Courses;
		      $courses->storeFormValues($_POST);
		       $courses->editonlytext();
			   viewcourses();
		       return;
		  
	  
	    }
		else
		{
			$courses = new Courses;
		    $courses->storeFormValues($_POST);
		     $courses->edit();
			$courses->storeUploadedImage($_FILES['image']);
			viewcourses();
		       return;
		}
	  }
		
		
	   
		
	}


    $results = array();
	$results['courses'] = Courses::getCoursesById((int)$_GET['course_id']);
	$results['courses_continue'] = Courses::getCoursesById2((int)$_GET['course_id']);
	require(TEMPLATE_PATH."/editcourses.php");
}

function deletecourses(){
	
	if(!isset($_GET['course_id']) || !$_GET['course_id'])
	{
		viewcourses();
		return;
	}
	
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	  {
			$courses = new Courses;
			$courses->storeFormValues($_POST);
			$courses->deletes();
			$courses->deleteImages();
			viewcourses();
		    return;
		}
		
	}
	
	
	require(TEMPLATE_PATH."/deletecourses.php");
}

function viewcourses(){
	
	$results = array();
	$data = Courses::getCoursesList();
	$results['courses'] = $data['results'];


	require(TEMPLATE_PATH."/listcourses.php");
}

//Lessons------------------------------------


//Add lessons
function addlessons(){
	
	$error = '';
	$lesson_name = '';
	$lesson_no = '';
	$lesson_content = '';
	$lesson_by = '';
	$lesson_vid_url = '';
	
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
	  $lesson_name = $_POST['lesson_name'];
	  $lesson_no = $_POST['lesson_no'];
	  $lesson_content = $_POST['lesson_content'];
	  $lesson_by = $_POST['lesson_by'];
	  $lesson_vid_url = $_POST['lesson_vid_url'];
	
	$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	 {
	  $lessons = new Lessons;
	  $lessons->storeFormValues($_POST);
	  $lessons->insert();
	  viewlessons();
	  return;
	 }
  }
  
  
    $results = array();
	$data = Courses::getCoursesList();
	$results['courses'] = $data['results'];
	require(TEMPLATE_PATH."/addlessons.php");
}

function editlessons(){
	
	if(!isset($_GET['lesson_id']) || !$_GET['lesson_id'])
	{
		viewlessons();
		return;
		
	}
	
	$error = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	 {
		$lessons = new Lessons;
		$lessons->storeFormValues($_POST);
		$lessons->edit();
		viewlessons();
		return;
	 }
	}
	$results = array();
	$data = Courses::getCoursesList();

	$results['lessons'] = Lessons::getLessonsById((int)($_GET['lesson_id']));
	
	$results['courses'] = $data['results']; 
	require(TEMPLATE_PATH."/editlessons.php");
}

function deletelessons(){
	
	if(!isset($_GET['lesson_id']) || !$_GET['lesson_id'])
	{
		viewlessons();
		return;
	}
	
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	 {
			$lessons = new Lessons;
			$lessons->storeFormValues($_POST);
			$lessons->deletes();
			viewlessons();
		    return;
		}
		
	}
	require(TEMPLATE_PATH."/deletelessons.php");
}

function viewlessons(){
	
	$results = array();
	$data = Lessons::getLessonsList();
	$results['lessons'] = $data['results'];
	require(TEMPLATE_PATH."/listlessons.php");
}

//Comments---------------------------

//Add comments
function addcomments(){
	
	$error = '';
	$comment_summary = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$comment_summary = $_POST['comment_summary'];
		
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	 {
		$comments = new Comments;
		$comments->storeFormValues($_POST);
		$comments->insert();
		viewcomments();
		return;
	 }
	 
	}
	$data = Lessons::getLessonsList();
	$results['lessons'] = $data['results'];
	require(TEMPLATE_PATH."/addcomments.php");
}

//Edit comments
function editcomments(){
	
	if(!isset($_GET['comment_id']) || !$_GET['comment_id'])
	{
		viewcomments();
		return;
	}
	
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	 {
		$comments = new Comments;
		$comments->storeFormValues($_POST);
		$comments->edit();
		viewcomments();
		return;
	 }
	}
	
	$data = Lessons::getLessonsList();
	$results['lessons'] = $data['results'];
	$results['comments'] = Comments::getCommentsById((int)$_GET['comment_id']);
	require(TEMPLATE_PATH."/editcomments.php");
}

//Delete Comments

function deletecomments(){
	
	if(!isset($_GET['comment_id']) || !$_GET['comment_id'])
	{
		viewcomments();
		return;
	}
	
	     $comments = Comments::getCommentsById((int)$_GET['comment_id']);
	      $comments->deletes();
	      viewcomments();
		  return;
	
	
}

function viewcomments(){
	
	
	$data = Comments::getCommentsList();
	$results['comments'] = $data['results'];
	require(TEMPLATE_PATH."/listcomments.php");
}

//Users--------------------------

//Add an admin
function addadmins(){
	
	$error = '';
	$user_name = '';
	$user_contact = '';
	$user_email_address = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$user_name = $_POST['user_name'];
		$user_contact = $_POST['user_contact'];
		$user_email_address = $_POST['user_email_address'];
		
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	 {
		$admins = new Admins;
		$admins->storeFormValues($_POST);
		$admins->insert();
		viewadmins();
		return;
	 }
	}
	require(TEMPLATE_PATH."/addadmins.php");
}

//Edit User and Admin Databases

function editusers(){
	
	if(!isset($_GET['user_id']) || !$_GET['user_id'])
	{
		viewadmins();
		return;
	}
	
	$error = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		
		$authenticate = checkauthentication($_POST);
	  if($authenticate !== "cool")
	  {
		  $error = $authenticate;
	  }
	  else
	 {
		if(empty($_FILES['image']['name']))
		{
			$users = new Admins;
		    $users->storeFormValues($_POST);
		    $users->edit_new_admin();
			viewadmins();
			return;
			
		}
		else
		{
			
		   $users = new Admins;
		    $users->storeFormValues($_POST);
		    $users->edit_with_image_admin();
		  $users->storeUploadedImageAdmin($_FILES['image']);
		  viewadmins();
		  return;
		}
	 }
	}
	
	$results['users'] = Admins::getUsersById((int)($_GET['user_id']));
	require(TEMPLATE_PATH."/editusers.php");
}

//Edit User/Admin Password

function edituserspass(){
	
	if(!isset($_GET['user_id']) || !$_GET['user_id'])
	{
		viewadmins();
		return;
	}
	
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$results = array();
	    $data = Admins::get_current_password((int)$_GET['user_id']);
	    $results['password'] = $data['password'];
		
		
		
		if(!password_verify($_POST['curr_pass'],$results['password']))
		{
			$error = "This password does not match the current password";
		}
		elseif(empty($_POST['user_password']))
		{
			$error = "Please type in the new password";
		}
		elseif($_POST['re_pass'] !== $_POST['user_password'])
		{
			$error = "This password does not match the new password";
		}
		elseif($_POST['vpcode'] !== EDIT_USER_PASSWORD)
		{
			$error = "Invalid Vpcode";
		}
		else
		{
		 $users = new Admins;
		 $users->storeFormValues($_POST);
		 $users->edit_password_admin();
		 header("Location:admin.php?action=viewadmins");
		 exit;
		
		}
		
	}
	require(TEMPLATE_PATH."/edituserspass.php");
}

//Ban Users/Admins

function banusers(){
	
	if(!isset($_GET['user_id']) || !$_GET['user_id'])
	{
		viewadmins();
		return;
	}
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$authenticate = checkauthentication($_POST);
	    if($authenticate !== "cool")
	    {
		  $error = $authenticate;
	    }
	     else
	    {
			$users = new Admins;
			$users->storeFormValues($_POST);
			$users->ban();
			viewusers();
			return;
		}
		
	}
	$results['users'] = Admins::getUsersById((int)$_GET['user_id']);
	require(TEMPLATE_PATH."/banusers.php");
}

//Delete Users/Admins
function deleteusers(){
	
	if(!isset($_GET['user_id']) || !$_GET['user_id'])
	{
		viewadmins();
		return;
	}
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$authenticate = checkauthentication($_POST);
	    if($authenticate !== "cool")
	    {
		  $error = $authenticate;
	    }
	     else
	    {
			$users = new Admins;
			$users->storeFormValues($_POST);
			$users->deletes();
			viewusers();
			return;
		}
	}
	require(TEMPLATE_PATH."/deleteusers.php");
	
}

//View Admins
function viewadmins(){
	
	$results = array();
	$data = Admins::getAdminsList();
	$results['admins'] = $data['results'];
	require(TEMPLATE_PATH."/listadmins.php");
}

//View Users
function viewusers(){
	
	$results = array();
	$data = Admins::getUsersList();
	$results['users'] = $data['results'];
	require(TEMPLATE_PATH."/listusers.php");
}

//Orders--------------------------------------------------------------------

//Add Orders

function addorders(){
	
	$error = '';
	$user_id = '';
	$purchase_for = '';
	$purchase_amount = '';
	
	$results = array();
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
	    $user_id = $_POST['user_id'];
	    $purchase_for = $_POST['purchase_for'];
	    $purchase_amount = $_POST['purchase_amount'];
		
		$authenticate = checkauthentication($_POST);
	    if($authenticate !== "cool")
	    {
		  $error = $authenticate;
	    }
		elseif($authenticate == "cool")
		{
			$orders = new Orders;
			$orders->storeFormValues($_POST);
			$results['check'] = $orders->checkOrderById();
			
			if($results['check']['totalRows'] > 0)
			{
				$error = "This user already owns this course";
			}
			else
	        {
			$orders = new Orders;
			$orders->storeFormValues($_POST);
			$orders->insert();
			listorders();
			return;
		    }
		}
	     
		
	}
	require(TEMPLATE_PATH."/addorders.php");
}

//Edit Orders
function editorders(){
	
	if(!isset($_GET['purchase_id']) || !$_GET['purchase_id'])
	{
		listorders();
		return;
	}
	
	$error = '';
	$user_id = '';
	$purchase_for = '';
	$purchase_amount = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
	    
		
		$authenticate = checkauthentication($_POST);
	    if($authenticate !== "cool")
	    {
		  $error = $authenticate;
	    }
	     else
	    {
			$orders = new Orders;
			$orders->storeFormValues($_POST);
			$orders->edit();
			listorders();
			return;
		}
		
	}
	$results = array();
	$results['orders'] = Orders::getOrderById((int)$_GET['purchase_id']);
	require(TEMPLATE_PATH."/editorders.php");
}

//Delete Orders
function deleteorders(){
	
	if(!isset($_GET['purchase_id']) || !$_GET['purchase_id'])
	{
		listorders();
		return;
	}
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$authenticate = checkauthentication($_POST);
	    if($authenticate !== "cool")
	    {
		  $error = $authenticate;
	    }
	     else
	    {
			$orders = new Orders;
			$orders->storeFormValues($_POST);
			$orders->deletes();
			listorders();
			return;
		}
	}
	require(TEMPLATE_PATH."/deleteorders.php");
	
}

//View Orders
function listorders(){
	
	$results = array();
	$data = Orders::getOrdersList();
	$results['orders'] = $data['results'];
	require(TEMPLATE_PATH."/listorders.php");
}

//Login
function login(){
	
	$error = '';
	
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		
	}
	else
	{
		$results = array();
		$data = Admins::checkIfAdmin();
		$results['check'] = $data['exists'];
		if($results['check'] > 0)
		{
			dashboard();
			return;
		}
		else
		{
			header("Location:index.php");
			exit;
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		
		$users = new Admins;
		$users->storeFormValues($_POST);
		$userinfo = $users->login_admin();
		if($userinfo['exists'] > 0)
		{
		   if($userinfo['ban'] == 0)
		  {
			if(password_verify($_POST['user_password'],$userinfo['pass']))
			{
				$_SESSION["loggedin"] = true;
				$_SESSION["user_id"] = $userinfo["id"];
				dashboard();
				return;
			}
			else
			{
				$error = "The Email or Password does not exist";
			}
		  }
		  else
		  {
			  $error = "You have been banned.Please contact an admin to resolve this issue";
		  }
		}
		else
		{
			$error = "The Email or Password does not exist";
		}
		
	}
	require(TEMPLATE_PATH."/login.php");
}

//Logout
function logout(){
	
	




  $_SESSION = array();
   session_destroy();

 login();
 exit;

}

?>