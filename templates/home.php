<?php include 'header_main.php'; ?>
    <!-- END header -->

    <section class="site-hero" data-stellar-background-ratio="0.5" style="background-image: url(images/index.jpg); background-position:center center; 
    background-attachment:fixed; background-size:cover; background-repeat: no-repeat;">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-inner">
          <div class="col-md-10">
  
            <div class="element-animate mt-4">
              <div class="block-17">
                <h2 class="heading text-center mb-4">Find Oneline Courses That Suits You</h2>
                <form action="index.php" method="get" class="d-block d-lg-flex mb-4">
				 <input type="hidden" name="action" value="courses"/>
                  <div class="fields d-block d-lg-flex">
                    <div class="textfield-search one-third"><input type="text" name="tags" class="form-control" placeholder="Keyword search..."></div>
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="type" class="form-control">
                        <option value="type">Type</option>
						<option value="">Free</option>
						<option value="paid">Paid</option>
                      </select>
                    </div>
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="language" class="form-control">
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
                  <input type="submit" class="search-submit btn btn-primary" value="Search">  
                </form>
                <p class="text-center mb-5">We have more than 500 courses to improve your skills</p>
                <p class="text-center "><a href=".?action=signup" class="btn py-3 px-5">SignUp</a></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="site-section element-animate mt-4">
      <div class="container">
        <div class="row ">
          <div class="col-md-6 col-sm-12 order-md-2">
            <div class="block-16">
              <figure>
                
                <iframe width="450" height="315" src="https://www.youtube.com/embed/d8pDp441JgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

              </figure>
            </div>
          </div>
		  
          <div class="col-md-6 col-sm-12 order-md-1">

            <div class="block-15">
              <div class="heading">
                <h2>Welcome to University</h2>
              </div>
              <div class="text mb-5">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A quibusdam nisi eos accusantium eligendi velit deleniti nihil ad deserunt rerum incidunt nulla nemo eius molestiae architecto beatae asperiores doloribus animi.</p>
              </div>
              <p><a href="#" class=" new btn btn-primary reverse py-2 px-4">Read More</a></p>
              
            </div>

          </div>
          
        </div>

      </div>
    </section>
    <!-- END section -->
	
	
	 <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-danger heading">Popular Courses</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
            <p><a href=".?action=signup" class="new btn btn-primary mt-4 py-2 px-4"><span class="ion-ios-book mr-2"></span>Enroll Now</a></p>
          </div>
        </div>
      </div>
      <div class="container-fluid block-11 element-animate">
        <div class="nonloop-block-11 owl-carousel">
		<?php
        
   foreach($results['courses'] as $courses)
   {   
	echo" <div class='item'>
            <div class='block-19'>
                <figure>
                  <img src='Profilepics/Courses/fullsize/$courses->course_id$courses->course_image' alt='Image' class='img-fluid'>
                </figure>
                <div class='text'>
                  <h2 class='heading'><a href='.?action=lessons&course_id=$courses->course_id'>$courses->course_code</a></h2>
				  <a href='.?action=lessons&course_id=$courses->course_id' style='color:#80878a; font-size: 15px;'>$courses->course_name</a></h2>
                  <p class='mb-4'>$courses->course_summary</p>
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
          </div>";
   }
		  
		  ?>
          
        </div>
      </div>

      
    </div>
    <!-- END section -->
	

    <section class="site-section pt-5 mt-5 element-animate">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-primary heading">Services</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><span class="flaticon-book"></span></div>
              <div class="media-body">
                <h3 class="heading">Knowledge is power</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit mess.</p>
                <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>
              </div>
            </div> 
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><span class="flaticon-student"></span></div>
              <div class="media-body">
                <h3 class="heading">Senior High School</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit mess.</p>
                <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>
              </div>
            </div> 
          </div>
          
          <div class="col-md-6 col-lg-3">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><span class="flaticon-diploma"></span></div>
              <div class="media-body">
                <h3 class="heading">College of Arts &amp; Sciences</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit mess.</p>
                <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>
              </div>
            </div> 
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><span class="flaticon-professor"></span></div>
              <div class="media-body">
                <h3 class="heading">Unmatched Proffessor</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit mess.</p>
                <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    <section class="site-section bg-light element-animate" id="section-counter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <figure><img src="images/img_2_b.jpg" alt="Image placeholder" class="img-fluid"></figure>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="block-15">
              <div class="heading">
                <h2>Education is Life</h2>
              </div>
              <div class="text mb-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A quibusdam nisi eos accusantium eligendi velit deleniti nihil ad deserunt rerum incidunt.</p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="block-18 d-flex align-items-center">
                  <div class="icon mr-4">
                    <span class="flaticon-student"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="12921">0</strong>
                    <span>Students</span>
                  </div>
                </div>

                <div class="block-18 d-flex align-items-center">
                  <div class="icon mr-4">
                    <span class="flaticon-university"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="51">0</strong>
                    <span>Schools</span>
                  </div>
                </div>

              </div>
              <div class="col-md-6">
                <div class="block-18 d-flex align-items-center">
                  <div class="icon mr-4">
                    <span class="flaticon-books"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="3902">0</strong>
                    <span>Books</span>
                  </div>
                </div>

                <div class="block-18 d-flex align-items-center">
                  <div class="icon mr-4">
                    <span class="flaticon-mortarboard"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="1921">0</strong>
                    <span>Graduates</span>
                  </div>
                </div>
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

   

    <div class="container site-section element-animate">
      <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-primary heading">Teachers</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
          </div>
        </div>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url(../images/person_3.png);">
                <div class="box">
                  <h2>Job Smith</h2>
                  <p>Laravel Expert</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="images/person_3.png" alt="">
                  </div>
                  <div class="name align-self-center">Job Smith <span class="position">Laravel Expert</span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="block-2 ">
            <div class="flipper">
              <div class="front" style="background-image: url(../images/person_1.png);">
                <div class="box">
                  <h2>Mellissa Cruz</h2>
                  <p>JavaScript Guru</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="images/person_1.png" alt="">
                  </div>
                  <div class="name align-self-center">Mellissa Cruz <span class="position">JavaScript Guru</span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url(../images/person_2.png);">
                <div class="box">
                  <h2>Aldin Powell</h2>
                  <p>WordPress Ninja</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="images/person_2.png" alt="">
                  </div>
                  <div class="name align-self-center">Aldin Powell <span class="position">WordPress Ninja</span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>
      </div>
    </div>
    <!-- END .block-2 -->

<!--blog
    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-primary heading">Blog</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
          </div>
        </div>
        <div class="row element-animate">
          
          <div class="col-md-12 mb-5 mb-lg-0 col-lg-6">

            <div class="block-20 ">
              <figure>
                <a href="#"><img src="images/img_1.png" alt="" class="img-fluid"></a>
              </figure>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-12 col-lg-6">
            
            <div class="block-21 d-flex mb-4">
              <figure class="mr-3">
                <a href="#"><img src="images/img_1.png" alt="" class="img-fluid"></a>
              </figure>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>  

            <div class="block-21 d-flex mb-4">
              <figure class="mr-3">
                <a href="#"><img src="images/img_2.png" alt="" class="img-fluid"></a>
              </figure>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>  

            <div class="block-21 d-flex mb-4">
              <figure class="mr-3">
                <a href="#"><img src="images/img_3.png" alt="" class="img-fluid"></a>
              </figure>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>  

            <div class="block-21 d-flex mb-4">
              <figure class="mr-3">
                <a href="#"><img src="images/img_3.png" alt="" class="img-fluid"></a>
              </figure>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>  

          </div>
        </div>
      </div>
    </div>
	-->
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