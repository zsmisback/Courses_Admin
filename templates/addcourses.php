<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Courses</h3></div>
                                    <div class="card-body">
                                        <form method = "post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter course name" name="course_name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter course short name" name="course_code"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_summary" placeholder="Enter course summary"></textarea>
                                            </div>
											<input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter course tags" name="course_tags"/>
											<br>
											<input class="form-control py-4" id="inputLastName" type="text" placeholder="Course By" name="course_by"/>
											<br>
											<label for="sel1">Select list:</label>
                                             <select class="form-control" id="sel1" name="course_language">
                                              <option value="english">English</option>
                                              <option value="hindi">Hindi</option>
                                              <option value="marathi">Marathi</option>
                                               
                                                 </select>
												 <br>
											<input type="file" name="image" id="image"/>
											<br><br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_rating" placeholder="Course Rating"></textarea>
											<br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_total_time" placeholder="Course Total Time"></textarea>
											<br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_reading" placeholder="Read Time"></textarea>
											<br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_award" placeholder="Course Award"></textarea>
											<br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_material" placeholder="Course Materials"></textarea>
											<br>
											<textarea class="form-control py-4" id="inputEmailAddress" type="text" name="course_age_group" placeholder="Course Age Group"></textarea>
											
                                           
                                            <div class="form-group mt-4 mb-0"><button type='btn btn-primary' name='submit'>Submit</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>