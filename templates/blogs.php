<?php include 'header_main.php'; ?>
    <!-- END header -->

    <section class="site-hero pb-5"  style="background-image: url(images/body.jpg) !important ;">
      <div class="container-fluid" >
	  
    <!--<div class="container">
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
      </div>-->
    </section>
    <!-- END section -->

    <div class="site-section1 bg-light" style="background-image: url(images/body.jpg) !important ;">
      <div class="container">
        <div class="row">
          
            <div class="row">
			
			
			
			
			
		<?php
		foreach($results['blogs'] as $blogs)
		{
			echo"
			<div class='col-lg-4'>
                <div class='block-19'>
                  <figure>
                    <a href='.?action=blogcontent&id=$blogs->id'><img src='Profilepics/Blogs/thumb/$blogs->id$blogs->image' alt='Image' class='img-fluid'></a>
                  </figure>
                    <div class='text'>
                      <h2 class='heading'><a href='.?action=lessons&course_id='>$blogs->title</a></h2>
					  <a href='.?action=lessons&course_id=' style='color:#80878a; font-size: 15px;'></a></h2>
                      <p class='mb-4'></p>
                      <div class='meta d-flex align-items-center'>
                        <div class='number'>
                          <span></span>
                        </div>
					<div class='price text-right'><span>Free</span></div>
					  
				
						
						
						
						
					
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
					
					echo"<li><a href='.?action=blogs&page=$results[prev]'>&lt;</a></li>";
				   
                
				}
				
				
					
					echo"<li><a href='.?action=blogs&page=$results[next]'>&gt;</a></li>";
				   
				  
				}
					?>
                  </ul>
                </div>
              </div>
            </div>
         
          <!-- END content -->
          
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