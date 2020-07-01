<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Add Comments</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add comments</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						<p class='error'><?php echo $error; ?></p>
						<input type="hidden" name="comment_id" value="<?php echo $_GET['comment_id']; ?>"/>
						
                         Comment Summary:                   
						<textarea class="form-control py-4 ckeditor" id="inputLastName" type="text" placeholder="Comment Summary" name="comment_summary"><?php echo $results['comments']->comment_summary; ?></textarea>
						<br>
						<div class="form-group">
                        <label for="sel1">Select Lesson:</label>
                       <select class="form-control" id="sel1" name="comment_lesson">
					   <?php 
                        
                        foreach($results['lessons'] as $lessons)
						{						
						echo" <option value=$lessons->lesson_id>$lessons->lesson_name</option>";
						}
                       ?>
                         </select>
                         </div>
											
											
                                           
                        <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>