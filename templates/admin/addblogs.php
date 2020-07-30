<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4"><?php switch($_GET['action']){case 'editblogs':echo $results['title'];break;default: echo 'Add Blogs';break;}?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php switch($_GET['action']){case 'editblogs':echo $results['title_small'];break;default: echo 'Add a blog';break;}?></li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						
						<p class='error'><?php echo $error; ?></p>
						
											<div class="form-group">
											<label for="blog_titles">Blog Title:</label>
											<input class="form-control py-4" id="blog_titles" type="text" placeholder="Enter Blog Title" name="title" <?php if($_GET['action'] == 'editblogs'){echo 'value="'.$results['blog']->title.'"';}else{echo 'value="'.$title.'"';}?>/>
											</div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                        <label for="blog_authors">Blog Author:</label>
                                                        <input class="form-control py-4" id="blog_authors" type="text" placeholder="Enter Blog Author" name="author" <?php if($_GET['action'] == 'editblogs'){echo 'value="'.$results['blog']->author.'"';}else{echo 'value="'.$author.'"';}?>/>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="blog_tags">Blog Tags(Seperate by comma:Example = Blog,Munshiji):</label>
                                                        <input class="form-control py-4" id="blog_tags" type="text" placeholder="Enter Blog Tags" name="tags" <?php if($_GET['action'] == 'editblogs'){echo 'value="'.$results['blog']->tags.'"';}else{echo 'value="'.$tags.'"';}?>/>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
											<p>Blog Cover Image:</p>
											<div class="custom-file mb-3">
											<input type="file" class="custom-file-input" id="customFile" name="image">
											<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
											<?php
											
											if($_GET['action'] == 'editblogs')
											{
											echo'
											<p>Current Cover Image:</p>
											<br>
											<img src="'.BLOG_IMAGE_PATH.'/fullsize/'.$results['blog']->id.$results['blog']->image.'" style="width:200px">';
											}
											?>
											</div>
                                            <div class="form-group">
                                              Blog Content:  
                                             <textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="content" placeholder="Enter Blog Content"><?php if($_GET['action'] == 'editblogs'){echo $results['blog']->content;}else{echo $content;} ?></textarea>
                                            </div>
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
										</div>
										
                
 <?php include 'footer.php'; ?>