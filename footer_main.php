<footer class="site-footer" style='background-color:#1a1a1a;'>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
          <h3 class="heading" style='color:#999999;'>MUNSHIJI</h3>
          <p class="headd mb-5" style="color:white;">Empowering the youth to work and on their skills, upgrade themselves and make the world a better place to live in</p>
    
        </div>
        <div class="col-md-6 col-lg-2 mb-5 mb-lg-0">
          <h3 class="heading" style='color:#999999;'>Quick Links</h3>
          <div class="row">
            <div class="col-md-12">
              <ul class="list-unstyled">
			  <?php
                
			if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
			{				
		echo  "<li class='mb-3'><a href='index.php?action=home' style='color:white;' class='quick'>Home</a></li>";
                
            echo"<li class='mb-3'><a href='index.php?action=courses' style='color:white;' class='quick'>Courses</a></li>
              
                <li class='mb-3'><a href='index.php?action=login' style='color:white;' class='quick'>Login</a></li>
                <li class='mb-3'><a href='index.php?action=signup' style='color:white;' class='quick'>SignUp</a></li>";
                /*<li><a href='#'>CheckValidate
                  <br>Certificate</li>*/
				echo"<li class='mb-3'><a href='admin.php' style='color:white;' class='quick'>Admin</li>";
			}
			else
			{
				echo"<li class='mb-3'><a href='index.php?action=home' style='color:white;' class='quick'>Home</a></li>
                    <li class='mb-3'><a href='index.php?action=yourcourses' style='color:white;' class='quick'>YourCourses</a></li>
					<li class='mb-3'><a href='index.php?action=yourpurchases' style='color:white;' class='quick'>YourPurchases</a></li>";
                    //<li><a href='index.php?action=query'>Support</a></li>
                echo"<li class='mb-3'><a href='index.php?action=logout' style='color:white;' class='quick'>Logout</a></li>";
                    /*<li><a href='index.php?action=profile'>Profile</a></li>
                    <li><a href='index.php?action=courses'>Explore</a></li>
                    <li><a href='#'>Certificate</a></li>

                    <li><a href='#'>CheckValidate
                      <br>Certificate</li>*/
				echo"<li class='mb-3'><a href='admin.php' style='color:white;' class='quick'>Dashboard</li>
					  ";
			}
				?>
    
                <li class='mb-3'><a href='?action=terms' style='color:white;' class='quick'>Terms & Conditions</a></li>
				<li class='mb-3'><a href='?action=privacy' style='color:white;' class='quick'>Privacy Policy</a></li>
              </ul>
            </div>
           
          </div>
        </div>

        <div class="col-md-8 col-lg-4 mb-5 mb-lg-0">
          <h3 class="heading" style='color:#999999;'>Contact Information</h3>
          <div class="block-23">
            <ul>
              <li><span class="icon ion-android-pin" style='color:#999999;'></span><span class="headnd" style='color:white;'>BMS Talent Management PVT LTD.A 2905 Vishnu Shivan Towers,Dattani Park,Thakur Village Kandivali East,Mumbai - 400101</span></li>
              <li><a href="#"><span class="icon ion-ios-telephone" style='color:#999999;'></span><span class="headnd" style='color:white;'>+91-98197 28197</span></a>
      </li>
              <li><a href="#"><span class="icon ion-android-mail" style='color:#999999;'></span><span class="headnd" style='color:white;'>bms4munshiji@gmail.com</span></a></li>
            <!--  <li><span class="icon ion-android-time"></span><span class="headnd">Monday &mdash; Friday 8:00am - 5:00pm</span></li> -->
            </ul>
          </div>
        </div>
        
        <div class="col-md-4 col-lg-2 mb-5 mb-lg-0">
          <h3 class="heading" style='color:#999999;'>Social Links</h3>
          <p class="float-md-left">
                  <a href="http://www.facebook.com/brijmohan.sharma.9400" class="fa fa-facebook p-2" style='color:white;'></a>
                  <a href="http://www.twitter.com/bms4brijmohan" class="fa fa-twitter p-2" style='color:white;'></a>
                 <!-- <a href="#" class="fa fa-linkedin p-2"></a> -->
                  <a href="http://www.instagram.com/bms.brijmohan/" class="fa fa-instagram p-2" style='color:white;'></a>
    
                </p>
        </div>


       
      </div>
  
  
  
      <div class="row pt-5">
        <div class="col-md-12 text-center copyright">
          
          <p class="float-md-center headd" style='color:white;'><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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