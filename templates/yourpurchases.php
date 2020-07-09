<?php include 'header_main.php'; ?>

<div class="container-fluid" style="margin-top: 50px;">
      <h2 class="text-center pb-5">List Of Purchases</h2>
                 
      <table class="table table-darktable-hover mb-5">
        <thead>
          <tr>
            <th>Course</th>
            
            <th>Amount</th>
            <th>Purchase At</th>
            <th>Transaction ID</th>
            <th>Invoice</th>
          </tr>
        </thead>
        <tbody>
          <?php
		  
		  foreach($results['orders'] as $orders)
		  {
			  echo "<tr>
			        <th>$orders->course_name</th>
					<th>$orders->purchase_amount</th>
					<th>$orders->purchase_at</th>
					<th>$orders->t_id</th>
					<th><a href='index.php?action=invoice&purchase_id=$orders->purchase_id'><button type='btn btn-primary'>Invoice</button></a></th>
			        </tr>";
		  }
		  
		  ?>
          
        </tbody>
      </table>
    </div>	 

<?php include 'footer_main.php'; ?>