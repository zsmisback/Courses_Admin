<?php include 'header_main.php'; ?>
    <!-- END header -->
      
      
    <!--profile-->
    <section class="site-sectionn" style="background: url('images/body.jpg'); background-repeat: no-repeat; background-size: cover;">
           <div class="container-fluid">
             <div class="row new4">
               <div class="col-md-3 new2 ">
                <div class="card" style="width: 18rem; ">
				
				<?php
				
				if(empty($results['user']->user_image))
				{
                 echo"<img src='images/default.jpg' class='card-img-top' alt='Card image cap'>";
				}
				else
				{
					echo'<img src="Profilepics/Users/fullsize/'.$results['user']->user_id.$results['user']->user_image.'"class="card-img-top" alt="Card image cap">';
				}
				
				  ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $results['user']->user_name; ?></h5>
                    <p class="card-text"><?php echo $results['user']->user_about; ?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $results['user']->user_contact; ?></li>
                    <li class="list-group-item"><?php echo $results['user']->user_email_address; ?></li>
                    <li class="list-group-item">Course name</li>
                  </ul>
                  
                </div>
               </div>
               

             
               <div class="col-md-9 col-sm-12 new1">
                <div class="new">
                  <h2 class="mb-5"><i class='fa fa-user' style='font-size:36px'></i> &nbsp; Change Profile</h2>
                  <form method="post" enctype="multipart/form-data">
				  <p class="error"><?php echo $error; ?></p>
				  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"/>
                        <div class="row">
                        <div class="col-md-12 form-group">
                          <label for="name">Name</label>
                          <input type="text" id="name" class="form-control py-2" name="user_name" value="<?php echo $results['user']->user_name; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <label for="name">About Me</label>
                          <input type="text" id="name" class="form-control py-2" name="user_about" value="<?php echo $results['user']->user_about; ?>">
                        </div>
                      </div>
               <div class="row">
                        <div class="col-md-12 form-group">
                          <label for="name">Contact</label>
                          <input type="number" id="number" class="form-control py-2" name="user_contact" value="<?php echo $results['user']->user_contact; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <label for="name">Email Address</label>
                          <input type="email" id="Email" class="form-control py-2" name="user_email_address" value="<?php echo $results['user']->user_email_address; ?>">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Profile Picture</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-6 form-group float-md-left">
                          <input type="submit" value="Update Profile" style="background-color:#C03F53;" class="btn btn-primary px-4 py-2">
                        </div>
                        <div class="col-md-6">
                          <a class="btn btn-primary px-4 py-2" style="background-color:#C03F53;" href="index.php?action=userpass" role="button">Change Password</a>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>


               
               </div>
             </div>
    </section>
          
   <!--prfile end-->
      <!-- Footer --->
<?php include 'footer_main.php'; ?>