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
                    <h1 class="page-header">News Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           News
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
                                            <label>news Title*:</label>
                                            <input class="form-control" name="news_title"  placeholder="news Title" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Upload Images*:</label>
                                            <input type="file" class="form-control" name="news_images">
                                        </div>
										
																														
										<div class="form-group">
                                            <label>news Content*:</label>
                                             <textarea class="form-control" rows="3" name="news_description" id="address" placeholder="news Content" required></textarea>
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
											
							$news_title = mysql_real_escape_string($_POST['news_title']);							
							$news_description = mysql_real_escape_string($_POST['news_description']);
							$entry_date = date('Y-m-d');
							
							
							
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
								echo "Member Image Invalid file";
							}

							mysqli_query($con,"SET sql_mode = ''");
							
														
							$sql = mysqli_query($con,"INSERT INTO news (news_title,news_images,news_desc,entry_date) Values('$news_title','$newsimages','$news_description','$entry_date')");
							
							
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
						window.location="Create-News.php";				
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
