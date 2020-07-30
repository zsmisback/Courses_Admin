<?php include 'header.php'; ?>
 
                    <div class="container-fluid">
                        <h1 class="mt-4">Blogs</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Blogs List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Tags</th>
												<th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Tags</th>
												<th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php 
										
										foreach($results['blogs'] as $blogs)
										{
										echo"
                                            <tr>
                                                <td>$blogs->id</td>
                                                <td>$blogs->title</td>
                                                <td>$blogs->author</td>
                                                <td>$blogs->tags</td>
												<td>$blogs->dates</td>
                                                <td><a class='btn btn-primary' href='admin.php?action=editblogs&id=$blogs->id'/>Edit</a></td>
                                                <td><a class='btn btn-primary' href='admin.php?action=deleteblogs&id=$blogs->id'/>Delete</a></td>
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