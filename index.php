<?php

require( "config.php" );
require("checkauthentication.php");
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";



switch ( $action ) {
  
  case 'home':
  home();
  break;
  
  case 'courses':
  courses();
  break;
  
  case 'lessons':
  lessons();
  break;
  
  case 'content':
  content();
  break;
  
  case 'addcourses':
  addcourses();
  break;
  
  case 'login':
  login();
  break;
  
  case 'signup':
  signup();
  break;
  
  case 'profile':
  profile();
  break;
  
  case 'userpass':
  userpass();
  break;
  
  case 'query':
  query();
  break;
  
  case 'listquery':
  listquery();
  break;
  
  case 'yourcourses':
  yourcourses();
  break;
  
  case 'logout':
  logout();
  break;
  
  default:
  home();
  break;
}

//Home-------------------------------------

function home(){
	
	
	$results = array();
	$data = Courses::getLimitedCourses();
	$results['courses'] = $data['results'];
	require(TEMPLATE_PATH_INDEX."/home.php");
	
}

function courses(){
	
	$results = array();
	$data = Courses::getLimitedCourses();
	$data2 = Courses::getPagination();
	$data3 = Courses::getLimitedCourses(8);
	$results['courses'] = $data['results'];
	$results['page'] = $data2['page'];
	$results['prev'] = $data2['prev'];
	$results['next'] = $data2['next'];
	$results['totalpages'] = $data2['totalPages'];
	$results['recent_courses'] = $data3['results'];
	require(TEMPLATE_PATH_INDEX."/courses.php");
}

function lessons(){
	
	if(!isset($_GET['course_id']) || !$_GET['course_id'])
	{
		home();
		return;
	}
	
	$results = array();
	$data = Lessons::getLessonsByCourseId((int)$_GET['course_id']);
	$data2 = Courses::getLimitedCourses(8);
	$data3 = Courses::getLimitedCourses();
	$results['courses'] = Courses::getCoursesById((int)$_GET['course_id']);
	$results['courses_continue'] = Courses::getCoursesById2((int)$_GET['course_id']);
	$results['lessons'] = $data['results'];
	$results['lessons_continue'] = $data['results_cont'];
	$results['recent_courses'] = $data2['results'];
	$results['recommended_courses'] = $data3['results'];
	require(TEMPLATE_PATH_INDEX."/lessons.php");
}

function content(){
	
	if(!isset($_GET['lesson_id']) || !$_GET['lesson_id'])
	{
		home();
		return;
	}
	$results = array();
	$data = Courses::getLimitedCourses(8);
	$data2 = Lessons::getPagination((int)$_GET['course_id']);
	$data3 = Comments::getCommentsInLessons((int)$_GET['lesson_id']);
	$results['courses'] = $data['results'];
	$results['lessons'] = Lessons::getLessonsById((int)$_GET['lesson_id']);
	$results['totalpages'] = $data2['totalPages'];
	$results['paginations'] = $data2['results'];
	$results['comments'] = $data3['results'];
	
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	 {
		
	 }
	 else
	 {
	  if(empty($_POST['comment_summary']))
	  {
		  $error = "Please type in your comment";
	  }
	  else
	  {
		$comments = new Comments;
		$comments->storeFormValues($_POST);
		$comments->insert_new();
		header("Location:?action=content&course_id=$_GET[course_id]&lesson_id=$_GET[lesson_id]");
		exit;
	  }
	  if(isset($_POST['lesson_rating']))
	  {
		  $comments = new Comments;
		  $comments->storeFormValues($_POST);
		  $comments->insert_rating();
		  header("Location:?action=content&course_id=$_GET[course_id]&lesson_id=$_GET[lesson_id]");
		  exit;
	  }
		  
	 }	  
	  
	  
	  
		
	}
	
	require(TEMPLATE_PATH_INDEX."/content.php");
	
}

function signup(){
	
	$results = array();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		
	}
	else
	{
		home();
		return;
	}
	$error = '';
	$user_name = '';
	$user_contact = '';
	$user_email_address = '';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
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
		
		$users = new Admins;
	    $users->storeFormValues($_POST);
	    $users->insert();
		header("Location:index.php?action=login");
		exit;
		}
		
	  
	}
	require(TEMPLATE_PATH_INDEX."/signup.php");
}

function profile(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
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
			$users = new Admins;
		    $users->storeFormValues($_POST);
		    $users->edit_new();
		}
		else
		{
			
		   $users = new Admins;
		    $users->storeFormValues($_POST);
		    $users->edit_with_image();
		  $users->storeUploadedImage($_FILES['image']);
		}
	   }
	}
	$results = array();
	$results['user'] = Admins::getUsersById((int)$_SESSION['user_id']);
	require(TEMPLATE_PATH_INDEX."/profile.php");
}

function userpass(){
	
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	
	$error = '';
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$results = array();
	    $data = Admins::get_current_password((int)$_SESSION['user_id']);
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
		else
		{
		 $users = new Admins;
		 $users->storeFormValues($_POST);
		 $users->edit_password();
		 
		 header("Location:index.php?action=profile");
		 exit;
		}
		
	}
	
	
	require(TEMPLATE_PATH_INDEX."/password.php");
}

function query(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	
	require(TEMPLATE_PATH_INDEX."/query.php");
}

function listquery(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	
	require(TEMPLATE_PATH_INDEX."/listquery.php");
}

function addcourses(){
	
	$results = array();
	$data = 
	$results['addedcourses'] = Courses::getAddCoursesById((int)$_GET['course_id']);
	if(!empty($results['addedcourses']))
	{
		home();
		return;
	}
	else
	{
	 Courses::addaCourse((int)$_GET['course_id']);
	 home();
	 return;
	}
}

function yourcourses(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	
	$results = array();
	$data = Courses::getLimitedCourses(8);
	$data2 = Courses::listYourCourses();
	$data3 = Courses::getYourCoursesPagination();
	$results['recent_courses'] = $data['results'];
	$results['your_courses'] = $data2['results'];
	$results['page'] = $data3['page'];
	$results['prev'] = $data3['prev'];
	$results['next'] = $data3['next'];
	$results['totalpages'] = $data3['totalPages'];
	require(TEMPLATE_PATH_INDEX."/yourcourses.php");
}


//Users--------------------------



//Login
function login(){
	
	
	
	$results = array();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		
	}
	else
	{
		home();
		return;
	}
	$error = '';
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$users = new Admins;
		$users->storeFormValues($_POST);
		$userinfo = $users->login();
		if($userinfo['exists'] > 0)
		{
		   if($userinfo['ban'] == 0)
		  {
			if(password_verify($_POST['user_password'],$userinfo['pass']))
			{
				$_SESSION["loggedin"] = true;
				$_SESSION["user_id"] = $userinfo["id"];
				home();
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
	require(TEMPLATE_PATH_INDEX."/login.php");
}

//Logout
function logout(){
	
	




  $_SESSION = array();
   session_destroy();

 home();
 exit;

}

?>