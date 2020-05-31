<?php
require_once('../back-end/includes/db.php');
require_once('includes/front-includes.php');
?>
<?php $SQP = $_GET['id']; ?>
<?php

// date and time function
function datentime(){
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    return $DateTime;
}
if(isset($_POST['Submit'])){
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Comment = $_POST['Comment'];
	$DateTimeComment = datentime();
	
	$dbconnection;
	$sqlp = "INSERT INTO comments(datetime,name,email,comment,status,post_id)";
	$sqlp .= "VALUES (:DATEtime,:NAme,:emAIL,:COmment,'ON',:POSt_id)";
	$stmtp= $dbconnection->prepare($sqlp);
	$stmtp->bindValue(':DATEtime',$DateTimeComment);
	$stmtp->bindValue(':NAme',$Name);
	$stmtp->bindValue(':emAIL',$Email);
	$stmtp->bindValue(':COmment',$Comment);
	
	$stmtp->bindValue(':POSt_id',$SQP);
	$Execute = $stmtp->execute();

	if($Execute){
		

		header("Location:blog-post.php?id={$SQP}");
		
	}else{
		
		header("Location:blog-post.php?id={$SQP}");
		
	}
}

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
			
            <!-- Page Header -->
            <?php 
                $dbconnection;
                $sql = "SELECT * FROM posts WHERE id='$SQP'";
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
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('../back-end/uploads/<?php echo $Image; ?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html"><?php echo htmlentities($Category) ; ?></a>
								<span class="post-date"><?php echo htmlentities($DateTime) ; ?></span>
							</div>
							<h1><?php echo $Title; ?></h1>
						</div>
					</div>
				</div>
            </div>
            <?php } ?>
			<!-- /Page Header -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                
					<!-- Post content -->
					<div class="col-md-8">
                    <?php 
                    $dbconnection;
                    $sql = "SELECT * FROM posts WHERE id='$SQP'";
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
						<div class="section-row sticky-container">
							<div class="main-post">
								
								<p><?php echo nl2br($Content) ; ?></p>
                            </div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
                        </div>
                    <?php } ?>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
						
                        <!-- author -->
                        <?php 
                            $dbconnection;
                            $sql = "SELECT * FROM posts WHERE id='$SQP'";
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
                        <?php 
                            $dbconnection;
                            $sql = "SELECT * FROM admins WHERE aname='$Author'";
                            $stmta = $dbconnection->query($sql);
                            
                            while($DataRows=$stmta->fetch()){
                                $Aname = $DataRows['aname'];
                                $AImage = $DataRows['aimage'];
                                
                        ?>
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="../back-end/img/admins/<?php echo $AImage; ?>" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3><?php echo $Aname; ?></h3>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
                        </div>
                        <?php } ?>
                        <?php } ?>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								
								<h2><?php 
								$PostID = $SQP;
								// approvedCommentsPerPost($PostID);
								$Acomment = approvedCommentsPerPost($PostID); 
								
								if($Acomment==0){
									echo 'No Comments yet';
								}elseif($Acomment==1){
									echo '1 Comment';
								}else{
									echo $Acomment.' Comments';
								}
								?>
								
								</h2>
							</div>

							<div class="post-comments">
								
								<!-- comment -->
								<?php 
								$dbconnection;
								$sql = "SELECT * FROM comments where post_id='$SQP' AND status='ON' ORDER BY id DESC LIMIT 10";
								$stmt = $dbconnection->query($sql);
								while($DataRows = $stmt->fetch()){
									$DateTimeCommentW = $DataRows['datetime'];
									$NameW = $DataRows['name'];
									$CommentW = $DataRows['comment'];
								
								?>
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4><?php echo $NameW; ?></h4>
											<span class="time"><?php echo $DateTimeCommentW; ?></span>
										</div>
										<p><?php echo $CommentW; ?></p>

									</div>
								</div>
							<?php } ?>
								<!-- /comment -->
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a comment</h2>
								<p>Your email address will not be published. required fields are marked *</p>
							</div>
							<form class="post-reply" action="blog-post.php?id=<?php echo $SQP; ?>" method="POST">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="Name">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" type="email" name="Email">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="Comment" placeholder="Comment"></textarea>
										</div>
										<button class="primary-button" name="Submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
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
							$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5 ";
							$stmt = $dbconnection->query($sql);
							while($DataRows=$stmt->fetch()){
								$RecentID = $DataRows['id'];
								$RecentTitle = $DataRows['title'];
								$RecentImage = $DataRows['image'];
							
							?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?php echo $RecentID; ?>"><img src="../back-end/uploads/<?php echo $RecentImage; ?>" style="max-height: 100px;" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $RecentID; ?>"><?php echo $RecentTitle; ?></a></h3>
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
									<li><a href="#">January 2018</a></li>
									<li><a href="#">Febuary 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

<?php require_once('includes/footer.php') ?>