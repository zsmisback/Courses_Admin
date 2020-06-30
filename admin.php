<?php

require( "config.php" );
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
	$cat_name = '';
	$cat_desc = '';
	$vpc = '';
	
	if(isset($_POST['submit']))
	{
		
	   $courses = new Courses;
	   $courses->storeFormValues($_POST);
	   $courses->insert();
       $courses->storeUploadedImage($_FILES['image']);
	   viewcourses();
	   return;

	
	}
	require(TEMPLATE_PATH."/addcourses.php");
}

function editcourses(){
	
	if(!isset($_GET['course_id']) || !$_GET['course_id'])
	{
		viewcourses();
		return;
	}
	
	if(isset($_POST['submit']))
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
	
	if(isset($_POST['submit']))
	{
		$vpcode = $_POST['vpcode'];
		if(empty($vpcode))
		{
			$error = "Please enter the vpcode";
		}
		elseif($vpcode !== DELETE_COURSE)
		{
			$error = "Invalid vpcode";
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
	
  if(isset($_POST['submit']))
  {
	  $lessons = new Lessons;
	  $lessons->storeFormValues($_POST);
	  $lessons->insert();
	  viewlessons();
	  return;
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
	
	if(isset($_POST['submit']))
	{
		$lessons = new Lessons;
		$lessons->storeFormValues($_POST);
		$lessons->edit();
		viewlessons();
		return;
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
	
	if(isset($_POST['submit']))
	{
		$vpcode = $_POST['vpcode'];
		if(empty($vpcode))
		{
			$error = "Please enter the vpcode";
		}
		elseif($vpcode !== DELETE_LESSON)
		{
			$error = "Invalid vpcode";
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
	
	if(isset($_POST['submit']))
	{
		$comments = new Comments;
		$comments->storeFormValues($_POST);
		$comments->insert();
		viewcomments();
		return;
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
	
	if(isset($_POST['submit']))
	{
		$comments = new Comments;
		$comments->storeFormValues($_POST);
		$comments->edit();
		viewcomments();
		return;
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
	if(isset($_POST['submit']))
	{
		$vpcode = $_POST['vpcode'];
		if(empty($vpcode))
		{
			$error = "Please enter the vpcode";
		}
		elseif($vpcode !== ADD_ADMIN)
		{
			$error = "Invalid vpcode";
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
	if(isset($_POST['submit']))
	{
		$vpcode = $_POST['vpcode'];
		if(empty($vpcode))
		{
			$error = "Please enter the vpcode";
		}
		elseif($vpcode !== EDIT_USER)
		{
			$error = "Invalid vpcode";
		}
		elseif(empty($_FILES['image']['name']))
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
			$error = "This password does not match your current password";
		}
		elseif(empty($_POST['user_password']))
		{
			$error = "Please type in your new password";
		}
		elseif($_POST['re_pass'] !== $_POST['user_password'])
		{
			$error = "This password does not match your new password";
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
	
	if(isset($_POST['submit']))
	{
		$vpcode = $_POST['vpcode'];
		if(empty($vpcode))
		{
			$error = "Please enter the vpcode";
		}
		elseif($vpcode !== BAN_USER)
		{
			$error = "Invalid vpcode";
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
	
	if(isset($_POST['submit']))
	{
		$vpcode = $_POST['vpcode'];
		if(empty($vpcode))
		{
			$error = "Please enter the vpcode";
		}
		elseif($vpcode !== DELETE_USER)
		{
			$error = "Invalid vpcode";
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