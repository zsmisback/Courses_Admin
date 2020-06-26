<?php include 'header.php'; ?>
 
                    <div class="container-fluid">
                        <h1 class="mt-4">Lessons</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Lessons List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Lesson Name</th>
                                                <th>Lesson For</th>
                                                <th>Lesson By</th>
                                                <th>Lesson No</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Lesson Name</th>
                                                <th>Lesson For</th>
                                                <th>Lesson By</th>
                                                <th>Lesson No</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php 
										
										foreach($results['lessons'] as $lessons)
										{
										echo"
                                            <tr>
                                                <td>$lessons->lesson_name</td>
                                                <td>$lessons->course_name</td>
                                                <td>$lessons->lesson_by</td>
                                                <td>$lessons->lesson_no</td>
                                                <td><a class='btn btn-primary' href='admin.php?action=editlessons&lesson_id=$lessons->lesson_id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deletelessons&lesson_id=$lessons->lesson_id'/>Delete</a></td>
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