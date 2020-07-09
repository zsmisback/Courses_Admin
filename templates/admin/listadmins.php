<?php include 'header.php'; ?>
 
                    <div class="container-fluid">
                        <h1 class="mt-4">Admins</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Admin List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
											    <th>Admin ID</th>
                                                <th>Admin Name</th>
                                                <th>Admin Contact</th>
                                                <th>Admin Email</th>
                                                <th>Ban/Unban</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
											    <th>Admin ID</th>
                                                <th>Admin Name</th>
                                                <th>Admin Contact</th>
                                                <th>Admin Email</th>
                                                <th>Ban/Unban</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php 
										
										foreach($results['admins'] as $admins)
										{
										echo"
                                            <tr>
											    <td>$admins->user_id</td>
                                                <td>$admins->user_name</td>
                                                <td>$admins->user_contact</td>
                                                <td>$admins->user_email_address</td>";
												if($admins->user_ban == 0)
												{
                                                 echo"<td><a class='btn btn-primary' href='admin.php?action=banusers&user_id=$admins->user_id'/>Ban</a></td>";
												}
												else
												{
													echo"<td><a class='btn btn-primary' href='admin.php?action=banusers&user_id=$admins->user_id'/>Unban</a></td>";
												}
												echo"
                                                <td><a class='btn btn-primary' href='admin.php?action=editusers&user_id=$admins->user_id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deleteusers&user_id=$admins->user_id'/>Delete</a></td>
                                            </tr>";
										}
											?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
<?php include 'footer.php'; ?>	