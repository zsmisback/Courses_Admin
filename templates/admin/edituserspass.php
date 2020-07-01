<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Edit User/Admin </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit a User/Admins Data</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						<p class='error'><?php echo $error; ?></p>
						<input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>"/>
						
                                            
                                                    <div class="form-group">
                                                        <label for="curr_passs">User/Admin Current Password:</label>
                                                        <input class="form-control py-4" id="curr_passs" type="password" placeholder="User/Admin Current Password" name="curr_pass"/>
                                                    </div>
                                                
                                                
                                                    <div class="form-group">
                                                        <label for="user_passwords">User/Admin New Password:</label>
                                                        <input class="form-control py-4" id="user_passwords" type="password" placeholder="User/Admin New Password" name="user_password"/>
                                                    </div>
                                                
                                            
											<label for="re_passs">Re-enter the new password:</label>
											<input class="form-control py-4" id="re_passs" type="password" placeholder="Re-enter the new password" name="re_pass"/>
											<br>
											<label for="vpcodes">Enter the Vpcode:</label>
											<input class="form-control py-4" id="vpcodes" type="password" placeholder="Enter the vpcode" name="vpcode"/>
											<br>
											
											<div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button>
											</div>
											
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>