
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
					 <li><a href="blog.php">Blog</a></li>
					 <li><a href="gallery.php">Gallery</a></li>
					 <li class="active"><a href="contact.php">Contact</a></li>
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
<!--contact-->
<div class="contact">
	 <div class="container">
		 <div class="main-head-section">
					<h2>Contact</h2>
			<div class="contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1749.3401641222763!2d77.2028716582301!3d28.729097995594998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfe1a45b9b6db%3A0xf652c0efc357ba95!2sHardev+Nagar!5e0!3m2!1sen!2sin!4v1487326628251" width="100%" height="151" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		 </div>
		 <div class="contact_top">			 		
			 <div class="col-md-8 contact_left">
			 		<h4>Below Type Here</h4>
			 		<p></p>
					<form>
					  <div class="form_details">
					      <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
						  <input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
						  <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
						  <textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
						  <div class="clearfix"> </div>
						 <div class="sub-button">
							 <input type="submit" value="Send message">
						 </div>
					  </div>
				   </form>
			 </div>
			 <div class="col-md-4 company-right">
				 <div class="company_ad">
						<h3>Address</h3>
						<span></span>
			      	 <address>
						 <p>email : <a href="mailto:example@mail.com">info@display.com</a></p>
						 <p>phone : 09895250400, 07291070763</p>
						 <p>IIIrd Floor, House number 1 , Hardev Nagar,, Tiranga chowk, Jharoda Majra -New Delhi 84</p>
						 <p>24/104 N & O, 1st floor, Athady building, Kaloor Road, Mankavu post, Calicut 07-Kerala </p>									 	 	
					 </address>
				 </div>
			 </div>	
				<div class="clearfix"> </div>
		  </div>
	 </div>
</div>
<!---->
<?php include('footer.php'); ?>