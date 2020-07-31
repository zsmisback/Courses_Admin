<?php include 'header_main.php'; ?>
    <!-- END header -->
	
	<section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo BLOG_IMAGE_PATH.'/'.IMG_TYPE_FULLSIZE.'/'.$results['blogs']->id.$results['blogs']->image; ?>);">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
          <div class="col-md-12 text-center">
  
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6 col-lg-12 order-md-2 pl-lg-5">
            <div class="row">
              <div class="col-md-12 col-lg-12 mb-5">
                   <h1 class='text-center'><?php echo $results['blogs']->title; ?></h1>
                  <p class="lead"><?php echo $results['blogs']->content; ?></p>
                  <p>Author: <a href="#"><?php echo $results['blogs']->author; ?> </a></p>
                  <div class="mt-5">
                   
                    <p> Tags: <?php foreach($tags as $tag){echo'<a href="#">#'.$tag.'</a> ';} ?></p>
                  </div>


                 
                    
                        <div class="pt-5">
                   <h3 class="mb-5">Comments</h3>
                    <ul class="comment-list">
					<?php
					
					foreach($results['comments'] as $comments)
					{
                     echo'
						<li class="comment">
                        <div class="vcard bio">';
						if(empty($comments->user_image))
						{
                          echo"<img src='images/default.jpg' alt='Image placeholder'>";
						}
						else
						{
                          echo'<img src="'.USER_IMAGE_PATH.'/'.IMG_TYPE_THUMB.'/'.$comments->user_id.$comments->user_image.'" alt="Image placeholder">';
						}
                     echo'</div>
                        <div class="comment-body">
                          <h3>'.$comments->user_name.'</h3>
                          <div class="meta">'.$comments->comment_create.'</div>
                          <p>'.$comments->comment_summary.'</p>
                         <!-- <p><a href="#" class="reply">Reply</a></p> -->
                        </div>
                      </li>';
					}
                      
					  ?>
                      
                    </ul>
                    <!-- END comment-list -->
         

                    <div class="comment-form-wrap pt-5">
                      <h3 class="mb-5">Leave a comment</h3>
                      <form method="post" class="bg-light">
                       <!-- <div class="form-group">
                          <label for="name">Name *</label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email *</label>
                          <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="website">Website</label>
                          <input type="url" class="form-control" id="website">
                        </div>-->
						<p><?php echo $error; ?></p>
                        <div class="form-group">
                          <label for="message">Message</label>
                          <textarea id="message" name="comment_summary" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" value="Post Comment" class="btn btn-primary">
                        </div>

                      </form>
                    </div>
                    </div>
  
                </div>
              </div>
  
              
            </div>
            <!-- END content -->
        </div>
      </div>
    </div>
	
   

  
  
    <?php include 'footer_main.php'; ?>