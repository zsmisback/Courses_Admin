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
  
  case 'about':
  about();
  break;
  
  case 'abouttheteam':
  abouttheteam();
  break;
  
  case 'terms':
  terms();
  break;
  
  case 'privacy':
  privacy();
  break;
  
  case 'payment':
  payment();
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
  
  case 'yourlessons':
  yourlessons();
  break;
  
  case 'yourpurchases':
  yourpurchases();
  break;
  
  case 'invoice':
  invoice();
  break;
  
  case 'yourcontent':
  yourcontent();
  break;
  
  case 'blogs':
  blogs();
  break;
  
  case 'blogcontent':
  blogcontent();
  break;
  
  case 'support':
  support();
  break;
  
  case 'successpayment':
  successpayment();
  break;
  
  case 'failurepayment':
  failurepayment();
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
	$data2 = Courses::getAllCourseLanguages();
	$results['courses'] = $data['results'];
	$results['languages'] = $data2['results'];
	if(!isset($_SESSION['user_id']))
	{
	}
	else
	{
	$results['users'] = Admins::getUsersById((int)$_SESSION['user_id']);
	}
	


    
	require(TEMPLATE_PATH_INDEX."/home.php");
	
}

function about(){
	
	require(TEMPLATE_PATH_INDEX."/about.php");

}

function abouttheteam(){
	
	require(TEMPLATE_PATH_INDEX."/abouttheteam.php");
}

function terms(){
	
	require(TEMPLATE_PATH_INDEX."/terms.php");

}

function privacy(){
	
	require(TEMPLATE_PATH_INDEX."/privacy.php");

}

function payment(){
	
	require(TEMPLATE_PATH_INDEX."/payment_gateway.php");
}

function blogs(){
	
	
	$results = array();
	$data = Blogs::getLimitedBlogs();
	$data2 = Blogs::getPagination();
	$results['totalRows'] = $data2['totalRows'];
	$results['page'] = $data2['page'];
	$results['prev'] = $data2['prev'];
	$results['next'] = $data2['next'];
	$results['blogs'] = $data['results'];
	require(TEMPLATE_PATH_INDEX."/blogs.php");
}

function blogcontent(){
	
	if(!isset($_GET['id']) || !$_GET['id'])
	{
		home();
		return;
	}
	
	$data3 = Comments::getCommentsInBlogs((int)$_GET['id']);
	$results = array();
	$results['blogs'] = Blogs::getBlogsById((int)$_GET['id']);
	$tags = explode(",",$results['blogs']->tags);
	
	
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
		header("Location:?action=blogcontent&id=$_GET[id]");
		exit;
	  }
	  
		  
	 }	  
	  
	  
	  
		
	}
	require(TEMPLATE_PATH_INDEX."/blogscontent.php");
}

function courses(){
	
	$results = array();
	$data = Courses::getLimitedCourses();
	$data2 = Courses::getPagination();
	$data3 = Courses::getLimitedCourses(8);
	$data4 = Courses::getAllCourseLanguages();
	$results['languages'] = $data4['results'];
	if(isset($_GET['tags']) || isset($_GET['language']))
	{
		if($_GET['language'] == 'language' || empty($_GET['tags']))
		{
			header("Location:index.php");
			exit;
		}
		
		$data4 = Courses::getAllCoursesBySpecifics($_GET['tags'],$_GET['language']);
		$data5 = Courses::getSearchPagination($_GET['tags'],$_GET['language']);
		$results['search_courses'] = $data4['results'];
		$results['page'] = $data5['page'];
	    $results['prev'] = $data5['prev'];
	    $results['next'] = $data5['next'];
	    $results['totalpages'] = $data5['totalPages'];
		$results['totalRows'] = $data5['totalRows'];
		
	}
	$results['courses'] = $data['results'];
	$results['page'] = $data2['page'];
	$results['prev'] = $data2['prev'];
	$results['next'] = $data2['next'];
	$results['totalpages'] = $data2['totalPages'];
	$results['totalRows'] = $data2['totalRows'];
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
	if(!isset($_SESSION['user_id']))
	{
	}
	else
	{
		$data = Orders::checkOrderByIdStatic($_SESSION['user_id'],$_GET['course_id']);
		$results['users'] = Admins::getUsersById((int)$_SESSION['user_id']);
		$results['owned'] = $data['totalRows'];
	}
	
/*$MERCHANT_KEY = "2Rap5UWr";
$SALT = "CxLo29EGTk";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();

if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}*/
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
	if($results['lessons']->lesson_status == 1)
	{
		home();
		return;
	}
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
	    $userinfo = $users->login();
		if($userinfo['exists'] > 0)
		{
			$error = "This Email Address Already Exist";
		}
		else
		{
			 $users->insert();
			 $content = "<html><body><img src='http://munshiji.org/images/logo.png' width='200px;' />
							<p>Hello, </p>
							<p>Thank you for joining <a href='http://munshiji.org/index.php?action=home'>Munshiji.org</a>. We've put alot of effort into it and hope that you'll like it!</p>
							<p>You're now one step closer to becoming a munshi, <a href='http://munshiji.org/index.php?action=login'>click here</a> to login and dive in to our courses and services available just for you.</p>
							<p>Let us know if we can help you further,</p>
							<p>If you liked our concept, why not share it on <a href='https://www.facebook.com/brijmohan.sharma.9400'>facebook.</a> I'm sure they would appreciate it.</p>
							</body></html>";
							$title = "Welcome";
			sendEmail(1,$_POST['user_email_address'],$content,$title);				
		    header("Location:index.php?action=login");
		     exit;
		}

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
	 $content = "<html><body><img src='http://munshiji.org/images/logo.png' width='200px;' />
	 <p>Thank you for adding our course. You can view and enjoy your course by <a href='http://munshiji.org/index.php?action=yourcourses'>clicking here</a>. Thank you for being a part of munshiji.</p></body></html>";
	 $results['user_email_address'] = Admins::getUsersById($_SESSION['user_id']);
	 $title = "Thank you for adding our course";
	 sendEmail(2,$results['user_email_address']->user_email_address,$content,$title);
	 successfree();
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
	//$data2 = Courses::listYourCourses();
	$data2 = Courses::listYourPaidCourses((int)$_SESSION['user_id']);
	$data3 = Courses::getYourCoursesPagination();
	$results['recent_courses'] = $data['results'];
	//$results['your_courses'] = $data2['results'];
	$results['your_courses'] = $data2['results'];
	$results['page'] = $data3['page'];
	$results['prev'] = $data3['prev'];
	$results['next'] = $data3['next'];
	$results['totalpages'] = $data3['totalPages'];
	$results['totalRows'] = $data3['totalRows'];
	require(TEMPLATE_PATH_INDEX."/yourcourses.php");
}

function yourpurchases(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	
	$results = array();
	$data = Orders::getUsersOrders((int)$_SESSION['user_id']);
	$results['orders'] = $data['results'];
	require(TEMPLATE_PATH_INDEX."/yourpurchases.php");
}

function invoice(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	if(!isset($_GET['purchase_id']) || !$_GET['purchase_id'])
	{
		yourpurchases();
		return;
	}
	$results = array();
	$results['invoice'] = Orders::getInvoice((int)$_GET['purchase_id']);
	require(TEMPLATE_PATH_INDEX."/invoice.php");
}

function yourlessons(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	
	$results = array();
	$data = Lessons::getLessonsByCourseId((int)$_GET['course_id']);
	$data2 = Courses::getLimitedCourses(8);
	$data3 = Courses::getLimitedCourses();
	$results['checkowner'] = Courses::checkOwnedCourse((int)$_GET['course_id']);
	if(empty($results['checkowner']))
	{
		home();
		return;
	}
	$results['courses'] = Courses::getCoursesById((int)$_GET['course_id']);
	$results['courses_continue'] = Courses::getCoursesById2((int)$_GET['course_id']);
	$results['lessons'] = $data['results'];
	$results['lessons_continue'] = $data['results_cont'];
	$results['recent_courses'] = $data2['results'];
	$results['recommended_courses'] = $data3['results'];
	
	require(TEMPLATE_PATH_INDEX."/yourlessons.php");
}

function yourcontent(){
	
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
	{
		home();
		return;
	}
	elseif(!isset($_GET['lesson_id']) || !$_GET['lesson_id'])
	{
		home();
		return;
	}
	$results = array();
	$data = Courses::getLimitedCourses(8);
	$data2 = Lessons::getPaidPagination((int)$_GET['course_id']);
	$data3 = Comments::getCommentsInLessons((int)$_GET['lesson_id']);
	$results['checkowner'] = Courses::checkOwnedCourse((int)$_GET['course_id']);
	if(empty($results['checkowner']))
	{
		home();
		return;
	}
	$results['courses'] = $data['results'];
	$results['lessons'] = Lessons::getLessonsById((int)$_GET['lesson_id']);
	$results['totalpages'] = $data2['totalPages'];
	$results['paginations'] = $data2['results'];
	
	
	require(TEMPLATE_PATH_INDEX."/yourcontent.php");
}

function support(){
	
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
		$support = new Support;
		$support->storeFormValues($_POST);
		$support->insert();
		}
		
	}
	
	require(TEMPLATE_PATH_INDEX."/support.php");
}

function successpayment(){
	
	require(TEMPLATE_PATH_INDEX."/success.php");
}

function successfree(){
	
	require(TEMPLATE_PATH_INDEX."/successfree.php");
}

function failurepayment(){
	
	require(TEMPLATE_PATH_INDEX."/failure.php");
}

//Users--------------------------

function sendEmail($flag,$to,$content,$title){
		
		$headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <coolzsm36@gmail.com>';
	  //$to = $this->email;
	  switch ($flag){
		  case 1:
		  $msg = $content;
		  break;
		  case 2:
		  $msg = $content;
		  break;
	  }
	  
	  mail($to,$title,$msg,$headers);
	  
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