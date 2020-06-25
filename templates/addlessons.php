<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter lesson name" name="lesson_name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter lesson No" name="lesson_no"/>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                            <label for="sel1">Select list:</label>
                                            <select class="form-control" id="sel1" name="lesson_for">
											<?php
											
											foreach($results['courses'] as $courses)
											{
                                            echo"<option value='$courses->course_id'>$courses->course_name</option>";
											}
											
											?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                              Lesson Content:  
                                             <textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="lesson_content" placeholder="Enter lesson content"></textarea>
                                            </div>
											<input class="form-control py-4" id="inputLastName" type="text" placeholder="Lesson By" name="lesson_by"/>
											<br>
											<input class="form-control py-4" id="inputLastName" type="text" placeholder="Lesson Vid Url" name="lesson_vid_url"/>
											<br>
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>