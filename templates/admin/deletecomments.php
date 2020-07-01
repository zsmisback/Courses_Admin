<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Delete Users/Admins</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Delete Users/Admin</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
										<input type='hidden' name='comment_id' value='<?php echo $_GET['comment_id']; ?>' />
										
										<input class='form-control' type='password' name='vpcode' placeholder='Please enter your vpcode'/>
										
										<div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>