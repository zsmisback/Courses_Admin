 <?php include 'header.php'; ?>
 
                    <div class="container-fluid">
                        <h1 class="mt-4">Comments</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Comments List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Comment Summary</th>
                                                <th>Comment Lesson</th>
                                                <th>Comment Create</th>
                                                <th>Comment By</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Comment Summary</th>
                                                <th>Comment Lesson</th>
                                                <th>Comment Create</th>
                                                <th>Comment By</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php 
										
										foreach($results['comments'] as $comments)
										{
										echo"
                                            <tr>
                                                <td>$comments->comment_summary</td>
                                                <td>$comments->lesson_name</td>
                                                <td>$comments->comment_create</td>
                                                <td>$comments->comment_by</td>
                                                <td><a class='btn btn-primary' href='admin.php?action=editcomments&comment_id=$comments->comment_id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deletecomments&comment_id=$comments->comment_id'/>Delete</a></td>
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