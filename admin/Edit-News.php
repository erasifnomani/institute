<?php 
error_reporting(0);
include('header.php'); 
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update News</h1>
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
						$news_id = $_REQUEST['id'];
						$sqls = mysql_query("SELECT * FROM news WHERE news_id=$news_id");
						$res = mysql_fetch_array($sqls);
					?>
							<form role="form" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    											
                                    	<div class="form-group">
                                            <label>News Title*:</label>
                                            <input class="form-control" name="news_title"  placeholder="news Title" value="<?php echo $res['news_title']; ?>" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Upload Images*:</label>
                                            <input type="file" class="form-control"  name="news_images">
                                        </div>
										
																														
										<div class="form-group">
                                            <label>News Content*:</label>
                                             <textarea class="form-control" rows="3" name="news_description" value="" id="address" placeholder="news Content" required><?php echo $res['news_desc']; ?></textarea>
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
					
							$news_id = $_REQUEST['id'];						
							$news_title = mysql_real_escape_string($_POST['news_title']);							
							$news_desc = mysql_real_escape_string($_POST['news_description']);
							
							
							
							if ((($_FILES["news_images"]["type"] == "image/gif")
								|| ($_FILES["news_images"]["type"] == "image/jpeg")
								|| ($_FILES["news_images"]["type"] == "image/JPG")
								|| ($_FILES["news_images"]["type"] == "image/png")
								|| ($_FILES["news_images"]["type"] == "image/pjpeg"))
								&& ($_FILES["news_images"]["size"] < 10000000))
								{
							if ($_FILES["news_images"]["error"] > 0)
								{
								echo "Return Code: " . $_FILES["news_images"]["error"] . "<br />";
								exit;
							}
								else
							{
								$newsimages = $_FILES["news_images"]["name"];
								move_uploaded_file($_FILES["news_images"]["tmp_name"],
								"newsimages/" . $newsimages);
							}
							}
							else
							{
								//echo "Invalid file";
							}

														
							mysqli_query($con,"SET sql_mode = ''");
							
							if($newsimages !=""){
								$sql = mysqli_query($con,"UPDATE news SET news_images='$newsimages' WHERE news_id=$news_id");
							}
							
														
							$sql = mysqli_query($con,"UPDATE news SET news_title='$news_title',news_desc='$news_desc' WHERE news_id=$news_id");
							
														
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
						window.location="Edit-News.php?id=<?php echo $_REQUEST['id'] ?>";				
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
