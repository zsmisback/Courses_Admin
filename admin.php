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
  
  case 'viewcourses':
  viewcourses();
  break;
  
  case 'editcategory':
  editcategory();
  break;
  
  case 'deletecategory';
  deletecategory();
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
	   $courses->insert2();
       $courses->storeUploadedImage($_FILES['image']);

	
	}
	require(TEMPLATE_PATH."/addcourses.php");
}

function editcategory(){
	
	if(!isset($_GET['cat_id']) || !$_GET['cat_id'])
	{
		viewcategory();
		return;
	}
	
	if(isset($_POST['editcat']))
	{
		
		
		if (empty($_FILES['image']['name']))
        {			
		
              $category = new Category;
		      $category->storeFormValues($_POST);
		       $category->editonlytext();
			   viewcategory();
		        return;
		  
	  
	    }
		else
		{
			$category = new Category;
		    $category->storeFormValues($_POST);
		     $category->edit();
			$category->storeUploadedImage($_FILES['image']);
			viewcategory();
		    return;
		}
		
		
	   
		
	}


    $results = array();
	$results['category_info'] = Category::getCategoryById((int)$_GET['cat_id']);
	require(TEMPLATE_PATH."/editcategory.php");
}

function deletecategory(){
	
	if(!isset($_GET['cat_id']) || !$_GET['cat_id'])
	{
		viewcategory();
		return;
	}
	
	if(isset($_POST['deletecat']))
	{
		
			$category = new Category;
			$category->storeFormValues($_POST);
			$category->deletes();
			viewcategory();
		    return;
		
	}
	
	
	require(TEMPLATE_PATH."/deletecategory.php");
}

function viewcourses(){
	
	$results = array();
	$data = Courses::getCoursesList();
	$results['courses'] = $data['results'];


	require(TEMPLATE_PATH."/listcourses.php");
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

  $_SESSION = array();
   session_destroy();

 login();
 exit;

}

?>