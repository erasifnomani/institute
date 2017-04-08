<?php include('header.php'); ?>
	 <div class="slider">
		 <div class="caption">
			 <div class="container">
				  <div class="callbacks_container">
					  <ul class="rslides" id="slider">
						    <li><h3>All India No.1 Prelims assured Mock Test Series</h3></li>
							<li><h3>More than 50% regular results</h3></li>	
							<li><h3>Best Current Affairs for IAS Examination –Hindi and English.</h3></li>	
					  </ul>	
						<div class="clearfix"></div>
				  </div>
			  </div>
		  </div>
	  </div>
	  <div class="banner-grids">
		  <div class="container">
			 <div class="col-md-4 banner-grid">
				 <h3>Blog Feed</h3>
				 <div class="banner-grid-sec">
				 <?php 
					$sql = mysql_query("SELECT * FROM blog Order by blog_id desc Limit 0,2");
					while($res = mysql_fetch_array($sql)){
				 ?>
					 <div class="grid_info">
						 <div class="blg-pic">
							 <img src="admin/blogimages/<?php echo $res['blog_images']; ?>" class="img-responsive" alt="">
						 </div>
						 <div class="blg-pic-info">
							 <h4><a href="single.php?blog_id=<?php echo $res['blog_id']; ?>"><?php echo $res['blog_title']; ?></a></h4>
							 <p><?php 
									
									$string = strip_tags($res['blog_desc']);

									if (strlen($string) > 100) {

										$stringCut = substr($string, 0, 100);

										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
									}
									echo $string;
									
								?></p>
						 </div>
						 <div class="clearfix"></div>
					 </div>
				<?php 
					}
				?>	 
					 
					 <div class="more">
						 <a href="blog.php">See more from the Blog ></a>
					 </div>
				 </div>
			 </div>
			 <div class="col-md-4 banner-grid">
				 <h3>News Feed</h3>
				 <div class="banner-grid-sec">
					<?php 
						$sql = mysql_query("SELECT * FROM news Order by news_id desc Limit 0,2");
						while($res = mysql_fetch_array($sql)){
					?>
					 <div class="news-grid">
						 <h4><a href="single-news.php?news_id=<?php echo $res['news_id']; ?>"><?php echo $res['news_title']; ?></a></h4>
						 <p>
							<?php 
									
									$string = strip_tags($res['news_desc']);

									if (strlen($string) > 100) {

										$stringCut = substr($string, 0, 100);
										
										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
									}
									echo $string;
									
							?>		
						</p>
					 </div>
					<?php 
						}
					?> 						<div class="more">						 <a href="#">See more from the News ></a>						</div>
				 </div>
			 </div>
			 <div class="col-md-4 banner-grid">
				 <h3>Need guidance? Mail us</h3>
				 <div class="banner-grid-sec news_sec">
					 <div class="news-ltr">
					 </div>
					 <form>
						 <input type="text" placeholder="Email Address*" required="">
						 <input type="submit" value="SEND">
					 </form>
				 </div>
			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<!---->
<div class="welcome">
	 <div class="container">
		 <h2>"to be a winner, you must plan to win, prepare to win, and expect to win"</h2>
		 <div class="welcm_sec">
			 <div class="col-md-9 campus">
				 <div class="campus_head">
					 <h3>Welcome</h3>
					 <p>Prepare for Prelims and mains at one go. It empowers you to write the examination with confidence. The course is designed to discuss all possible areas in prelims and mains, writing practice and evaluation have given importance. The target is to make you in top 100. Discussion of topics with their current relevance makes one capable to write appealing answer in mains examination.</p>
				 </div>
				 <div class="col-md-4 wel_grid">
					 <img src="images/w1.jpg" class="img-responsive" alt=""/>
					 <h5><a href="#">Preparatory Programmes for Preliminary and main examinations</a></h5>
					 <p>We offer Regular and weekend batches for preliminary examination. Exclusive test series and clarification discussions in classes will help aspirant to qualify in the very first attempt. For main examination, we have result-oriented training in Public Administration, History and Geography. Writing practice and evaluation are the highlights of the programme. Your passionate aim and our quality make it come true.<br>					 Be with us					</p>
				 </div>
				 <div class="col-md-4 wel_grid">
					 <img src="images/w3.jpg" class="img-responsive" alt=""/>
					 <h5><a href="#">Winner’s Edge Mock Series – Rated All India No.1 Mock Series</a></h5>
					 <p>Revision Test Series for Preliminary and Main examinations: <br>					A “Prelims assured” success formula – which successfully producing direct questions, a record number of 60 plus direct questions in IAS Preliminary Examination 2016. Join our series to qualify in the first attempt. It is an essential preparation tool for every civil services aspirant, which gives a definite edge over others. Your prelim is assured!					</p>
				 </div>
				 <div class="col-md-4 wel_grid">
					 <img src="images/w2.jpg" class="img-responsive" alt=""/>
					 <h5><a href="#">Target 100 Integrated Foundation Programme:</a></h5>
					 <p>Prepare for Prelims and mains at one go. It empowers you to write the examination with confidence. The course is designed to discuss all possible areas in prelims and mains, writing practice and evaluation have given importance. The target is to make you in top 100. Discussion of topics with their current relevance makes one capable to write appealing answer in mains examination.</p>
				 </div>
				 
				 <div class="clearfix"></div>
				 
			 </div>
			 <div class="col-md-3 testimonal">
					<h3>Testimonials</h3>
					<div class="testimnl-grid">
						 <a href="#"><p>“The best current affairs compilation for IAS examination. Definitely a must reference material for Prelims and mains .Thanks for  the team dimensions” </p></a>
						 <h5></h5>
					</div>
					<div class="testimnl-grid">
						 <a href="#"><p>“Good number of questions from the Current Affairs plus magazine and test series in IAS prelims and mains..really helpful for serious candidates”</p></a>
						 <h5></h5>
					</div>
					<div class="testimnl-grid">
						 <a href="#"><p>“Regular Practice questions and discussions make the difference. The  lecture sessions are totally different from others”</p></a>
						 <h5></h5>
					</div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="news">
	 <div class="container">
		 <h3>Top News</h3>
		  <div class="event-grids">	
			<?php 
				$sql = mysql_query("SELECT * FROM news Order by news_id desc Limit 0,8");
				while($res = mysql_fetch_array($sql)){
			?>
		     <div class="col-md-4 event-grid">
				 <div class="date">
				     <h4><?php echo date("d",strtotime($res['entry_date'])); ?></h4>
					 <span><?php echo date("m",strtotime($res['entry_date'])).'/'.date("Y",strtotime($res['entry_date'])); ?></span>
				 </div>				 
			     <div class="event-info">
					  <h5><a href="single-news.php?news_id=<?php echo $res['news_id']; ?>"><?php echo $res['news_title']; ?></a></h5>
						<p><?php 
									
									$string = strip_tags($res['news_desc']);

									if (strlen($string) > 100) {

										$stringCut = substr($string, 0, 100);

										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
									}
									echo $string;
									
							?></p>					
				 </div>
				 <div class="clearfix"></div>				 			 
			 </div>
			 <?php 
				}
			 ?>
			 
			 
			 <div class="clearfix"></div>	
		 </div>
	 </div>
</div>
<!---->
<?php include('footer.php'); ?>