<?php include 'header_main.php'; ?>
    <!-- END header -->


   
  
      <div class="site-section bg-light element-animate" style="background-image: url(images/body.jpg) !important ;">
        <div class="container-fluid">
          
          <div class="row">
            
            <div class="col-md-6 col-lg-8 order-md-1 mb-5">
			<div class="block-28 mb-5">
			<h2><?php echo $results['courses']->course_name; ?></h2>
                      <p><?php echo $results['courses']->course_summary; ?></p>
                <h2 class="heading">Get this course</h2>
                
				
				<?php
				if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
				{
					echo"<a href='.?action=login'><button type='button' class='btn btn-primary px-5 py-2 mt-4 mr-4' style='background-color:#C03F53;'>Add Course</button></a>";
				}
				elseif($results['owned'] > 0)
				{
					echo"<button type='button' class='btn btn-primary px-5 py-2 mt-4' style='background-color:#C03F53;'>Owned!</button>";
				}
				elseif(empty($results['courses']->course_price))
				{
					echo"<a href='index.php?action=addcourses&course_id=".$results['courses']->course_id."'><button type='button' class='btn btn-primary px-5 py-2 mt-4' style='background-color:#C03F53;'>Add Course</button></a>";
				}
				else
				{
				echo"
                  <form action='templates/pay.php?checkout=automatic' method='post' name='payuForm'>
      <table>
        
        <tr>
          
          <td><input type='hidden' name='amount' value='".$results['courses']->course_price."' /></td>
          
          <td><input type='hidden' name='firstname' id='firstname' value='".$results['users']->user_id."' /></td>
        </tr>
        <tr>
          
          <td><input type='hidden' name='email' id='email' value='".$results['users']->user_email_address."' /></td>
          
          <td><input type='hidden' name='phone' value='".$results['users']->user_contact."' /></td>
        </tr>
        <tr>
          
          <td colspan='3'><input type='hidden' name='productinfo' value='".$results['courses']->course_id."' /></td>
        </tr>
		

        
        <tr>
          
            <div class='col-md-6 form-group d-flex align-items-center'>
                    <button type='submit' class='btn btn-primary px-5 py-2 mt-4' style='background-color:#C03F53;'>Add Course</button>

                  </div>
            
    </tr>
      </table>
    </form>";
				}
				?>
				
                
              </div>
             <!-- <div class="block-28 text-center mb-5">
                <figure>
                  <img src="images/teacher2.jpg" alt="" class="img-fluid">
                </figure>
                <h2 class="heading"></h2>
                <h3 class="subheading">JavaScript </h3>
                <p>
                  <a href="#" class="fa fa-twitter p-2"></a>
                  <a href="#" class="fa fa-facebook p-2"></a>
                  <a href="#" class="fa fa-linkedin p-2"></a>
                </p>
                <p>Hi I'm Pooja Joshi, consectetur adipisicing elit. Quibusdam nulla beatae modi itaque nemo magni molestiae explicabo sint dolorum cum</p>
                
              </div> -->
			  
              <div class="block-28 mb-5">
                <h2 class="heading">Course Details</h2>
				<br>
                <ul>
				<!--
				  <li><span class="text-1">Course By - <span class="text-2"><?php echo $results['courses']->course_by; ?></span></li>-->
                  <li><span class="text-1">Duration - <span class="text-2"><?php echo $results['courses_continue']->course_reading; ?></span></li>
           
                  <li><span class="text-1">Subject - </span> <span class="text-2"><?php echo $results['courses']->course_name; ?></span></li>
                  <li><span class="text-1">Language - </span> <span class="text-2"><?php echo $results['courses']->course_language; ?></span></li>
				  <li><span class="text-1">Age Group - </span> <span class="text-2"><?php echo $results['courses_continue']->course_age_group; ?></span></li>
				  <li><span class="text-1">Rating - </span> <span class="text-2"><?php echo $results['courses_continue']->course_rating; ?></span></li>
				<?php 
				if(empty($results['courses']->course_price))
				{
					echo"<li><span class='text-1'>Free</span></li>";
				}
				else
				{
				echo"
                <li><span class='text-1'>Price - Rs.</span> <span class='text-2'>".$results['courses']->course_price."</span></li>";
				}
				?>
                </ul>
              </div>
			  
			  <div class="block-28 mb-5">
                <h2 class="heading">Course Awards</h2>
                <ul>
               <?php echo $results['courses_continue']->course_award; ?>
                </ul>
              </div>
			  
			  <div class="block-28 mb-5">
                <h2 class="heading">Course Materials</h2>
                <ul>
               <?php echo $results['courses_continue']->course_material; ?>
                </ul>
              </div>
			  
			  <div class="block-28 mb-5">
                <h2 class="heading">Pre-Requisites</h2>
                <ul>
               <?php echo $results['courses_continue']->course_pre_requisite; ?>
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
  
  
       <!--       <div class="block-24 mb-5">
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
  
            </div>
            <!-- END content -->
            <div class="col-md-6 col-lg-4 order-md-2">
			 <div class="row">
                <div class="col-md-12">
               
                </div>  
              </div>
              
              <section class="episodes">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 pt-2">
					
                      
                    </div>
                  </div>
                </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-2">
              
            </div>
          </div>
		 <?php
		
		if(empty($results['lessons']))
		{
			echo "<h2>No lessons</h2>";
		}
		foreach($results['lessons'] as $lessons)
		{
			if($lessons->lesson_status == 0)
			{
		echo"		
          <div class='row bg-light align-items-center p-4 episode'>
            <div class='col-md-9'>
              <p class='meta'>Lesson $lessons->lesson_no</p>
              <h2><a href='.?action=content&course_id=$_GET[course_id]&lesson_id=$lessons->lesson_id'>$lessons->lesson_name</a></h2>
              <p>$lessons->lesson_content</p>
            </div>
            <div class='col-md-3 text-center'>
                <a class='btn btn-primary px-3 py-2' href='.?action=content&course_id=$_GET[course_id]&lesson_id=$lessons->lesson_id' style='background-color:#C03F53;' role='button'>View Contents</a>

            </div>
          </div>";
			}
			else
			{
				echo"		
          <div class='row bg-light align-items-center p-4 episode'>
            <div class='col-md-9'>
              <p class='meta'>Lesson $lessons->lesson_no</p>
              <h2>$lessons->lesson_name</h2>
              <p>$lessons->lesson_content</p>
            </div>
            <div class='col-md-3 text-center'>
                <a class='btn btn-primary px-3 py-2' role='button' style='background-color:#C03F53;' disabled>Paid</a>

            </div>
          </div>";
			}
		}
  
          ?>
        </div>
      </section>
              
			  
			 
              
              
  
            </div>
            <!-- END Sidebar -->
          </div>
        </div>
      </div>
  
      <div class="site-section bg-light" style="background-image: url(images/body.jpg) !important ;">
        <div class="container">
          <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-7 text-left section-heading">
              <h2 class="heading text-center">You May Also Like</h2>
        <!--      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p> -->
            </div>
          </div>
        </div>
        <div class="container-fluid block-11 element-animate">
          <div class="nonloop-block-11 owl-carousel">
		  <?php
            foreach($results['recommended_courses'] as $courses)
   {   
   $name = strlen($courses->course_name) > 30 ? substr($courses->course_name,0,30)."..." : $courses->course_name;
   $out = strlen($courses->course_summary) > 60 ? substr($courses->course_summary,0,60)."..." : $courses->course_summary;
	echo" <a href='.?action=lessons&course_id=$courses->course_id'>
			<div class='item'>
            <div class='block-19'>
                <figure>
                  <img src='Profilepics/Courses/thumb/$courses->course_id$courses->course_image' alt='Image' class='img-fluid'>
                </figure>
                <div class='text'>
                  <h2 class='heading'>$courses->course_code</h2>
				  <h6>$name</h6>
                  <p class='mb-4'>$out</p>
                  <div class='meta d-flex align-items-center'>
                    <div class='number'>
                      <span>$courses->course_language</span>
                    </div>";
					if(empty($courses->course_price))
					{
                    echo"<div class='price text-right'><span>Free</span></div>";
					
					}
					else
					{
						echo"<div class='price text-right'><span>Rs.$courses->course_price</span></div>";
						
						
						
					}
            echo"</div>
                </div>
              </div>
          </div>
		  </a>";
   }
		  
		  ?>
            
          </div>
        </div>
  
        
      </div>
      <!-- END section -->
  
          <!-- END Sidebar -->
        </div>
      </div>
    </div>

    
    
  <!--  <div class="py-5 block-22">
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
    </div> -->

<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>





      <!-- Footer --->
<?php include 'footer_main.php'; ?>