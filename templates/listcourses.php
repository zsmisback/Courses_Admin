 <?php include 'header.php'; ?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
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
                                                <td><a class='btn btn-primary' href='admin.php?action=editcourses&courseid=$courses->course_id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deletecourses&courseid=$courses->course_id'/>Delete</a></td>
                                            </tr>";
										}
											?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'footer.php'; ?>				