<?php include('header.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Login Account</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
					<?php 
						$id = $_REQUEST['id'];
						$sqls = mysql_query("SELECT * FROM login WHERE id=$id");
						$res = mysql_fetch_array($sqls);
					?>
                                    <form role="form" method="post">
										<div class="form-group">
                                            <label>Login Account Name*:</label>
                                            <p class="help-block"><input class="form-control"  name="username"  value="<?php echo $res['username']; ?>"  id="username" placeholder="Username Name" readonly required></p>
                                        </div>
										
                                        <div class="form-group">
                                            <label>User Type*:</label>
											<select name="user_type" id="user_type" class="form-control">
												<option value="">-- select --</option>							
												<option <?php  if($res['user_type']=="Admin"){ echo "selected"; } ?> value="Admin">Admin</option>							
												<option  <?php  if($res['user_type']=="Student"){ echo "Student"; } ?> value="Provider">Student</option>												
											</select>
                                        </div>
                                                                                
                                        <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <fieldset>
                                        <div class="form-group">
                                            <label>Password:*</label>
                                            <input class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $res['password']; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Is Admin*:</label>
											  <select name="is_admin" id="is_admin" class="form-control">
												<option value="">-- select --</option>							
												<option  <?php  if($res['is_admin']== 1){ echo "selected"; } ?> value="1">Yes</option>							
												<option  <?php  if($res['is_admin']== 0){ echo "selected"; } ?> value="0">No</option>
                                        </div>
										
                                        </fieldset>
                                    
                                    
                                    
                                    </form>
					<?php

						if(isset($_POST['submit'])){
							$id = $_REQUEST['id'];
							$username = mysql_real_escape_string($_POST['username']);
							$password = mysql_real_escape_string($_POST['password']);
							$user_type = mysql_real_escape_string($_POST['user_type']);
							$is_admin = mysql_real_escape_string($_POST['is_admin']);
							
							$sql = "Update login SET username='$username',password='$password',user_type='$user_type',is_admin='$is_admin' WHERE id=$id";

							mysql_query($sql);
							echo "<script type='text/javascript'> alert('SuccessFully Added......!'); window.location.href = 'View-Login-Account.php';</script>";
							
						}

					?>
					
                                </div>
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
