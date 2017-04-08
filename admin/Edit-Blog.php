<?php 
error_reporting(0);
include('header.php'); 
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Blog</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
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
					<?php 
						$blog_id = $_REQUEST['id'];
						$sqls = mysql_query("SELECT * FROM blog WHERE blog_id=$blog_id");
						$res = mysql_fetch_array($sqls);
					?>
							<form role="form" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    											
                                    	<div class="form-group">
                                            <label>Blog Title*:</label>
                                            <input class="form-control" name="blog_title"  placeholder="Blog Title" value="<?php echo $res['blog_title']; ?>" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Upload Images*:</label>
                                            <input type="file" class="form-control"  name="blog_images">
                                        </div>
										
																														
										<div class="form-group">
                                            <label>Blog Content*:</label>
                                             <textarea class="form-control" rows="3" name="blog_description" value="" id="address" placeholder="Blog Content" required><?php echo $res['blog_desc']; ?></textarea>
                                        </div>									
										
                                    <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                    
                                      
					<?php 
						if(isset($_POST['submit'])){
							
							try{
								$token="";
								$dbh = getConnection();
								$dbh->beginTransaction();
					
							$blog_id = $_REQUEST['id'];						
							$blog_title = mysql_real_escape_string($_POST['blog_title']);							
							$blog_desc = mysql_real_escape_string($_POST['blog_description']);
							
							
							
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
								//echo "Invalid file";
							}

														
							mysqli_query($con,"SET sql_mode = ''");
							
							if($blogimages !=""){
								$sql = mysqli_query($con,"UPDATE blog SET blog_images='$blogimages' WHERE blog_id=$blog_id");
							}
							
														
							$sql = mysqli_query($con,"UPDATE blog SET blog_title='$blog_title',blog_desc='$blog_desc' WHERE blog_id=$blog_id");
							
														
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
						window.location="Edit-Blog.php?id=<?php echo $_REQUEST['id'] ?>";				
					</script>
			
					<?php	
						}
					?>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>

	<script type="text/javascript">
	$(function(){
	 $(document).on('click','#submit',function(){ 
	
	
	var username = jQuery("#username").val();
	var password = jQuery("#password").val();
	var is_admin = jQuery("#is_admin").val();
	    
	if(username == ''){
			 alert("Company Name Required");
			 return false;
		 }
	
			
	
	var regphone = /^\d{10}$/;
	if(password == '' || isNaN(password) || !password.match(regphone)){
		alert("Enter the Valid Mobile Number");
		return false;
	}
	
	
	
	
	if(is_admin == ''){
			 alert("Address Required");
			 return false;
		 }
	
	

		});
	});

	</script>

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
