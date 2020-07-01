<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Add Admins</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add an admin</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						<p class='error'><?php echo $error; ?></p>
						<input type="hidden" name="user_lvl" value="1"/>
						
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_names">Admin Name:</label>
                                                        <input class="form-control py-4" id="user_names" type="text" placeholder="Admin Name" name="user_name" value="<?php echo $user_name; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_contacts">Admin Contact No:</label>
                                                        <input class="form-control py-4" id="user_contacts" type="number" placeholder="Admin Contact No" name="user_contact" value="<?php echo $user_contact; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
											<label for="user_email_addresss">Admin Email Address:</label>
											<input class="form-control py-4" id="user_email_addresss" type="email" placeholder="Admin Email Address" name="user_email_address" value="<?php echo $user_email_address; ?>"/>
											<br>
											<label for="user_passwords">Admin Password:</label>
											<input class="form-control py-4" id="user_passwords" type="password" placeholder="Admin Password" name="user_password"/>
											<br>
											<label for="re_passs">Re-enter the password:</label>
											<input class="form-control py-4" id="re_passs" type="password" placeholder="Re-enter the password" name="re_pass"/>
											<br>
											<label for="vpcodes">Enter the Vpcode:</label>
											<input class="form-control py-4" id="vpcodes" type="password" placeholder="Enter the vpcode" name="admin_add_vpcode"/>
											<br>
											
											
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>