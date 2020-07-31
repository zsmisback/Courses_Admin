<?php include 'header_main.php'; ?>
    <!-- END header -->

    <section class="site-hero pb-5"  style="background-image: url(images/body.jpg) !important ;">
      <div class="container-fluid" >
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-inner">
          <div class="col-md-10">
  
            <div class="element-animate">
              <div class="block-17">
               
                <form action="index.php" method="get" class="d-block d-lg-flex mt-5">
				<input type="hidden" name="action" value="courses"/>
                  <div class="fields d-block d-lg-flex">
                    <div class="textfield-search one-third" style="width:50%"><input type="text" name="tags" class="form-control" placeholder="Keyword search..."></div>
                <!--    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Type</option>
                        <option value="">Free</option>
                        <option value="">Paid</option>
                       
                      </select>
                    </div> -->
                    <div class="select-wrap one-third" style="width:50%">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="language" id="" class="form-control">
                        <option value="language">Languages</option>
                        <?php
						foreach($results['languages'] as $languages)
						{
							echo"<option value='$languages->course_language'>$languages->course_language</option>";
						}
						
						?>
                       
                      </select>
                    </div>
                  </div>
                  <input type="submit" class="search-submit btn " value="Search">  
                </form>
               
              
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <div class="site-section1 bg-light" style="background-image: url(images/body.jpg) !important ;">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6 col-lg-8 order-md-2">
            <div class="row">
			<?php
			
			if(isset($_GET['tags']) || isset($_GET['language']))
			{
				if(empty($results['search_courses']))
				{
					echo "<h3>$_GET[tags] is not available in $_GET[language]</h3>";
				}
				foreach($results['search_courses'] as $courses)
		{		$out = strlen($courses->course_summary) > 60 ? substr($courses->course_summary,0,60)."..." : $courses->course_summary;
        echo"<div class='col-md-12 col-lg-6 mb-5'>
                <div class='block-19'>
                  <figure>
                    <a href='.?action=lessons&course_id=$courses->course_id'><img src='Profilepics/Courses/thumb/$courses->course_id$courses->course_image' alt='Image' class='img-fluid'></a>
                  </figure>
                    <div class='text'>
                      <h2 class='heading'><a href='.?action=lessons&course_id=$courses->course_id'>$courses->course_code</a></h2>
					  <a href='.?action=lessons&course_id=$courses->course_id' style='color:#80878a; font-size: 15px;'>$courses->course_name</a></h2>
                      <p class='mb-4'>$out</p>
                      <div class='meta d-flex align-items-center'>
                        <div class='number'>
                          <span>$courses->course_language</span>
                        </div>";
					if(empty($courses->course_price))
					{						
                      echo"<div class='price text-right'><span>Free</span></div>";
					  
					  
					  
					  echo"";
					}
					else
					{
						
						echo"<div class='price text-right'><span>Rs.$courses->course_price</span></div>";
						
						
						
						
					}
           echo"     </div>
                    </div>
                  </div>
                
              </div>";
		}
			}
		 else
		 {
			if(empty($results['courses']))
			{
				echo "<h3>No Courses</h3>";
			}
			
		foreach($results['courses'] as $courses)
		{	$out = strlen($courses->course_summary) > 60 ? substr($courses->course_summary,0,60)."..." : $courses->course_summary;	
        echo"<div class='col-md-12 col-lg-6 mb-5'>
                <div class='block-19'>
                  <figure>
                    <a href='.?action=lessons&course_id=$courses->course_id'><img src='Profilepics/Courses/thumb/$courses->course_id$courses->course_image' alt='Image' class='img-fluid'></a>
                  </figure>
                    <div class='text'>
                      <h2 class='heading'><a href='.?action=lessons&course_id=$courses->course_id'>$courses->course_code</a></h2>
					  <a href='.?action=lessons&course_id=$courses->course_id' style='color:#80878a; font-size: 15px;'>$courses->course_name</a></h2>
                      <p class='mb-4'>$out</p>
                      <div class='meta d-flex align-items-center'>
                        <div class='number'>
                          <span>$courses->course_language</span>
                        </div>";
					if(empty($courses->course_price))
					{						
                      echo"<div class='price text-right'><span>Free</span></div>";
					  
					  
					  
					  echo"";
					}
					else
					{
						
						echo"<div class='price text-right'><span>Rs.$courses->course_price</span></div>";
						
						
						
						
					}
           echo"     </div>
                    </div>
                  </div>
                
              </div>";
		}
		 }
              ?>

            </div>

            <div class="row mb-5">
              <div class="col-md-12 text-center">
                <div class="block-27">
                  <ul>
				  <?php
                    
				if($results['totalRows'] < 12)
				{
					echo "";
				}
			else
			{		
					
		        if($results['page'] == 1)
		       {
			     echo"";
		       }
		        else
		        {
					if(isset($_GET['tags']) && isset($_GET['language']))
                  { 
			        echo"<li class='page-item'>
                        <a href='.?action=courses&tags=$_GET[tags]&language=$_GET[language]&page=$results[prev]'>&lt;</a>
                      </li>";
				  }
				   else
				   {
					echo"<li><a href='.?action=courses&page=$results[prev]'>&lt;</a></li>";
				   }
                
				}
				for($pageNumbers=1;$pageNumbers<=$results['totalpages'];$pageNumbers++) :
				if(isset($_GET['tags']) && isset($_GET['language']))
                   { 
			          echo"
                      <li><a href='.?action=courses&tags=$_GET[tags]&language=$_GET[language]&page=$pageNumbers'>$pageNumbers</a></li>&nbsp;";
			   
			       }
				   else
				   {
						echo"
						<li><a href='.?action=courses&page=$pageNumbers'>$pageNumbers</a></li>&nbsp;";
				   }
					endfor;
					if(isset($_GET['tags']) && isset($_GET['language']))
                   { 
			        echo"<li><a href='.?action=courses&tags=$_GET[tags]&language=$_GET[language]&page=$results[next]'>&gt;</a></li>";
				   }
				   else
				   {
					echo"<li><a href='.?action=courses&page=$results[next]'>&gt;</a></li>";
				   }
				  
				}
					?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- END content -->
          <div class="col-md-6 col-lg-4 order-md-1">

        <!--    <div class="block-24 mb-5">
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
            </div> -->

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
                      <img src='Profilepics/Courses/thumb_small/$recent_courses->course_id$recent_courses->course_image' alt='' class='img-fluid'>
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

           <!-- <div class="block-26">
              <h3 class="heading">Tags</h3>
              <ul>
                <li><a href="#">code</a></li>
                <li><a href="#">design</a></li>
                <li><a href="#">typography</a></li>
                <li><a href="#">development</a></li>
                <li><a href="#">creative</a></li>
                <li><a href="#">codehack</a></li>
              </ul>
            </div> -->


          </div>
          <!-- END Sidebar -->
        </div>
      </div>
    </div>

    
    
  <!--  <div class="py-5 block-22">
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
    </div> -->


    <!-- Footer --->
 <?php include 'footer_main.php'; ?>