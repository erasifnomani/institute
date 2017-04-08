<?php include('header.php'); ?>
<script>
function validateNumber(evt) {
		
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       
	}
	
</script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Blog
                        </div>
                        <div class="panel-body">
					<?php
						if(isset($_SESSION['token'])){
							echo getTokenMessage($_SESSION['token']);
							unset($_SESSION['token']);
						}
						if(!isset($_SESSION)){
							echo "Session Is Not Set!";
						}
						if(isset($_GET['token'])){
							echo getTokenMessage($_GET['token']);
						}
					?>
                            <div class="row">
							<form role="form" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    											
                                    	<div class="form-group">
                                            <label>Blog Title*:</label>
                                            <input class="form-control" name="blog_title"  placeholder="Blog Title" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Upload Images*:</label>
                                            <input type="file" class="form-control" name="blog_images">
                                        </div>
										
																														
										<div class="form-group">
                                            <label>Blog Content*:</label>
                                             <textarea class="form-control" rows="3" name="blog_description" id="address" placeholder="Blog Content" required></textarea>
                                        </div>									
										
                                    <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                              </form>
					<?php 
						if(isset($_POST['submit'])){
							
							try{
								$token="";
								$dbh = getConnection();
								$dbh->beginTransaction();
											
							$blog_title = mysql_real_escape_string($_POST['blog_title']);							
							$blog_description = mysql_real_escape_string($_POST['blog_description']);
							$entry_date = date('Y-m-d');
							
							
							
							if ((($_FILES["blog_images"]["type"] == "image/gif")
								|| ($_FILES["blog_images"]["type"] == "image/jpeg")
								|| ($_FILES["blog_images"]["type"] == "image/JPG")
								|| ($_FILES["blog_images"]["type"] == "image/png")
								|| ($_FILES["blog_images"]["type"] == "image/pjpeg"))
								&& ($_FILES["blog_images"]["size"] < 10000000))
								{
							if ($_FILES["blog_images"]["error"] > 0)
								{
								echo "Return Code: " . $_FILES["blog_images"]["error"] . "<br />";
								exit;
							}
								else
							{
								$blogimages = $_FILES["blog_images"]["name"];
								move_uploaded_file($_FILES["blog_images"]["tmp_name"],
								"blogimages/" . $blogimages);
							}
							}
							else
							{
								echo "Member Image Invalid file";
							}

							mysqli_query($con,"SET sql_mode = ''");
							
														
							$sql = mysqli_query($con,"INSERT INTO blog (blog_title,blog_images,blog_desc,entry_date) Values('$blog_title','$blogimages','$blog_description','$entry_date')");
							
							
							$token="success";						
							$dbh->commit();
							$_SESSION['token']=$token;
							
							}
							catch(PDOException $e){
								echo $e;
								echo $e->getMessage();
							try{
								$dbh->rollback();
							}catch(PDOException $e){
								echo $e->getMessage();
							}
							}
							
					?>
					<script type="text/javascript">
						window.location="Create-Blog.php";				
					</script>
			
					<?php	
						}
					?>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
							
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
