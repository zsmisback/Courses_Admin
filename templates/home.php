<?php include 'header_main.php'; ?>
<!------ Include the above in your HEAD tag ---------->
<style>
.business-header {
    height: 450px;
    background: url('images/index_1.jpg') center center no-repeat scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
	z-index: -1;
}
</style>
<div style="col-md-6 col-sm-12 ">
<header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  text-center">
                    <br><br><br><br><br><br>
                    <hr>
                    <h1 class="tagline" style="color:white;">Shaping Career, Empowering Future</h1>
                    <hr>
                    <p style="color:white;">“Every youth can be a Basic Manager
and every business can get affordable Managerial skills”</p>
                    
                    <br>
                    
                </div>
            </div>
        </div>
 </header>		  
 </div>
       
	   <!-------------->
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
				<p> Munshiji is an program to provide ‘END TO END & BEYOND’ solutions to the youth. We empower the youth for starting up their economic activity through job or business by creating awareness and helping them develop required management skills. 
				<p>	
				Munshiji program starts with the self-awareness and progresses through the training on the core concepts of management such as Finance, Accounting, Banking, Taxation, Insurance, communication and IT.
				</p>
					
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
        <div class="row justify-content-center mb-1 element-animate">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-danger heading">Our Courses</h2>
			<hr>
          <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui neque sint eveniet tempore sapiente.</p> -->            
          </div>
        </div>
      </div>
      <div class="container-fluid block-11 element-animate">
        <div class="nonloop-block-11 owl-carousel">
		<?php
        
   foreach($results['courses'] as $courses)
   {   
   $name = strlen($courses->course_name) > 30 ? substr($courses->course_name,0,30)."..." : $courses->course_name;
   $out = strlen($courses->course_summary) > 60 ? substr($courses->course_summary,0,60)."..." : $courses->course_summary;
	echo" 
			<a href='.?action=lessons&course_id=$courses->course_id'>
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
	

  <section class="site-section pt-3 element-animate" style="background-color:#d3455b; background-repeat: no-repeat; background-size: cover;">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-7 text-center section-heading"><br>
            <h2 class="text-primary heading">Services</h2>
            <p>We aim to deliver to you these services from our end</p><hr>
          </div>
        </div>
		
        <div class="row">
          <div class="col-md-4 col-lg-4">
            <div class="media block-6 d-block">
              <div class="icon mb-3 text-center"><img src="images/leader 1.png" class="img-fluid" width="55px;"/></div>
              <div class="media-body text-center">
                <h3 class="heading">Learn From The Leaders</h3>
                <p>Munshiji aims to invite experts from varied fields such as music, education, sports, art, etc. to share their experience and knowledge and motivate the youth to decide what their future should look like</p>
             <!--   <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>-->
              </div>
            </div> 
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="media block-6 d-block">
              <div class="icon mb-3 text-center"><img src="images/withus 2.png" class="img-fluid" width="55px;"/></div>
              <div class="media-body text-center">
                <h3 class="heading">With us "YOU" can</h3>
                <p>Our courses will restore pride and self-esteem of every youth who had the stigma of ‘dropping out’ or ‘running away’ from the race of life which he/she might carry due to abandoning the school/college education.</p>
             <!--   <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
            </div> 
          </div>
		  <div class="col-md-4 col-lg-4">
            <div class="media block-6 d-block">
              <div class="icon mb-3 text-center"><img src="images/discover 3.png" class="img-fluid" width="55px;"/></div>
              <div class="media-body text-center">
                <h3 class="heading">Discover Yourself</h3>
				<p>Our program will help you to look within yourself and discover your potentials which will help you to exploit and make your life purposeful.<p>                
           <!--     <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
            </div> 
          </div>
		   <div class="col-md-4 col-lg-4">
            <div class="media block-6 d-block mb-2">			
              <div class="icon mb-3 text-center"><img src="images/managmentc 4.png" class="img-fluid" width="55px;"/></div>
              <div class="media-body text-center">
                <h3 class="heading">Management Skills</h3>
                <p>Our course will teach you “Basic Management Skill’ to manage your life better to face challenges of life.</p>
           <!--     <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
            </div> 
          </div>
		  
		   <div class="col-md-4 col-lg-4">
            <div class="media block-6 d-block mb-2">			
              <div class="icon mb-3 text-center"><img src="images/focus 5.png" class="img-fluid" width="55px;"/></div>
              <div class="media-body text-center">
                <h3 class="heading">Be Focused</h3>
                <p>Our courses are designed to help you identify your goal of life for a better and successful living.</p>
           <!--     <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
            </div> 
          </div>
		  
		  
		   <div class="col-md-4 col-lg-4">
            <div class="media block-6 d-block mb-2">			
              <div class="icon mb-3 text-center"><img src="images/career 6.png" class="img-fluid" width="55px;"/></div>
              <div class="media-body text-center">
                <h3 class="heading">Build a Career</h3>
                <p>Munshiji will assist you to find suitable opening to showcase your talent by way of job, business or skill full activities</p>
           <!--     <p><a href="#" class="more">Read More <span class="ion-arrow-right-c"></span></a></p> -->
              </div>
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
          <div class="col-lg-3">
            <figure><img src="images/god.png" width="100%" alt="Image placeholder" class="img-fluid"></figure>
          </div>
          <div class="col-lg-9 ml-auto">
            <div class="block-15">
              <div class="heading">
             <!--   <h2>Our method of training</h2> -->
              </div>
              <div class=" mb-5">
                <p>श्रद्धावाँल्लभते ज्ञानं तत्परः संयतेन्द्रियः ।
                                                       ज्ञानं लब्धवा परां शान्तिमचिरेणाधिगच्छति ॥4.39॥<br>A person full of devotion with subdued senses attains
knowledge and achieves eternal peace instantly thereafter
</p><br>
<h3>Our Vision</h3>
<p>EMPOWERMENT OF YOUTH
TO LIVE WITH A BETTER WORLD
HAVING BETTER LIFE SKILL & MANAGEMENT.
</p>
              </div>
            </div>

           

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
   <section class="site-section element-animate" id="section-counter" style="background-repeat: no-repeat; background-size: cover;background-color:#d3455b; ">
      <div class="container text-center">
       
		<h2>Transform your vision and be motivated by our daily blogs !</h2>
                   <p><a href=".?action=blogs" class="new btn btn-light mt-4 py-2 px-4">Explore</a></p>
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