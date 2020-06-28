<?php include 'header_main.php'; ?>
    <!-- END header -->


    <section class="site-sectionn" style="background-image: url(images/signup.jpg); background-repeat: no-repeat;
            background-attachment:scroll;
      background-position: center center; background-size:cover;">
	  
	  
      <div class="container">
	  
	 
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="form-wrap">
			
              <h2 class="mb-5"><i class="fa fa-lock" style="font-size:36px"></i> &nbsp; Change Password</h2>
              <form method="post">
                
                <div class="row	">
                  <div class="col-md-12 form-group">
                    <label for="name">Current Password</label>
                    <input type="password" id="name" class="form-control py-2" name="curr_pass">
                  </div>
                </div>
                <div class="row	">
                    <div class="col-md-12 form-group">
                      <label for="name">Type New Password</label>
                      <input type="password" id="name" class="form-control py-2" name="user_password">
                    </div>
                  </div>
                  <div class="row	">
                    <div class="col-md-12 form-group">
                      <label for="name">Re-type New Password</label>
                      <input type="password" id="name" class="form-control py-2" name="re_pass">
                    </div>
                  </div>
               <p><?php echo $error; ?></p>
			   
          
                <div class="row mt-3">
                  <div class="col-md-6 form-group float-md-left ">
				  <input type="submit" name="submit" value="Change Password" class="btn btn-primary px-4 py-2">
                    
                 
            </div>
				   
				 
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  <!-- Footer --->
    <?php include 'footer_main.php'; ?>