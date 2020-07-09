 <?php include 'header.php'; ?>
 
                    <div class="container-fluid">
                        <h1 class="mt-4">Orders</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Orders List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>User Id</th>
												<th>User Email Address</th>
                                                <th>Purchase Type</th>
                                                <th>Course Purchased Id</th>
                                                <th>Course Price</th>
												<th>Order Status</th>
												<th>Transaction ID</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>User Id</th>
												<th>User Email Address</th>
                                                <th>Purchase Type</th>
                                                <th>Course Purchased Id</th>
                                                <th>Course Price</th>
												<th>Order Status</th>
												<th>Transaction ID</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php 
										
										foreach($results['orders'] as $orders)
										{
										echo"
                                            <tr>
                                                <td>$orders->user_id</td>
												<td>$orders->user_email_address</td>
                                                <td>$orders->purchase_type</td>
                                                <td>$orders->purchase_for</td>
												<td>$orders->purchase_amount</td>
												<td>$orders->purchase_status</td>
												<td>$orders->t_id</td>
                                                <td><a class='btn btn-primary' href='admin.php?action=editorders&purchase_id=$orders->purchase_id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deleteorders&purchase_id=$orders->purchase_id'/>Delete</a></td>
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