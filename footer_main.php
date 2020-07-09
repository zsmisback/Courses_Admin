<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
          <h3 class="heading">University</h3>
          <p class="headd mb-5">Perferendis eum illum voluptatibus dolore tempora consequatur minus asperiores temporibus.</p>
    
        </div>
        <div class="col-md-6 col-lg-2 mb-5 mb-lg-0">
          <h3 class="heading">Quick Link</h3>
          <div class="row">
            <div class="col-md-12">
              <ul class="list-unstyled">
			  <?php
                
			if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
			{				
		echo  "<li><a href='index.php?action=home'>Home</a></li>";
                //<li><a href='about.html'>About Us</a></li>
            echo"<li><a href='courses.html'>Courses</a></li>
              
                <li><a href='index.php?action=login'>Login</a></li>
                <li><a href='index.php?action=signup'>SignUp</a></li>";
                /*<li><a href='#'>CheckValidate
                  <br>Certificate</li>*/
				echo"<li><a href='admin.php'>Admin</li>";
			}
			else
			{
				echo"<li><a href='index.php?action=home'>Home</a></li>
                    <li><a href='index.php?action=yourcourses'>YourCourses</a></li>
					<li><a href='index.php?action=yourpurchases'>YourPurchases</a></li>";
                    //<li><a href='index.php?action=query'>Support</a></li>
                echo"<li><a href='index.php?action=logout'>Logout</a></li>";
                    /*<li><a href='index.php?action=profile'>Profile</a></li>
                    <li><a href='index.php?action=courses'>Explore</a></li>
                    <li><a href='#'>Certificate</a></li>

                    <li><a href='#'>CheckValidate
                      <br>Certificate</li>*/
				echo"<li><a href='admin.php'>Dashboard</li>
					  ";
			}
				?>
    
         
              </ul>
            </div>
           
          </div>
        </div>

        <div class="col-md-8 col-lg-4 mb-5 mb-lg-0">
          <h3 class="heading">Contact Information</h3>
          <div class="block-23">
            <ul>
              <li><span class="icon ion-android-pin"></span><span class="headnd">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
              <li><a href="#"><span class="icon ion-ios-telephone"></span><span class="headnd">+2 392 3929 210</span></a>
      </li>
              <li><a href="#"><span class="icon ion-android-mail"></span><span class="headnd">info@yourdomain.com</span></a></li>
              <li><span class="icon ion-android-time"></span><span class="headnd">Monday &mdash; Friday 8:00am - 5:00pm</span></li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-4 col-lg-2 mb-5 mb-lg-0">
          <h3 class="heading">Social Links</h3>
          <p class="float-md-left">
                  <a href="#" class="fa fa-facebook p-2"></a>
                  <a href="#" class="fa fa-twitter p-2"></a>
                  <a href="#" class="fa fa-linkedin p-2"></a>
                  <a href="#" class="fa fa-instagram p-2"></a>
    
                </p>
        </div>


       
      </div>
  
  
  
      <div class="row pt-5">
        <div class="col-md-12 text-center copyright">
          
          <p class="float-md-center headd"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | MUNSHIJI</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- END footer -->
  
  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
  <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en',layout:google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  
  <script src="js/jquery.magnific-popup.min.js"></script>

  <script src="js/main.js"></script>
</body>
</html>