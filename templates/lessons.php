<?php include 'header_main.php'; ?>
    <!-- END header -->


   
  
      <div class="site-section bg-light element-animate">
        <div class="container-fluid">
          
          <div class="row">
            
            <div class="col-md-6 col-lg-8 order-md-1 mb-5">
              <div class="row">
                <div class="col-md-12">
               
                </div>  
              </div>
              
              <section class="episodes">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 pt-2">
					
                      <h2><?php echo $results['courses']->course_name; ?></h2>
                      <p><?php echo $results['courses']->course_summary; ?></p>
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
       echo"		
          <div class='row bg-light align-items-center p-4 episode'>
            <div class='col-md-9'>
              <p class='meta'>Lesson 1</p>
              <h2><a href='#'>$lessons->lesson_name</a></h2>
              <p>$lessons->lesson_content</p>
            </div>
            <div class='col-md-3 text-center'>
                <a class='btn btn-primary px-3 py-2' href='.?action=content&lesson_id=$lessons->lesson_id' role='button'>Watch Video</a>

            </div>
          </div>";
		}
  
          ?>
        </div>
      </section>
            </div>
            <!-- END content -->
            <div class="col-md-6 col-lg-4 order-md-2">
              
			  <div class="block-28 text-center mb-5">
                <figure>
                  <img src="images/teacher2.jpg" alt="" class="img-fluid">
                </figure>
                <h2 class="heading"><?php echo $results['courses']->course_by; ?></h2>
                <h3 class="subheading">JavaScript </h3>
                <p>
                  <a href="#" class="fa fa-twitter p-2"></a>
                  <a href="#" class="fa fa-facebook p-2"></a>
                  <a href="#" class="fa fa-linkedin p-2"></a>
                </p>
                <p>Hi I'm Pooja Joshi, consectetur adipisicing elit. Quibusdam nulla beatae modi itaque nemo magni molestiae explicabo sint dolorum cum</p>
                
              </div>
			  
              <div class="block-28 mb-5">
                <h2 class="heading">Course Details</h2>
                <ul>
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
                <li><span class='text-1'>Price - Rs.</span> <span class='text-2'>";
				foreach($results['lessons'] as $price)
				{
				echo"$price->course_price";
				}
				echo"</span></li>";
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
                <h2 class="heading">Materials Required</h2>
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
                  <li>
                    <a href="#" class="d-flex">
                      <figure class="image mr-3">
                        <img src="images/img_1.png" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <h3 class="heading">Create cool websites using this template</h3>
                        <span class="meta">$34</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="d-flex">
                      <figure class="image mr-3">
                        <img src="images/img_2.png" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <h3 class="heading">Create cool websites using this template</h3>
                        <span class="meta">$34</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="d-flex">
                      <figure class="image mr-3">
                        <img src="images/img_3.png" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <h3 class="heading">Create cool websites using this template</h3>
                        <span class="meta">$34</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
  
  
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
  
              
              
  
            </div>
            <!-- END Sidebar -->
          </div>
        </div>
      </div>
  
      <div class="site-section bg-light">
        <div class="container">
          <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-7 text-left section-heading">
              <h2 class="text-primary heading">You May Also Like</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
            </div>
          </div>
        </div>
        <div class="container-fluid block-11 element-animate">
          <div class="nonloop-block-11 owl-carousel">
            <div class="item">
              <div class="block-19">
                  <figure>
                    <img src="images/img_1.png" alt="Image" class="img-fluid">
                  </figure>
                  <div class="text">
                    <h2 class="heading"><a href="#">Advanced JavaScript Learning</a></h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                    <div class="meta d-flex align-items-center">
                      <div class="number">
                        <span>2,219/6,000</span>
                      </div>
                      <div class="price text-right"><del class="mr-3">$23</del><span>Free</span></div>
                    </div>
                  </div>
                </div>
            </div>
  
            <div class="item">
              <div class="block-19">
                  <figure>
                    <img src="images/img_3.png" alt="Image" class="img-fluid">
                  </figure>
                  <div class="text">
                    <h2 class="heading"><a href="#">Advanced JavaScript Learning</a></h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                    <div class="meta d-flex align-items-center">
                      <div class="number">
                        <span>2,219/6,000</span>
                      </div>
                      <div class="price text-right"><del class="mr-3">$23</del><span>Free</span></div>
                    </div>
                  </div>
                </div>
            </div>
  
            <div class="item">
              <div class="block-19">
                <figure>
                  <img src="images/img_2.png" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <h2 class="heading"><a href="#">Introduction to CSS</a></h2>
                  <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                  <div class="meta d-flex align-items-center">
                    <div class="number">
                      <span>1,903/3,000</span>
                    </div>
                    <div class="price text-right"><span>$10.99</span></div>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="item">
              <div class="block-19">
                <figure>
                  <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <h2 class="heading"><a href="#">Design &amp; Develop</a></h2>
                  <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                  <div class="meta d-flex align-items-center">
                    <div class="number">
                      <span>23/100</span>
                    </div>
                    <div class="price text-right"><del class="mr-3">$23</del><span>Free</span></div>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="item">
              <div class="block-19">
                  <figure>
                    <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                  </figure>
                  <div class="text">
                    <h2 class="heading"><a href="#">Advanced JavaScript Learning</a></h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                    <div class="meta d-flex align-items-center">
                      <div class="number">
                        <span>2,219/6,000</span>
                      </div>
                      <div class="price text-right"><del class="mr-3">$23</del><span>Free</span></div>
                    </div>
                  </div>
                </div>
            </div>
  
            <div class="item">
              <div class="block-19">
                  <figure>
                    <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                  </figure>
                  <div class="text">
                    <h2 class="heading"><a href="#">Advanced JavaScript Learning</a></h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                    <div class="meta d-flex align-items-center">
                      <div class="number">
                        <span>2,219/6,000</span>
                      </div>
                      <div class="price text-right"><del class="mr-3">$23</del><span>Free</span></div>
                    </div>
                  </div>
                </div>
            </div>
  
            <div class="item">
              <div class="block-19">
                <figure>
                  <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <h2 class="heading"><a href="#">Introduction to CSS</a></h2>
                  <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                  <div class="meta d-flex align-items-center">
                    <div class="number">
                      <span>1,903/3,000</span>
                    </div>
                    <div class="price text-right"><span>$10.99</span></div>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="item">
              <div class="block-19">
                <figure>
                  <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="text">
                  <h2 class="heading"><a href="#">Design &amp; Develop</a></h2>
                  <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
                  <div class="meta d-flex align-items-center">
                    <div class="number">
                      <span>23/100</span>
                    </div>
                    <div class="price text-right"><del class="mr-3">$23</del><span>Free</span></div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
  
        
      </div>
      <!-- END section -->
  
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