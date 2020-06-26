<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
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
											<label for="user_passwords">User/Admin Password:</label>
											<input class="form-control py-4" id="user_passwords" type="password" placeholder="User/Admin Password" name="user_password"/>
											<br>
											<label for="user_email_addresss">Re-enter the password:</label>
											<input class="form-control py-4" id="inputLastName" type="password" placeholder="Re-enter the password" name="re_pass"/>
											<br>
											<label for="vpcodes">Enter the Vpcode:</label>
											<input class="form-control py-4" id="vpcodes" type="password" placeholder="Enter the vpcode" name="vpcode"/>
											<br>
											<p><?php echo $error; ?></p>
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>