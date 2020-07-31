<?php include 'header_main.php'; ?>
    <!-- END header -->

   <!-- <section class="site-hero pb-5"  style="background-image: url(images/body.jpg) !important ;">
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
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Type</option>
                        <option value="">Free</option>
                        <option value="">Paid</option>
                       
                      </select>
                    </div> 
                    <div class="select-wrap one-third" style="width:50%">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="language" id="" class="form-control">
                        <option value="language">Languages</option>
                        
                       
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
    </section>-->
    <!-- END section -->
<section>
<div class="container mb-4">
  <div class="row">
  <?php
		foreach($results['blogs'] as $blogs)
		{
			echo'
			<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4">
          <div class="card shadow">
              <div class="card-body text-center">
                  <a href="?action=blogcontent&id='.$blogs->id.'">
                      <img class="card-img-top" src="'.BLOG_IMAGE_PATH.'/'.IMG_TYPE_THUMB.'/'.$blogs->id.$blogs->image.'" alt="">
                  </a>
                  <ul class="list-inline mt-3">
                      <li class="list-inline-item"><i class="fas fa-user"></i> '.$blogs->author.'</li>
                      <li class="list-inline-item"><i class="far fa-clock"></i> '.$blogs->dates.'</li>
                  </ul>
                  <hr>
                  <p class="lead">'.$blogs->title.'</p>
                  <a class="btn btn-outline-dark my-2" href="?action=blogcontent&id='.$blogs->id.'" role="button">Read more...</a>
              </div>
          </div>
      </div>';
		}
	
	?>
      
      
  </div>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center mb-5">
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
					echo'<li class="page-item"><a class="page-link" href=".?action=blogs&page=$results[prev]">Previous</a></li>';
				}
				
				echo'<li class="page-item"><a class="page-link" href=".?action=blogs&page=$results[next]">Next</a></li>';
			}
			
			?>
    
  </ul>
</nav>
    
</section>
    
    
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