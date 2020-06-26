<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Edit Courses</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit a course</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
										<input type='hidden' name='course_id' value='<?php echo $_GET['course_id']; ?>' />
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter course name" name="course_name" value="<?php echo $results['courses']->course_name; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter course short name" name="course_code" value="<?php echo $results['courses']->course_code; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_summary" placeholder="Enter course summary"><?php echo $results['courses']->course_summary; ?></textarea>
                                            </div>
											<input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter course tags" name="course_tags" value="<?php echo $results['courses']->course_tags; ?>"/>
											<br>
											<input class="form-control py-4" id="inputLastName" type="text" placeholder="Course By" name="course_by" value="<?php echo $results['courses']->course_by; ?>"/>
											<br>
											<label for="sel1">Select list:</label>
                                             <select class="form-control" id="sel1" name="course_language">
                                              <option value="english">English</option>
                                              <option value="hindi">Hindi</option>
                                              <option value="marathi">Marathi</option>
                                               
                                                 </select>
												 <br>
											Current Image:
											<br>
											<img src="<?php echo CATEGORY_IMAGE_PATH; ?>/fullsize/<?php echo $results['courses']->course_id.$results['courses']->course_image; ?>" style="width:200px">
											<br><br>
											<input type="file" name="image" id="image"/>
											<br><br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_rating" placeholder="Course Rating"><?php echo $results['courses_continue']->course_rating; ?></textarea>
											<br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_total_time" placeholder="Course Total Time"><?php echo $results['courses_continue']->course_total_time; ?></textarea>
											<br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_reading" placeholder="Read Time"><?php echo $results['courses_continue']->course_reading; ?></textarea>
											<br>
											Course Award:
											<textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="course_award" placeholder="Course Award"><?php echo $results['courses_continue']->course_award; ?></textarea>
											<br>
											Course Materials:
											<textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="course_material" placeholder="Course Materials"><?php echo $results['courses_continue']->course_material; ?></textarea>
											<br>
											Course Age Group:
											<textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="course_age_group" placeholder="Course Age Group"><?php echo $results['courses_continue']->course_age_group; ?></textarea>
											Course Pre-requisites:
											<textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="course_pre_requisite" placeholder="Course pre-requisite"><?php echo $results['courses_continue']->course_pre_requisite; ?></textarea>
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>