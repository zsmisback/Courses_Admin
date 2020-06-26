<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Add Admins</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add an admin</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						<input type="hidden" name="user_lvl" value="1"/>
						
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Admin Name" name="user_name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Admin Contact No" name="user_contact"/>
                                                    </div>
                                                </div>
                                            </div>
											<input class="form-control py-4" id="inputLastName" type="text" placeholder="Admin Email Address" name="user_email_address"/>
											<br>
											<input class="form-control py-4" id="inputLastName" type="password" placeholder="Admin Password" name="user_password"/>
											<br>
											<input class="form-control py-4" id="inputLastName" type="password" placeholder="Re-enter the password" name="re_pass"/>
											<br>
											
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>