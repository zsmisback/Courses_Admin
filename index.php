<?php

require( "config.php" );
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
	$results['courses'] = $data['results'];
	$results['lessons'] = Lessons::getLessonsById((int)$_GET['lesson_id']);
	$results['totalpages'] = $data2['totalPages'];
	$results['paginations'] = $data2['results'];
	
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
		$users = new Admins;
	    $users->storeFormValues($_POST);
	    $users->insert();
		header("Location:index.php?action=login");
		
	  
	}
	require(TEMPLATE_PATH_INDEX."/signup.php");
}

function profile(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
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
		}
		
	}
	
	
	require(TEMPLATE_PATH_INDEX."/password.php");
}
//Courses------------------------------------------------

function addcourses(){
	
	if(!isset($_GET['course_id']) || !$_GET['course_id'])
	{
		home();
		return;
	}
	
	$results = array();
	
	$results['addcourses'] = Courses::getAddCoursesById((int)$_GET['course_id']);
	if(!empty($results['addcourses']))
	{
		echo "No";
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
	
	$error = '';
	if(isset($_POST['submit']))
	{
		$vpcode = $_POST['vpcode'];
		if(empty($vpcode))
		{
			$error = "Please enter the vpcode";
		}
		elseif($vpcode !== 'edittheuser')
		{
			$error = "Invalid vpcode";
		}
		else
		{
		$users = new Admins;
		$users->storeFormValues($_POST);
		$users->edit();
		viewadmins();
		return;
		}
	}
	
	$results['users'] = Admins::getUsersById((int)($_GET['user_id']));
	require(TEMPLATE_PATH."/editusers.php");
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
		elseif($vpcode !== 'bantheuser')
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
		elseif($vpcode !== 'deletetheuser')
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