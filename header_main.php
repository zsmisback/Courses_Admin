
<!doctype html>
<html lang="en">
  <head>
    <title>Free Education Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand absolute" href="index.php?action=home">University</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <?php
		
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{		
     echo"<div class='collapse navbar-collapse navbar-light' id='navbarsExample05'>
            <ul class='navbar-nav ml-auto'>
              <li class='nav-item'>
                <a class='nav-link active' href='index.php?action=home'>Home</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link active' href='index.php?action=courses'>Courses</a>
              </li>
			    <li class='nav-item'>
                <a class='nav-link' href='index.php?action=login'>Login</a>
              </li>
			    <li class='nav-item'>
                <a class='nav-link' href='index.php?action=signup'>SignUp</a>
              </li>
			    <li class='nav-item'>
                <a class='nav-link' href='about.html'>About</a>
              </li>
			    <li class='nav-item'>
                <a class='nav-link' href='contact.html'>Contact</a>
              </li>
			  
              
            </ul>
           
            
          </div>";
	}
	else
	{
		echo"<div class='collapse navbar-collapse navbar-light' id='navbarsExample05'>
            <ul class='navbar-nav ml-auto'>
              <li class='nav-item'>
                <a class='nav-link active' href='index.php?action=home'>Home</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link active' href='index.php?action=yourcourses'>YourCourses</a>
              </li>
              <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='dropdown05' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Support</a>
                <div class='dropdown-menu' aria-labelledby='dropdown05'>
                  <a class='dropdown-item' href='index.php?action=query'>Place a query</a>
                  <a class='dropdown-item' href='index.php?action=listquery'>List of query</a>
                  <a class='dropdown-item' href='#'>Unique Code to speak on Phone
                </a>
                 
                </div>

              </li>";
			  
             $exists = array();
			 $data = Admins::checkIfAdmin();
			 $exists['admin'] = $data['exists'];
			 if($exists['admin'] > 0)
			 {
				 
			 }
             else
             {				 
              echo"<li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='dropdown05' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Profile</a>
                <div class='dropdown-menu' aria-labelledby='dropdown05'>
                  <a class='dropdown-item' href='index.php?action=profile'>View Profile</a>
                  <a class='dropdown-item' href='index.php?action=logout'>Logout
                </a>
                 
                </div>

              </li>";
			 }
			 
            echo"<li class='nav-item'>
                <a class='nav-link' href='index.php?action=courses'>Explore</a>
              </li>

              <li class='nav-item'>
                <a class='nav-link active' href='certificate.html'>Certificate</a>
              </li>
			   
            
			    <li class='nav-item'>
                <a class='nav-link' href='notification.html'>Notification</a>
              </li>
			  
              
            </ul>
           
            
          </div>";
	}
		  
		  ?>
        </div>
      </nav>
    </header>
	<div id="google_translate_element"></div>