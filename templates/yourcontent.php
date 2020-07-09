<?php include 'header_main.php'; ?>
    <!-- END header -->


    <section class="site-hero1 site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-color:royalblue">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
          <div class="col-md-7 text-center">
  
            <div class="element-animate1">
              <h1 class="mb-2 text-white">Your Courses</h1>
              
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <div class="site-section bg-light">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-6 col-lg-8 order-md-1 pl-lg-5">
            <div class="row block-24">
              <div class="col-md-12 col-lg-12 mb-5">

                  <h1 class="heading">Lesson <?php echo $results['lessons']->lesson_no; ?></h1>
                   
                  <iframe width="650" height="400" src="<?php echo $results['lessons']->lesson_vid_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 
                  <p><?php echo $results['lessons']->lesson_content; ?></p>
                  
                  


                  

              </div>
            </div>

            
          </div>
          <!-- END content -->
          <div class="col-md-6 col-lg-4 order-md-2">

            <div class="block-24 mb-5">
              <h3 class="heading">Other Lesson</h3>
              <ul>
			  
			  <?php
			  
			  
			  for($pageNumbers=1;$pageNumbers<=$results['totalpages'];$pageNumbers++) :
		echo'
                <li><a href=".?action=yourcontent&course_id='.$_GET['course_id'].'&lesson_id='.$results['paginations'][$pageNumbers-1]->lesson_id.'">Lesson '.$pageNumbers.'</a></li>';
				endfor;
				?>
     
              </ul>
            </div>

            <div class="block-25 mb-5">
              <div class="heading">Recent Courses</div>
              <ul>
                <?php
			  foreach($results['courses'] as $courses)
			  {
			  echo"
                <li>
                  <a href='.?action=lessons&course_id=$courses->course_id' class='d-flex'>
                    <figure class='image mr-3'>
                      <img src='Profilepics/Courses/fullsize/$courses->course_id$courses->course_image' alt='' class='img-fluid'>
                    </figure>
                    <div class='text'>
                      <h3 class='heading'>$courses->course_code</h3>";
					 if(empty($courses->course_price))
                     {						 
                      echo"<span class='meta'>Free</span>";
					 }
					 else
					 {
						 echo"<span class='meta'>Rs.$courses->course_price</span>";
					 }
                echo"</div>
                  </a>
                </li>";
			  }
				?>
              </ul>
            </div>

            <div class="block-26">
              <h3 class="heading">Tags</h3>
              <ul>
			  <?php
			  
			  $tags = explode(",",$results['lessons']->course_tags);
		  foreach($tags as $tag)
		  {
		      echo"<li><a href='#'>$tag</a></li>";
		  }
		  ?>
              
                
              </ul>
            </div>


          </div>
          <!-- END Sidebar -->
        </div>
      </div>
    </div>

    
    
    <div class="py-5 block-22">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-4 mb-md-0 pr-md-5">
            <h2 class="heading">Subscribe For Mail</h2>
           
          </div>
          <div class="col-md-6">
            <form action="#" class="subscribe">
              <div class="form-group">
                <input type="email" class="form-control email" placeholder="Enter email">
                <input type="submit" class="btn btn-primary submit" value="Subscribe">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>







      <!-- Footer --->
<?php include 'footer_main.php'; ?>