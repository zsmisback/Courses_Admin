<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Add Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add an order</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						<p class='error'><?php echo $error; ?></p>
						
						
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_names">User ID:</label>
                                                        <input class="form-control py-4" id="user_names" type="number" placeholder="User ID" name="user_id" value="<?php echo $user_id; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                     <label for="sel1">Order Type:</label>
                                                      <select class="form-control" id="sel1" name="purchase_type">
                                                       <option value="Cash">Cash</option>
                                                       <option value="Cheque">Cheque</option>
                                                       <option value="Debit/Credit">Debit/Credit</option>
                                                       <option value="NetBanking">NetBanking</option>
													   <option value="Free">Free</option>
                                                       </select>
                                                      </div>
                                                </div>
                                            </div>
											<label for="user_email_addresss">Course ID:</label>
											<input class="form-control py-4" id="user_email_addresss" type="text" placeholder="Enter the Course ID" name="purchase_for" value="<?php echo $purchase_for; ?>"/>
											<br>
											<label for="user_passwords">Order Amount (Leave Empty If Free):</label>
											<input class="form-control py-4" id="user_passwords" type="number" placeholder="Order Amount" name="purchase_amount" value="<?php echo $purchase_amount; ?>"/>
											<br>
						
											<label for="vpcodes">Enter the Vpcode:</label>
											<input class="form-control py-4" id="vpcodes" type="password" placeholder="Enter the vpcode" name="order_add_vpcode"/>
											<br>
											
											
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>