<?php include 'header_main.php'; ?>
    <!-- END header -->

    <section class="site-hero1 site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-color:royalblue">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
          <div class="col-md-7 text-center">
  
            <div class="element-animate1">
              <h1 class="mb-2 text-white">Courses</h1>
              
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6 col-lg-8 order-md-2">
            <div class="row">
			<?php 
			
			if(empty($results['your_courses']))
			{
				echo "<h3>No Courses</h3>";
			}
			foreach($results['your_courses'] as $your_courses)
			{
              echo"<div class='col-md-12 col-lg-6 mb-5'>
                <div class='block-19'>
                  <figure>
                    <a href='.?action=yourlessons&course_id=$your_courses->course_id'><img src='Profilepics/Courses/fullsize/$your_courses->course_id$your_courses->course_image' alt='Image' class='img-fluid'></a>
                  </figure>
                    <div class='text'>
                      <h2 class='heading'><a href='.?action=yourlessons&course_id=$your_courses->course_id'>$your_courses->course_code</a></h2>
                      <a href='.?action=yourlessons&course_id=$your_courses->course_id' style='color:#80878a; font-size: 15px;'>$your_courses->course_name</a></h2>
                      <p class='mb-4'>$your_courses->course_summary</p>
                      <div class='meta d-flex align-items-center'>
                        <div class='number'>
                          <span>$your_courses->course_language</span>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                
              </div>";
			  
			}
			  
			  ?>
              
              
            
              
              

              

            </div>

            <div class="row mb-5">
              <div class="col-md-12 text-center">
                <div class="block-27">
                  <ul>
                    <?php
                    
					
		        if($results['page'] == 1)
		       {
			     echo"";
		       }
		        else
		        {
			     echo"<li><a href='.?action=yourcourses&page=$results[prev]'>&lt;</a></li>";
                
				}
				for($pageNumbers=1;$pageNumbers<=$results['totalpages'];$pageNumbers++) :
		      echo"
				    <li><a href='.?action=yourcourses&page=$pageNumbers'>$pageNumbers</a></li>&nbsp;";
					endfor;
					
                echo"<li><a href='.?action=yourcourses&page=$results[next]'>&gt;</a></li>";
					?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- END content -->
          <div class="col-md-6 col-lg-4 order-md-1">

            <div class="block-24 mb-5">
              <h3 class="heading">Categories</h3>
              <ul>
                <li><a href="#">Laravel <span>10</span></a></li>
                <li><a href="#">PHP <span>43</span></a></li>
                <li><a href="#">JavaScript <span>21</span></a></li>
                <li><a href="#">Python <span>65</span></a></li>
                <li><a href="#">iOS <span>34</span></a></li>
                <li><a href="#">Android <span>45</span></a></li>
                <li><a href="#">Swift <span>22</span></a></li>
              </ul>
            </div>

            <div class="block-25 mb-5">
              <div class="heading">Recent Courses</div>
              <ul>
                <?php
			  foreach($results['recent_courses'] as $recent_courses)
			  {
			  echo"
                <li>
                  <a href='.?action=lessons&course_id=$recent_courses->course_id' class='d-flex'>
                    <figure class='image mr-3'>
                      <img src='Profilepics/Courses/fullsize/$recent_courses->course_id$recent_courses->course_image' alt='' class='img-fluid'>
                    </figure>
                    <div class='text'>
                      <h3 class='heading'>$recent_courses->course_code</h3>";
					if(empty($recent_courses->course_price))
					{						
                      echo"<span class='meta'>Free</span>";
					}
					else
					{
						echo"<span class='meta'>Rs.$recent_courses->course_price</span>";
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
                <li><a href="#">code</a></li>
                <li><a href="#">design</a></li>
                <li><a href="#">typography</a></li>
                <li><a href="#">development</a></li>
                <li><a href="#">creative</a></li>
                <li><a href="#">codehack</a></li>
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
            <h2 class="heading">Create cool websites</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi accusantium optio und.</p>
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