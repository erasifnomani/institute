<?php include('admin/db/db.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Myweb</title>
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
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
				<h2>News</h2>
			</div>
			<?php 							
				$news_id = $_REQUEST['news_id'];
				$sql = mysql_query("SELECT * FROM news WHERE news_id=$news_id");
				$res = mysql_fetch_array($sql);						
			?>
			<div class="col-md-8 blog-left" >
				<div class="blog-info">
					<div class="blog-info-text">
						<div class="blog-img">
							<img src="admin/newsimages/<?php echo $res['news_images']; ?>" alt=""/>
						</div>
						<h4><?php echo $res['news_title']; ?></h4>
						<p class="snglp"><?php echo $res['news_desc']; ?></p>
						
					</div>
					<div class="comment-icons">
						<ul>
							<li><span class="clndr"></span><?php echo $res['entry_date']; ?></li>
							<li><span class="admin"></span> <a href="#">Admin</a></li>
						</ul>
					</div>
					
				</div>
				<div class="coment-form">
					<h4>Leave your comment</h4>
					<form>
						<input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="text" value="Subject " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
						<input type="text" value="Email (will not be published)*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
						<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
						<input type="submit" value="SUBMIT" >
					</form>
				</div>
			</div>	
			<div class="col-md-4 single-page-right">
				<div class="category blog-ctgry">
					<h4>Blogs</h4>
					<div class="list-group">
					<?php 
						$sql = mysql_query("SELECT * FROM news Order by news_id desc Limit 0,8");
						while($res = mysql_fetch_array($sql)){
					?>
						<a href="single-news.php?news_id=<?php echo $res['news_id']; ?>" class="list-group-item"><?php echo $res['news_title']; ?></a>
					<?php }?>	
					
					</div>
				</div>	
				<div class="recent-posts">
					<h4>Recent posts</h4>
					<?php 
						$sql = mysql_query("SELECT * FROM news Order by news_id desc Limit 0,2");
						while($res = mysql_fetch_array($sql)){
					?>	
					<div class="recent-posts-info">
						<div class="posts-left sngl-img">
							<a href="single-news.php?news_id=<?php echo $res['news_id']; ?>"> <img src="admin/newsimages/<?php echo $res['news_images']; ?>" class="img-responsive zoom-img" alt=""/> </a>
						</div>
						<div class="posts-right">
							<label><?php echo $res['entry_date']; ?></label>
							<h5><a href="single-news.php?news_id=<?php echo $res['news_id']; ?>"><?php echo $res['news_title']; ?></a></h5>
							<p><?php 
									
									$string = strip_tags($res['news_desc']);

									if (strlen($string) > 100) {

										$stringCut = substr($string, 0, 100);

										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
									}
									echo $string;
									
							?>
							</p>
							<a href="single-news.php?news_id=<?php echo $res['news_id']; ?>" class="btn btn-primary hvr-rectangle-in">Read More</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				<?php }?>	
				
					<div class="clearfix"> </div>
				</div>				
			</div>
			<div class="clearfix"> </div>
		</div>	
</div>	
<!---->
<?php include('footer.php'); ?>