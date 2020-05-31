<?php
require_once('../back-end/includes/db.php');
?>
<?php
$SQP = $_GET['id'];
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
							<div class="search-form">
								<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
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
							<li><a href="index.html">Home</a></li>
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
			
			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
                            <?php 
                                $dbconnection;
                                $sql = "SELECT * FROM categories WHERE Cid='{$SQP}'";
                                $stmt = $dbconnection->query($sql);
                                while($DataRows=$stmt->fetch()){
                                    $CName = $DataRows['CName'];
                                
                            ?>
							<ul class="page-header-breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li><?php echo $CName; ?></li>
							</ul>
                            <h1><?php echo $CName; ?></h1>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
		</header>
		<!-- /Header -->
		
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
                            <!-- post -->
                            <?php 
                                $dbconnection;
                                $sql = "SELECT * FROM categories WHERE Cid='{$SQP}'";
                                $stmt = $dbconnection->query($sql);
                                while($DataRows=$stmt->fetch()){
                                $CName = $DataRows['CName'];
                                
                                $dbconnection;
                                $sqlp = "SELECT * FROM posts WHERE category='$CName' LIMIT 0,1";
                                $stmtp = $dbconnection->query($sqlp);
                                while($DataResult=$stmtp->fetch()){
                                    $id = $DataResult['id'];
                                    $title = $DataResult['title'];
                                    $datetime = $DataResult['datetime'];
                                    $image = $DataResult['image'];

                            ?>
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="../back-end/uploads/<?php echo $image; ?>" height="550px;" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2"><?php echo $CName; ?></a>
											<span class="post-date"><?php echo $datetime; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $title; ?></a></h3>
									</div>
								</div>
                            </div>
                            <?php }} ?>
							<!-- /post -->
										
                            <!-- post -->
                            <?php 
                                $dbconnection;
                                $sql = "SELECT * FROM categories WHERE Cid='{$SQP}'";
                                $stmt = $dbconnection->query($sql);
                                while($DataRows=$stmt->fetch()){
                                $CName = $DataRows['CName'];
                                
                                $dbconnection;
                                $sqlp = "SELECT * FROM posts WHERE category='$CName' LIMIT 1,2";
                                $stmtp = $dbconnection->query($sqlp);
                                while($DataResult=$stmtp->fetch()){
                                    $id = $DataResult['id'];
                                    $title = $DataResult['title'];
                                    $datetime = $DataResult['datetime'];
                                    $image = $DataResult['image'];

                            ?>
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="../back-end/uploads/<?php echo $image; ?>" height="250px" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2"><?php echo $CName; ?></a>
											<span class="post-date"><?php echo $datetime; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $title; ?></a></h3>
									</div>
								</div>
                            </div>
                            <?php }} ?>
							<!-- /post -->
							
							<div class="clearfix visible-md visible-lg"></div>
							
							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
							
                            <!-- post -->
                            <?php 
                                $dbconnection;
                                $sql = "SELECT * FROM categories WHERE Cid='{$SQP}'";
                                $stmt = $dbconnection->query($sql);
                                while($DataRows=$stmt->fetch()){
                                $CName = $DataRows['CName'];
                                
                                $dbconnection;
                                $sqlp = "SELECT * FROM posts WHERE category='$CName' LIMIT 3,4";
                                $stmtp = $dbconnection->query($sqlp);
                                while($DataResult=$stmtp->fetch()){
                                    $id = $DataResult['id'];
                                    $title = $DataResult['title'];
                                    $datetime = $DataResult['datetime'];
                                    $image = $DataResult['image'];
                                    $content = $DataResult['content'];

                            ?>
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="../back-end/uploads/<?php echo $image; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2"><?php echo $CName; ?></a>
											<span class="post-date"><?php echo $datetime; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $title; ?></a></h3>
                                        <p><?php
                                                if(strlen($content)>50){
                                                    $content = substr($content,0,250)."...";
                                                    echo $content;
                                                }
                                            ?></p>
									</div>
								</div>
                            </div>
                            <?php }} ?>
							<!-- /post -->
							
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
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
						
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Recent Posts</h2>
							</div>
							<?php 
								$dbconnection;
								$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 0,4";
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
								<a class="post-img" href="blog-post.php?id=<?php echo $Id; ?>"><img src="../back-end/uploads/<?php echo $Image; ?>" height="50px" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $Id; ?>"><?php echo $Title; ?></a></h3>
								</div>
							</div>
							<?php } ?>
						</div>
						<!-- /post widget -->
						
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
						
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">Jan 2018</a></li>
									<li><a href="#">Feb 2018</a></li>
									<li><a href="#">Mar 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
        <?php require_once('includes/footer.php') ?>