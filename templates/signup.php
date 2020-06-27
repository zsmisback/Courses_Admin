

<?php include 'header_main.php'; ?>
    <!-- END header -->
    
    
    <section class="site-sectionn" style="background-image: url(images/signup.jpg); background-repeat: no-repeat;
            background-attachment:scroll;
      background-position: center center; background-size:cover;">
	  
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="form-wrap">
              <h2 class="mb-5"><i style="font-size:30px" class="fa">&#xf02d;</i> &nbsp; SignUp New Account</h2>
              <form method="post">
			  <input type="hidden" name="user_lvl" value="0"/>
                    <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" class="form-control py-2" name="user_name" value="<?php echo $user_name; ?>">
                    </div>
                  </div>
				   <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Contact</label>
                      <input type="number" id="number" class="form-control py-2" name="user_contact" value="<?php echo $user_contact; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Email Address</label>
                      <input type="email" id="Email" class="form-control py-2" name="user_email_address" value="<?php echo $user_email_address; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Password</label>
                      <input type="password" id="Password" class="form-control py-2 " name="user_password">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12 form-group">
                      <label for="name">Re-type Password</label>
                      <input type="password" id="password" class="form-control py-2" name="re_pass">
                    </div>
                  </div>
				  <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                 <label class="form-check-label" for="inlineFormCheck">
                       I’m in for emails with exciting discounts and personalized recommendations
                  </label>
                   </div>
                  <p><?php echo $error; ?></p>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Register" name="submit" class="btn btn-primary px-5 py-2">
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