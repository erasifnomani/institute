<?php include('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           View Member
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Member Id</th>
                                            <th>Name</th>
                                            <th>Email Id</th>
                                            <th>Mobile No</th>
                                            <th>Member Photo</th>
                                            <th>KYC Images</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$sql = mysql_query("SELECT * FROM member");
										while($res = mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $res['member_id']; ?></td>
                                            <td><?php echo $res['name']; ?></td>
                                            <td><?php echo $res['email_id']; ?></td>
                                            <td><?php echo $res['mobile_no']; ?></td>
                                            <td><img src="memberimage/<?php echo $res['member_image']; ?>" style="width: 116px;height: 23px;"></td>
                                            <td><img src="kycimages/<?php echo $res['kyc']; ?>" style="width: 116px;height: 23px;"></td>
                                            <td><?php echo $res['address']; ?></td>
                                            <td><?php if($res['active_status'] == 0){ echo "Pending"; }else{ echo "Approved"; }?></td>
                                            <td class="center"><a href="Edit-Member.php?member_id=<?php echo $res['member_id']; ?>">Edit</a> | 
											<?php if($res['active_status'] == 0){  ?> 
												<a href='View_Member_Registration.php?memberid=<?php echo $res['member_id']; ?>'>Approve</a>
											<?php }else{ ?>
												<a href='View_Member_Registration.php?memberdeactive=<?php echo $res['member_id']; ?>'>Deactive</a>
											<?php } ?>
											</td>
                                        </tr>
									<?php 
										}
									?>	
                                    
                                    </tbody>
                                </table>
								
								<?php 
									if(!empty($_REQUEST['memberid'])){
										$member_id = $_REQUEST['memberid'];
										$sql = mysqli_query($con,"UPDATE member SET active_status=1 WHERE member_id=$member_id");
										
										$entry_date = date('Y-m-d');
										
										$login_account = $_SESSION['username']['id'];
										
										$sql = mysqli_query($con,"INSERT INTO approve_member (member_id,active_status,login_id,update_date) VALUES('$member_id','1','$login_account','$entry_date')");	
										
										
										$sql = mysqli_query($con,"SELECT * FROM member WHERE member_id=$member_id");
										$res = mysqli_fetch_array($sql); 
										$fmobile = $res['mobile_no'];
										
										
										$ipaddress = $_SERVER['REMOTE_ADDR'];
										$login_id = $_SESSION['username']['id'];
										
										$Text = "Hello Member Your Account Has Been Active Your Id No $member_id";
										
										$msglng = strlen($Text);
										
										if($msglng<=160){
											$cnt = 1;
										}else if($msglng>160 && $msglng<320){
											$cnt = 2;
										}else if($msglng>320 && $msglng<480){
											$cnt = 3;
										}else if($msglng>480 && $msglng<640){
											$cnt = 4;
										}else if($msglng>640 && $msglng<800){
											$cnt = 5;
										}else if($msglng>800 && $msglng<960){
											$cnt = 6;
										}else if($msglng>960 && $msglng<1120){
											$cnt = 7;
										}else if($msglng>1120 && $msglng<1280){
											$cnt = 8;
										}else if($msglng>1280 && $msglng<1440){
											$cnt = 9;
										}else if($msglng>1440 && $msglng<1600){
											$cnt = 10;
										}
										
										
										//$url="http://sms.infoquicker.com//api/sendmsg.php?user=$IDB&pass=$PwdB&sender=$SenderId&phone=$fmobile&text=$Text&priority=ndnd&stype=normal"; 
					
										//$ret = file($url);
										
										mysqli_query($con,"SET sql_mode = ''");
										
										$sql = "INSERT INTO message(mobile_no,member_id,text,login_id,ip,cnt,msglng) VALUES('$fmobile','$member_id','$Text','$login_id','$ipaddress','$cnt','$msglng')";
										
										(mysqli_query($con,$sql))? $token="success" : $token="fail";
										
										echo "<script>alert('Approve Successfully'); window.location='View_Member_Registration.php'</script>";
										
									}
								?>
								
								<?php 
									if(!empty($_REQUEST['memberdeactive'])){
										$member_id = $_REQUEST['memberdeactive'];
										$sql = mysqli_query($con,"UPDATE member SET active_status=0 WHERE member_id=$member_id");
										
										$entry_date = date('Y-m-d');
										
										$login_account = $_SESSION['username']['id'];
										
										$sql = mysqli_query($con,"INSERT INTO approve_member (member_id,active_status,login_id,update_date) VALUES('$member_id','0','$login_account','$entry_date')");	
										
										echo "<script>alert('Deactive Successfully'); window.location='View_Member_Registration.php'</script>";
										
									}
								?>
								
                            </div>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            
            
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

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
