<?php include('admin/db/db.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Myweb</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="University Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>

</head>
<body>
<!-- banner --> 
<div class="banner2">	  
	 <div class="header">
			 <div class="logo">
				 <a href="index.php"><img src="images/logo.jpg" alt=""/></a>
			 </div>
			 <div class="top-menu">
				 <span class="menu"></span>
				 <ul class="navig">
					 <li><a href="index.php">Home</a></li>
					 <li><a href="about.php">About</a></li>
					 <li class="active"><a href="blog.php">Blog</a></li>
					 <li><a href="gallery.php">Gallery</a></li>
					 <li><a href="contact.php">Contact</a></li>
				 </ul>
			 </div>
			 <!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$("ul.navig").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->
			 <div class="clearfix"></div>
	 </div>	  
</div>
<!---->
<!-- blog-page -->
<div class="blog">
		<div class="container">
			<div class="blog-head">
				<h2>Blog</h2>
			</div>
			<div class="col-md-8 blog-left" >
				<?php 
						$sql = mysql_query("SELECT * FROM blog Order by blog_id desc Limit 0,2");
						while($res = mysql_fetch_array($sql)){
				?>
				<div class="blog-info">
					<h3><a href="single.php?blog_id=<?php echo $res['blog_id']; ?>"><?php echo $res['blog_title']; ?></a></h3>
					<p>Posted By <a href="#">Admin</a> &nbsp;&nbsp; on march 2, 2015 &nbsp;&nbsp; <a href="#">Comments (10)</a></p>
					<div class="blog-info-text">
						<div class="blog-img">
							<a href="single.php"> <img src="admin/blogimages/<?php echo $res['blog_images']; ?>" class="img-responsive zoom-img" alt=""/></a>
						</div>
						<p class="snglp"><?php 
									
									$string = strip_tags($res['blog_desc']);

									if (strlen($string) > 500) {

										$stringCut = substr($string, 0, 500);

										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
									}
									echo $string;
									
								?></p>
						<a href="single.php?blog_id=<?php echo $res['blog_id']; ?>" class="btn btn-primary hvr-rectangle-in">Read More</a>
					</div>	
				</div>
				<?php 
					}
				?>
				
				
				
			</div>	
			<div class="col-md-4 single-page-right">
				<div class="category blog-ctgry">
					<h4>Blogs</h4>
					<div class="list-group">
						<?php 
						$sql = mysql_query("SELECT * FROM blog Order by blog_id desc Limit 0,8");
						while($res = mysql_fetch_array($sql)){
					?>
						<a href="single.php?blog_id=<?php echo $res['blog_id']; ?>" class="list-group-item"><?php echo $res['blog_title']; ?></a>
					<?php }?>
					</div>
				</div>	
				<div class="recent-posts">
					<h4>Recent posts</h4>
					<?php 
						$sql = mysql_query("SELECT * FROM blog Order by blog_id desc Limit 0,2");
						while($res = mysql_fetch_array($sql)){
					?>	
					<div class="recent-posts-info">
						<div class="posts-left sngl-img">
							<a href="single.php?blog_id=<?php echo $res['blog_id']; ?>"> <img src="admin/blogimages/<?php echo $res['blog_images']; ?>" class="img-responsive zoom-img" alt=""/> </a>
						</div>
						<div class="posts-right">
							<label><?php echo $res['entry_date']; ?></label>
							<h5><a href="single.php?blog_id=<?php echo $res['blog_id']; ?>"><?php echo $res['blog_title']; ?></a></h5>
							<p><?php 
									$pos=strpos($res['blog_desc'], ' ', 18);
									echo	substr($res['blog_desc'],0,$pos ).".."; 
								?>
							</p>
							<a href="single.php?blog_id=<?php echo $res['blog_id']; ?>" class="btn btn-primary hvr-rectangle-in">Read More</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				<?php }?>	
					
					<div class="clearfix"> </div>
				</div>				
			</div>
			<div class="clearfix"> </div>
			<nav>
				<ul class="pagination">
					<li>
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>	
	</div>	
	<!--//blog-->

<!---->
<?php include('footer.php'); ?>