<?php include 'header_main.php'; ?>
<div class="container mt-5" style="border:1px solid black;">
    <div class="row p-5 mt-5">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice Order # <?php echo $results['invoice']->purchase_id; ?></h2>
    		</div>
    		<hr>
    		
    			<div>
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $results['invoice']->user_name; ?><br>
						<?php echo $results['invoice']->user_email_address; ?>
    					
    				</address>
    			</div>
    			
    		
    		
    			
    			<div>
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $results['invoice']->purchase_at; ?><br><br>
    				</address>
    			</div>
    		
    	</div>
    </div>
    
    <div class="row p-5">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td><?php echo $results['invoice']->course_name; ?></td>
    								<td class="text-center"><?php echo $results['invoice']->purchase_amount; ?></td>
    								
    								<td class="text-right"><?php echo $results['invoice']->purchase_amount; ?></td>
    							</tr>
                                
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<br>
<?php include 'footer_main.php'; ?>