<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Edit User/Admin </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit a User/Admins Data</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						<p class='error'><?php echo $error; ?></p>
						<input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>"/>
						
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_names">User/Admin Name:</label>
                                                        <input class="form-control py-4" id="user_names" type="text" placeholder="User/Admin Name" name="user_name" value="<?php echo $results['users']->user_name; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_contacts">User/Admin Contact No:</label>
                                                        <input class="form-control py-4" id="user_contacts" type="text" placeholder="User/Admin Contact No" name="user_contact" value="<?php echo $results['users']->user_contact; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
											<label for="user_email_addresss">User/Admin Email Address:</label>
											<input class="form-control py-4" id="user_email_addresss" type="text" placeholder="User/Admin Email Address" name="user_email_address" value="<?php echo $results['users']->user_email_address; ?>"/>
											<br>
											<label for="user_abouts">User/Admin About Me:</label>
											<input class="form-control py-4" id="user_abouts" type="text" placeholder="User/Admin About Me" name="user_about" value="<?php echo $results['users']->user_about; ?>"/>
											<br>
											Current Image:
											<br>
											<?php
											
											if(empty($results['users']->user_image))
											{
											echo"
											<img src='images/default.jpg' style='width:200px'>";
											}
											else
											{
												echo'<img src="Profilepics/Users/fullsize/'.$results['users']->user_id.$results['users']->user_image.'" style="width:200px">';
											}
											?>
											<br>
											<label for="image">User/Admin Image:</label>
											<input type="file" class="form-control-file" id="image" name="image">
											<br>
											<label for="vpcodes">Enter the Vpcode:</label>
											<input class="form-control py-4" id="vpcodes" type="password" placeholder="Enter the vpcode" name="admin_edit_vpcode"/>
											<br>
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button>
											<a class="btn btn-primary" href="admin.php?action=edituserspass&user_id=<?php echo $_GET['user_id']; ?>" role="button">Change Password</a>
											</div>
											
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>