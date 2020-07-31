<?php include 'header_main.php'; ?>
    <!-- END header -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/heropic.jpeg" alt="First slide">
          <div class="carousel-caption">
            <h3 style="margin-bottom: 100px; font-size: 45px;text-align:center;">Are you confused which path to choose???</h3>
          
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/km.jpg" alt="Second slide">
          <div class="carousel-caption">
            <h3 style="margin-bottom: 280px; font-size: 45px;">Are you confused which path to choose???</h3>
          
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/heropic.jpeg" alt="Third slide">
          <div class="carousel-caption">
            <h3 style="margin-bottom: 280px; font-size: 45px;">Are you confused which path to choose???</h3>
          
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- END section -->

    <section class="site-section element-animate" style="background: url('images/body.jpg'); background-repeat: no-repeat; background-size: cover;">
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
                <h2>About Munshiji</h2>
              </div>
              <div class="text mb-5">
              <p>Munshiji is an Integrated and Holistic program to provide “End-to-end” solutions to the youth by spreading awareness within them about the importance of having a stable future.</p>
              </div>
              <p><a href="?action=about" class=" new btn btn-primary reverse py-2 px-4">Read More</a></p>
              
            </div>

          </div>
          
        </div>

      </div>
    </section>
    <!-- END section -->
	
	
	 <div class="site-section bg-light" style="background: url('images/body.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-danger heading">Popular Courses</h2>
          <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p> -->
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
                  <img src='Profilepics/Courses/thumb/$courses->course_id$courses->course_image' alt='Image' class='img-fluid'>
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
	

  <section class="site-section pt-3 element-animate" style="background: url('images/body.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-primary heading">Services</h2>
            <p>We aim to deliver to you these services from our end</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-6">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><span class="flaticon-book"></span></div>
              <div class="media-body">
                <h3 class="heading">Guest Lectures</h3>
                <p>Munshiji aims to invite experts from varied fields such as music, education, sports, art, etc. to share their experience and knowledge and motivate the youth to decide what their future should look like</p>
             <!--   <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>-->
              </div>
            </div> 
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><span class="flaticon-student"></span></div>
              <div class="media-body">
                <h3 class="heading">Motivation therapy</h3>
                <p>With the help of this program, we aim to restore the pride and self-esteem of those who have had the stigma of ‘dropping out’ from the race of life because of whatsoever reasons. This shall be done with the help of psychological analysis and boosting exercises</p>
             <!--   <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
            </div> 
          </div>
		  </div>
		  <div class="row">
		            <div class="col-md-6 col-lg-6">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><img src="images/empty_flag.png" class="img-fluid"/></div>
              <div class="media-body">
                <h3 class="heading">Self-awareness</h3>
                <p>The program aims to motivate the youth to be self-aware about what they want to achieve and what they should be aiming at this point of time to lead a successful life ahead</p>
           <!--     <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
            </div> 
          </div>
		  
          <div class="col-md-6 col-lg-6">
            <div class="media block-6 d-block mb-2">
			
              <div class="icon mb-3"><img src="images/helping.png" class="img-fluid"/></div>
              <div class="media-body">
                <h3 class="heading">Job Assistance</h3>
                <p>Munshiji will assist every youth to search for a suitable opening to showcase his/her talent in the field by working and excelling at what they do </p>
           <!--     <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
            </div> 
          </div>

    <!--      <div class="col-md-6 col-lg-3">
            <div class="media block-6 d-block">
              <div class="icon mb-3"><span class="flaticon-professor"></span></div>
              <div class="media-body">
                <h3 class="heading">Unmatched Proffessor</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit mess.</p>
                <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>
              </div>
            </div> 
          </div> -->
        </div>
      </div>
    </section>
    <!-- END section -->
<!-- <section class="site-section pt-3 element-animate" style="background: url('images/body.jpg'); background-repeat: no-repeat; background-size: cover;">
	   <div class="container">
	   <h2 class="text-danger text-center heading">Our method of training</h2>
	   <br><br>
	   <ol>
	   <li>Our primary method of training is online so that it is easily accessible to everyone</li>
	   <li>Live face to face classes via Zoom meeting</li>
	   <li>Extra dedicated hours on Weekends and during non-business hours</li>
	   <li>Practical exposure and projects</li>
	   <li>Counselling and mentoring sessions </li>
	   <li>Campus visit </li>
	   </ol>
	   

            </div>
	   
	   
	 
	  </section> -->

    <section class="site-section bg-light element-animate" id="section-counter" style="background: url('images/body.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <figure><img src="images/img_2_b.png" width="90%" alt="Image placeholder" class="img-fluid"></figure>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="block-15">
              <div class="heading">
             <!--   <h2>Our method of training</h2> -->
              </div>
              <div class="text-center mb-5">
                <p>श्रद्धावाँल्लभते ज्ञानं तत्परः संयतेन्द्रियः ।
                                                       ज्ञानं लब्धवा परां शान्तिमचिरेणाधिगच्छति ॥4.39॥<br><br>A person full of devotion with subdued senses attains
knowledge and achieves eternal peace instantly thereafter
</p>
              </div>
            </div>

           

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
   <section class="site-section bg-light element-animate" id="section-counter" style="background: url('images/body.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="container text-center">
       
		<h2>Transform your life through education</h2>
                   <p><a href=".?action=courses" class="new btn btn-primary mt-4 py-2 px-4">Explore</a></p>
      </div>
    </section>
   

   <!-- <div class="container site-section element-animate">
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
          </div> 
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
          </div> 
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
          </div> 
        </div>
      </div>
    </div> -->
    

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
		<audio autoplay>

  <source src="munshiji.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
  </audio>
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