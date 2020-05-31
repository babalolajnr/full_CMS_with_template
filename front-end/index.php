<?php
require_once('../back-end/includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="index.php" class="logo"><img src="./img/logo.png" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
						<?PHP
							$dbconnection;
							$sql = "SELECT * FROM categories";
							$stmt= $dbconnection->query($sql);
							while($DataRows = $stmt->fetch()){
								$Category = $DataRows['CName'];
								$Cid = $DataRows['Cid'];
								$CAuthor = $DataRows['CAuthor'];
							
							?>
							
							<li class=""><a href="category.php?id=<?php echo $Cid; ?>"><?php echo $Category ?></a></li>
							<?php } ?>
						</ul>
						<!-- /nav -->

						<!-- search & aside toggle -->
						
						<div class="nav-btns">
							
							<button class="aside-btn"><i class="fa fa-bars"></i></button>
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<form action="search.php" method="get">
								<div class="search-form">
							
								<input class="search-input" type="text"  name="Search" placeholder="Enter Your Search ...">
							</form>
								<button class="search-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
						
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="#">Join Us</a></li>
							<li><a href="#">Advertisement</a></li>
							<li><a href="contact.html">Contacts</a></li>
						</ul>
					</div>
					<!-- /nav -->

					<!-- widget posts -->
					<div class="section-row">
						<h3>Recent Posts</h3>
						<?php 
                        $dbconnection;
                        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 0,3";
                        $stmt = $dbconnection->query($sql);
                        while($DataRows=$stmt->fetch()){
                            $Id = $DataRows['id'];
                            $Title = $DataRows['title'];
                            $DateTime = $DataRows['datetime'];
                            $Category = $DataRows['category'];
                            $Author = $DataRows['author'];
                            $Image = $DataRows['image'];
                            $Content = $DataRows['content'];
                        
                    	?>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.php?id=<?php echo $Id; ?>"><img src="../back-end/uploads/<?php echo $Image; ?>" height="50px;" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $Id; ?>"><?php echo $Title; ?></a></h3>
							</div>
						</div>
						<?php } ?>
					</div>
					<!-- /widget posts -->

					<!-- social links -->
					<div class="section-row">
						<h3>Follow us</h3>
						<ul class="nav-aside-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->
		</header>
		<!-- /Header -->


        <!-- section -->
        
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">	
					<!-- post -->
                    <?php 
                        $dbconnection;
                        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 0,2";
                        $stmt = $dbconnection->query($sql);
                        while($DataRows=$stmt->fetch()){
                            $Id = $DataRows['id'];
                            $Title = $DataRows['title'];
                            $DateTime = $DataRows['datetime'];
                            $Category = $DataRows['category'];
                            $Author = $DataRows['author'];
                            $Image = $DataRows['image'];
                            $Content = $DataRows['content'];
                        
                    ?>
                    <div class="col-md-6">
                    
						<div class="post post-thumb">
							<a class="post-img" onclick="clickCounter('.$Id.')" href="blog-post.php?id=<?php echo $Id; ?>"><img src="../back-end/uploads/<?php echo $Image; ?>" style="height: 300px" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html"><?php echo $Category; ?></a>
									<span class="post-date"><?php echo $DateTime; ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $Id; ?>"><?php echo $Title; ?></a></h3>
							</div>
                        </div>
                        
                    </div>
                    
                    <?php } ?>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>
                    <?php 
                        $dbconnection;
                        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 2,6";
                        $stmt = $dbconnection->query($sql);
                        while($DataRows=$stmt->fetch()){
                            $Id = $DataRows['id'];
                            $Title = $DataRows['title'];
                            $DateTime = $DataRows['datetime'];
                            $Category = $DataRows['category'];
                            $Author = $DataRows['author'];
                            $Image = $DataRows['image'];
                            $Content = $DataRows['content'];
                        
                    ?>
					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?php echo $Id; ?>"><img src="../back-end/uploads/<?php echo $Image; ?>" style="height: 250px;" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html"><?php echo $Category ?></a>
									<span class="post-date"><?php echo $DateTime ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $Id; ?>"><?php echo $Title; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
                    <?php } ?>
					
				</div>
				<!-- /row -->

				
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Other Posts</h2>
								</div>
							</div>
							<!-- post -->
							<?php
								$dbconnection;
								$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 8,4";
								$stmt = $dbconnection->query($sql);
								while($DataRows=$stmt->fetch()){
									$Id = $DataRows['id'];
									$Title = $DataRows['title'];
									$DateTime = $DataRows['datetime'];
									$Category = $DataRows['category'];
									$Author = $DataRows['author'];
									$Image = $DataRows['image'];
									$Content = $DataRows['content'];
							
							?>
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $Id; ?>"><img src="../back-end/uploads/<?php echo $Image; ?>" height="200px" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html"><?php echo $Category; ?></a>
											<span class="post-date"><?php echo $DateTime; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $Id; ?>"><?php echo $Title; ?></a></h3>
										<p><?php if(strlen($Content)>200){
											$Content = substr($Content,0,200)."...";
											echo $Content;
										} ?></p>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php 
							if(isset($_POST['LoadMore'])){
								// to be continued.....
							}
							?>
							<!-- /post -->

							<div class="col-md-12">
								<div class="section-row">
									<a href="index.php?loadMore=1"><button class="primary-button center-block" name="LoadMore">Load More</button></a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Categories</h2>
							</div>
							<?PHP
							$dbconnection;
							$sql = "SELECT * FROM categories";
							$stmt= $dbconnection->query($sql);
							while($DataRows = $stmt->fetch()){
								$Category = $DataRows['CName'];
								$Cid = $DataRows['Cid'];
								$CAuthor = $DataRows['CAuthor'];
							
							?>
							<div class="category-widget">
								<ul>
									<li><a href="category.php?id=<?php echo $Cid; ?>" class="cat-1"><?php echo $Category; ?></a></li>
								</ul>
							</div>
							<?php } ?>
						</div>
						<!-- /catagories -->
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
		<?php require_once('includes/footer.php') ?>