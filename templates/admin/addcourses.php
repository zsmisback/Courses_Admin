<?php include 'header.php'; ?>
                          <div class="container-fluid">
                        <h1 class="mt-4">Add courses</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add a course</li>
                        </ol>
            
                        <form method = "post" enctype="multipart/form-data">
						<p class='error'><?php echo $error; ?></p>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="course_names">Course Name:</label>
                                                        <input class="form-control py-4" id="course_names" type="text" placeholder="Enter course name" name="course_name" value="<?php echo $course_name; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="course_codes">Course Short Name:</label>
                                                        <input class="form-control py-4" id="course_codes" type="text" placeholder="Enter course short name" name="course_code" value="<?php echo $course_code; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmailAddress">Course Summary:</label>
                                                <textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_summary" placeholder="Enter course summary"><?php echo $course_summary; ?></textarea>
                                            </div>
											<label for="course_tagss">Course Tags (Please seperate them by commas.Example:Bcom,Bachelors of commerce):</label>
											<input class="form-control py-4" id="course_tagss" type="text" placeholder="Enter course tags" name="course_tags" value="<?php echo $course_tags; ?>"/>
											<br>
											<label for="course_bys">Course By:</label>
											<input class="form-control py-4" id="course_bys" type="text" placeholder="Course By" name="course_by" value="<?php echo $course_by; ?>"/>
											<br>
											<label for="sel1">Select list:</label>
                                             <select class="form-control" id="sel1" name="course_language">
                                              <option value="English">English</option>
                                              <option value="Hindi">Hindi</option>
                                              <option value="Marathi">Marathi</option>
                                               
                                                 </select>
												 <br>
											<input type="file" name="image" id="image"/>
											<br><br>
											<label for="sel3">Course Rating:</label>
                                             <select class="form-control" id="sel3" name="course_rating">
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
											  <option value="4">4</option>
											  <option value="5">5</option>
                                               
                                                 </select>
											<br>
											<label for="course_total_time">Course Total Time:</label>
											<input type='text' class="form-control py-4" id="course_total_times" name="course_total_time" placeholder="Course Total Time" value="<?php echo $course_total_time; ?>">
											<br>
											<label for="course_readings">Course Completion Time:</label>
											<input class="form-control py-4" id="course_readings" type="text" name="course_reading" placeholder="Read Time" value="<?php echo $course_reading; ?>">
											<br>
											Course Award:
											<textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="course_award" placeholder="Course Award"><?php echo $course_award; ?></textarea>
											<br>
											Course Materials:
											<textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="course_material" placeholder="Course Materials"><?php echo $course_material; ?></textarea>
											<br>
											<label for="sel4">Course Age Group:</label>
                                             <select class="form-control" id="sel4" name="course_age_group">
                                              <option value="3 and above">3 and above</option>
                                              <option value="12 and above">12 and above</option>
                                              <option value="18 and above">18 and above</option>
											  
                                               
                                                 </select>
											<br>
											Course Pre-requisites:
											<textarea class="form-control py-4 ckeditor" id="inputEmailAddress" type="text" name="course_pre_requisite" placeholder="Course pre-requisite"><?php echo $course_pre_requisite; ?></textarea>
                                            <br>
											Course Price in Rs.(Leave empty if its free):
											<input class="form-control py-4" id="inputLastName" type="number" placeholder="Rs." name="course_price" value="<?php echo $course_price; ?>"/>
											
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                       
                    </div>
                
 <?php include 'footer.php'; ?>