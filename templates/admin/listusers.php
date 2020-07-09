<?php include 'header.php'; ?>
 
                    <div class="container-fluid">
                        <h1 class="mt-4">Users</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                User List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
											    <th>User ID</th>
                                                <th>User Name</th>
                                                <th>User Contact</th>
                                                <th>User Email</th>
                                                <th>Ban/Unban</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
											    <th>User ID</th>
                                                <th>User Name</th>
                                                <th>User Contact</th>
                                                <th>User Email</th>
                                                <th>Ban/Unban</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php 
										
										foreach($results['users'] as $users)
										{
										echo"
                                            <tr>
											    <td>$users->user_id</td>
                                                <td>$users->user_name</td>
                                                <td>$users->user_contact</td>
                                                <td>$users->user_email_address</td>";
												if($users->user_ban == 0)
												{
                                                 echo"<td><a class='btn btn-primary' href='admin.php?action=banusers&user_id=$users->user_id'/>Ban</a></td>";
												}
												else
												{
													echo"<td><a class='btn btn-primary' href='admin.php?action=banusers&user_id=$users->user_id'/>Unban</a></td>";
												}
												echo"
                                                <td><a class='btn btn-primary' href='admin.php?action=editusers&user_id=$users->user_id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deleteusers&user_id=$users->user_id'/>Delete</a></td>
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