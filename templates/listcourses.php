 <?php include 'header.php'; ?>
 
                    <div class="container-fluid">
                        <h1 class="mt-4">Courses</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Courses List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Course Code</th>
                                                <th>Course By</th>
                                                <th>Course Language</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Course Code</th>
                                                <th>Course By</th>
                                                <th>Course Language</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php 
										
										foreach($results['courses'] as $courses)
										{
										echo"
                                            <tr>
                                                <td>$courses->course_name</td>
                                                <td>$courses->course_code</td>
                                                <td>$courses->course_by</td>
                                                <td>$courses->course_language</td>
                                                <td><a class='btn btn-primary' href='admin.php?action=editcourses&course_id=$courses->course_id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deletecourses&course_id=$courses->course_id'/>Delete</a></td>
                                            </tr>";
										}
											?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
<?php include 'footer.php'; ?>				