<?php include 'header_main.php'; ?>
    <!-- END header -->

    <section class="site-sectionn" style="background-image: url(images/signup.jpg); background-repeat: no-repeat;
            background-attachment:scroll;
      background-position: center center; background-size:cover;">
	  
	  
      <div class="container">
	  
	 
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="form-wrap">
			
              <h2 class="mb-5"><i style="font-size:30px" class="fa">&#xf02d;</i> &nbsp; Login with your account</h2>
              <form method="post">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">Email Address</label>
                    <input type="text" id="name" class="form-control py-2" name="user_email_address">
                  </div>
                </div>
                <div class="row	">
                  <div class="col-md-12 form-group">
                    <label for="name">Password</label>
                    <input type="password" id="name" class="form-control py-2" name="user_password">
                  </div>
                </div>
               <p><?php echo $error; ?></p>
          
                <div class="row">
                  <div class="col-md-6 form-group float-md-left ">
                    <input type="submit" name="submit" value="Login" class="btn btn-primary px-4 py-2"> 
                 
                  </div>
				    <div class="col-md-6 form-group float-md-center ">
                   <a class="btn btn-primary px-3 py-2" href="index.php?action=signup" role="button">SignUp</a>
                  </div>
                </div>
				 
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
   <!-- Footer --->
 <?php include 'footer_main.php'; ?>