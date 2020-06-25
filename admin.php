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
  
  case 'addadmins':
  addadmins();
  break;
  
  case 'editusers':
  editusers();
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

function dashboard(){
	
	if(isset($_SESSION["loggedin"]))
	{
		echo "Hey";
	}
	require(TEMPLATE_PATH."/index.php");
	
}

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
		elseif($vpcode !== "deletethiscourse")
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

//Lessons

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
		elseif($vpcode !== "deletethislesson")
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

//Users

function addadmins(){
	
	if(isset($_POST['submit']))
	{
		$admins = new Admins;
		$admins->storeFormValues($_POST);
		$admins->insert();
		viewadmins();
		return;
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
	
	if(isset($_POST['submit']))
	{
		$users = new Admins;
		$users->storeFormValues($_POST);
		$users->edit();
	}
	
	$results['users'] = Admins::getUsersById((int)($_GET['user_id']));
	require(TEMPLATE_PATH."/editusers.php");
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

function login(){
	
	$error = '';
	
	if(isset($_POST['login']))
	{
		
		
			$_SESSION["loggedin"] = true;
			dashboard();
		    return;
		
	}
	require(TEMPLATE_PATH."/login.php");
}

function logout(){
	
	




  $_SESSION = array();
   session_destroy();

 login();
 exit;

}

?>