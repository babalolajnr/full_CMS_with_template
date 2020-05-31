  <!-- Left Sidebar -->
  <aside class="sidebar sidebar-left collapse navbar-collapse sidebarLeft">

<!-- Sidebar Wrapper -->
<div class="sidebar-wrapper">
    <br><br>
    <!-- Sidebar Navigation Wrapper -->
    <div class="sidebar-nav-wrapper">

        <!-- User Conatiner -->
        <div class="user-container dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                <div class="pull-left image">
                    <img src="img\admins\<?php echo $_SESSION['AImage']; ?>" class="img-thumbnail avatar bg-light-green" alt="user profile image">
                </div>
                <div class="pull-left info">
                    <h4 class="name"><?php echo $_SESSION['Aname']; ?></h4>
                    <h6 class="text-muted extra">System Administrator</h6> 
                </div>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="profile.php"><i class="fa fa-user fa-fw icon"></i>Profile</a></li>
                <li><a href="account.html"><i class="fa fa-cog fa-fw icon"></i>Account Settings</a></li> 
                <li><a href="timeline.html"><i class="fa fa-list fa-fw icon"></i>Activity Log</a></li> 
                <li class="divider"></li>
                <li><a href="lock-screen.html"><i class="fa fa-lock fa-fw icon"></i>Lock Account</a></li>
                <li><a href="signout.php"><i class="fa fa-sign-out fa-fw icon"></i>Sign Out</a></li>
            </ul>
        </div> 
        <!-- End User Conatiner -->

        <!-- Search Form Container -->
        <div class="search-form-container">
            <form class="search-form" role="search">
                <input type="text" placeholder="Search...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form> 
        </div>
        <!-- End Search Form Container -->

        <!-- Sidebar Navigation -->
        <ul class="sidebar-nav"> 

            <!-- Menu Item -->
            <li class="border-left-green">
                <a href="dashboard.php" title="Dashboard">
                    <i class="menu-icon fa fa-lg fa-fw fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>  
            <!-- End Menu Item -->

            <!-- Menu Item -->
            <li class="border-left-orange"> 
                <a href="posts.php">
                    <i class="menu-icon fa fa-lg fa-fw fa-file"></i> <span>Posts</span>
                </a>
            </li>   
            <!-- Menu Item -->
            <li class="border-left-purple">
                <a href="categories.php">
                    <i class="menu-icon fa fa-lg fa-fw fa-folder"></i> <span class="parent-item">Categories</span>
                </a>
            </li>
            <!-- End Menu Item --> 

            <!-- Menu Item -->
            <li class="border-left-orange">
                <a href="#">
                    <i class="menu-icon fa fa-lg fa-fw fa-users"></i> <span class="parent-item">Manage Admins</span>
                </a>
            </li> 
            <!-- End Menu Item -->

            <!-- Menu Item -->
            <li class="border-left-light-blue">
                <a href="../front-end/index.php" target="_blank">
                    <i class="menu-icon fa fa-lg fa-fw fa-cloud"></i> <span class="parent-item">Live Blog</span>
                </a> 
            </li> 
            <!-- End Menu Item -->

             <!-- Menu Item -->
             <li class="border-left-light-red">
                <a href="addnewpost.php">
                    <i class="menu-icon fa fa-lg fa-fw fa-plus"></i> <span class="parent-item">Add New Post</span>
                </a> 
            </li> 
            <!-- End Menu Item -->
            <!-- Menu Item -->
            <li class="border-left-light-blue">
                <a href="comments.php">
                    <i class="menu-icon fa fa-lg fa-fw fa-comment"></i> <span class="parent-item">Comments</span>
                </a> 
            </li> 
            <!-- End Menu Item -->
        </ul>
        <!-- End Sidebar Navigation -->

    </div> 
    <!-- End Sidebar Navigation Wrapper -->

</div>
<!-- End Sidebar Wrapper -->

</aside>
<!-- End Left Sidebar -->
