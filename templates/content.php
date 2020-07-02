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
                  
                  


                  <div class="pt-5">
                    <h3 class="mb-5">Comments</h3>
                    <ul class="comment-list">
                    <?php  
                    
					foreach($results['comments'] as $comments)
					{
                      echo"<li class='comment'>
                        <div class='vcard bio'>";
						if(empty($comments->user_image))
						{
                          echo"<img src='images/default.jpg' alt='Image placeholder'>";
						}
						else
						{
							echo"<img src='Profilepics/Users/thumb/$comments->user_id$comments->user_image' alt='Image placeholder'>";
						}
                     echo"</div>
                        <div class='comment-body'>
                          <h3>$comments->user_name</h3>
                          <div class='meta'>$comments->comment_create</div>
                          <p>$comments->comment_summary</p>
                          
                        </div>
                      </li>";
					}
					  
					  ?>

                   <!--  <li class="children">
                        <div class="vcard bio">
                          <img src="images/teacher2.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>Jean Doe</h3>
                          <div class="meta">January 9, 2018 at 2:21pm</div>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo!</p>
                          <p><a href="#" class="reply">Reply</a></p>
                        </div>
                      </li>--> 

                      

                     
                    </ul>
                    <!-- END comment-list -->
                    
                    <div class="comment-form-wrap p-5">
                      <h3 class="mb-5">Review</h3>
                      <form method="post">
                        <label for="message">Rate this Lesson</label> <br>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value='1' name="lesson_rating">1
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value='2' name="lesson_rating">2
                          </label>
                        </div>
                        <div class="form-check-inline disabled">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value='3' name="lesson_rating"> 3
                          </label>
                        </div>
                        <div class="form-check-inline disabled">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value='4' name="lesson_rating" > 4
                          </label>
                        </div>
                        <div class="form-check-inline disabled">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value='5' name="lesson_rating" > 5
                          </label>
                        </div>
                        <br><br>
                        <div class="form-group">
                          <label for="message">Comment</label>
                          <textarea name="comment_summary" id="message" cols="10" rows="5" class="form-control"></textarea>
                        </div>
						<p><?php echo $error; ?></p>

                        <div class="form-group">
                          <input type="submit" value="Post Your Review" class="btn btn-primary">
                        </div>

                      </form>
                    </div>
                  </div>

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
                <li><a href=".?action=content&course_id='.$_GET['course_id'].'&lesson_id='.$results['paginations'][$pageNumbers-1]->lesson_id.'">Lesson '.$pageNumbers.'</a></li>';
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