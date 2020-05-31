<?php ob_start(); ?>
<?php 
require_once('includes/db.php'); 
require_once('includes/functions.php');
require_once('includes/session.php'); 
require_once('includes/header.php'); 
require_once('includes/sidebar.php'); 
confirmLogin();
$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF'];
?>
<body class="header-fixed skin-blue">

<!-- Header Section -->
<header>

    <!-- Product Logo -->
    <a href="javascript:void(0);" class="logo hidden-xs">
        <span class="icon">
            <i class="fa fa-cube"></i>
        </span>
        Curo
    </a>
    <!-- End Product Logo -->

    <!-- Header Navigation -->
    <nav class="navbar-main" role="navigation">

        <!-- Left Button Container -->
        <ul class="button-container pull-left">

            <li class="item">
                <!-- Left Sidebar Toggle Button -->
                <a id="sidebarLeftToggle" class="nav-button" data-toggle="collapse" data-target=".sidebarLeft">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span> 
                </a> 
            </li>

        </ul>
        <!-- End Left Button Container -->

        <!-- Navbar Content Center -->
        <div class="nav-content">
            <!-- Page Title -->
            <h3 class="page-title">Dashboard</h3>
            <!-- End Page Title --> 
        </div>
        <!-- End Navbar Content Center -->

    </nav>
    <!-- End Header Navigation -->

</header>
<!-- End Header Section -->


<!-- Page Content Wrapper -->
<aside class="content-wrapper sidebarLeft">

<!-- Page Content -->
<div class="content container-fluid sidebarRight animated fadeInUp"> 
<?php
echo errorMessage();
echo successMessage();
?>
    <div class="row">

        <div class="col-sm-5 col-lg-3">
            <div class="panel panel-white border-top-purple">
                <div class="panel-heading no-heading-border">
                    <h3 class="panel-title">System Statistics</h3>
                    <div class="controls pull-right"> 
                        <span class="pull-right clickable"><i class="fa fa-chevron-up"></i></span>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <input type="text" value="1" data-readOnly=true data-thickness=".15" data-height="145" data-width="145" class="dial-cpu"> 
                    <h5>Server Load</h5>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12"> 
                            <h6>Bandwidth - 40%</h6>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-light-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"> 
                                </div>
                            </div>
                        </div>  
                        <div class="col-xs-12"> 
                            <h6>Storage - 88%</h6>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%;"> 
                                </div>
                            </div>
                        </div>  
                        <div class="col-xs-12"> 
                            <h6>Memory - 68%</h6>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-light-orange" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-7 col-lg-9">
            <div class="panel panel-white border-top-green">
                <div class="panel-heading no-heading-border">
                    <h3 class="panel-title">Sales Chart</h3>
                    <div class="controls pull-right"> 
                        <ul class="nav nav-pills sales-chart-toggles pull-left">
                            <li class="active"><a href="javascript:void(0);" data-type="line">Line</a></li>
                            <li><a href="javascript:void(0);" data-type="cumulative">Cumulative</a></li>
                            <li><a href="javascript:void(0);" data-type="bar">Bar</a></li>
                        </ul> 
                    </div>
                </div>
                <div class="panel-body"> 
                    <div id="dynamic-chart"></div>
                </div> 
                <div class="panel-footer">
                    <div class="row"> 
                        <div class="col-sm-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-12 mg-btm-10">
                                    <h5>Most Downloaded Today <small class="mg-left-5">Total 330</small></h5>
                                </div> 
                                <div class="col-sm-12 col-lg-6">
                                    Product A (141)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-purple" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"> 
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-sm-12 col-lg-6">
                                    Product B (60)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-red" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"> 
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-12 col-lg-6">
                                    Product C (40)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"> 
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-12 col-lg-6">
                                    Product D (80)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"> 
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-12 mg-btm-10">
                                    <h5>Most Popular Today <small class="mg-left-5">Total 202</small></h5>
                                </div> 
                                <div class="col-sm-12 col-lg-6">
                                    Product C (102)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-purple" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"> 
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-sm-12 col-lg-6">
                                    Product B (60)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-red" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"> 
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-12 col-lg-6">
                                    Product A (40 
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"> 
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-12 col-lg-6">
                                    Product A (40 
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-light-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"> 
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>  
                    </div>
                </div>
            </div>
        </div> 

        <div class="col-sm-6 col-lg-3">
            <div class="well social-tile facebook">
                <i class="fa fa-facebook fa-5x icon"></i>
                <h4>112 Likes</h4>
            </div>
        </div> 
        <div class="col-sm-6 col-lg-3">
            <div class="well social-tile twitter">
                <i class="fa fa-twitter fa-5x icon"></i>
                <h4>80 Followers</h4>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="well social-tile google-plus">
                <i class="fa fa-google-plus fa-5x icon"></i>
                <h4>883 Followers</h4>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="well social-tile youtube">
                <i class="fa fa-youtube fa-5x icon"></i>
                <h4>23.9k Views</h4>
            </div>
        </div>  

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-light-blue bg-light-blue color-white">
                <div class="panel-body">
                    <h3 class="mg-top-0">Visitors</h3>
                    <p>876 in last 24 hours</p>
                </div>
                <div class="progress progress-xs mg-btm-0">
                    <div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;"> 
                    </div>
                </div>
                <div class="panel-body text-right">
                    <h4>65.5% increase</h4>
                    <p>in visitors to our site</p>
                </div>
            </div>
        </div> 

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-light-green bg-light-green color-white">
                <div class="panel-body">
                    <h3 class="mg-top-0">Sales</h3>
                    <p>324 in last 24 hours</p>
                </div>
                <div class="progress progress-xs mg-btm-0">
                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"> 
                    </div>
                </div>
                <div class="panel-body text-right">
                    <h4>80.0% increase</h4>
                    <p>in software sales.</p>
                </div>
            </div>
        </div> 

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-light-orange bg-light-orange color-white">
                <div class="panel-body">
                    <h3 class="mg-top-0">Downloads</h3>
                    <p>123 in last 24 hours</p>
                </div>
                <div class="progress progress-xs mg-btm-0">
                    <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="25.2" aria-valuemin="0" aria-valuemax="100" style="width: 25.2%;"> 
                    </div>
                </div>
                <div class="panel-body text-right">
                    <h4>25.2% decrease</h4>
                    <p>in app downloads</p>
                </div>
            </div>
        </div> 

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-light-purple bg-light-purple color-white">
                <div class="panel-body">
                    <h3 class="mg-top-0">New Members</h3>
                    <p>80 in last 24 hours</p>
                </div>
                <div class="progress progress-xs mg-btm-0">
                    <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100" style="width: 47%;"> 
                    </div>
                </div>
                <div class="panel-body text-right">
                    <h4>47% increase</h4>
                    <p>in the number of new members.</p>
                </div>
            </div>
        </div> 
    
        <div class="col-sm-8">
            <div class="panel panel-white"> 
                <div id="mini-clndr">
                    <script id="mini-clndr-template" type="text/template">

                        <div class="clndr-controls">
                            <div class="clndr-control-button">
                                <span class="clndr-previous-button">previous</span>
                        </div> 
                            <div class="month">
                                <%=month %>
                        </div>
                            <div class="clndr-control-button rightalign">
                                <span class="clndr-next-button">next</span>
                        </div> 
                        </div>

                        <table class="clndr-table" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr class="header-days">
                                    <% _.each(daysOfTheWeek, function(day) { %>
                                        <td class="header-day">
                                            <%=day %>
                        </td>
                                        <% }); %>
                        </tr> 
                        </thead>
                            <tbody class="days-container">
                                <tr> 
                                    <% var cnt = 0;
                                    _.each(days, function(day) { 
                                    cnt+=1;
                                    if(cnt%7 != 0) {%>
                                        <td class="<%= day.classes %>" id="<%= day.id %>">
                                            <div class="day-contents"><%=day.day %></div>
                        </td>
                                   <% } else { %>
                        </tr>
                                        <tr>
                                            <td class="<%= day.classes %>" id="<%= day.id %>">
                                                <div class="day-contents"><%=day.day %></div>
                        </td>
                                    <% }
                                    }); %> 
                        </tr>
                        </tbody>
                            <div class="events">
                                <div class="header">
                                    <div class="x-button">x</div>
                                    <div class="event-header">MONTHS EVENTS</div>
                        </div>
                                <div class="events-list">
                                    <% _.each(eventsThisMonth, function(event) { %>
                                        <div class="event">
                                            <a href="<%= event.url %>">
                                                <b><%=moment(event.date).format( 'MMMM Do') %>:</b>
                                                    <%=event.title %>
                        </a>
                        </div>
                                        <% }); %>
                        </div>
                        </div>
                        </table>

                    </script>
                </div>
            </div>
        </div>
    
        <div class="col-sm-4">
            <div class="well well-solid bg3 weather"> 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="top">
                            <h3 class="title">Today : 28°C</h3> 
                            <h5>Kingston, Jamaica</h5>
                            <canvas id="weatherToday" width="512" height="512"></canvas> 
                        </div>
                    </div>
                    <div class="col-xs-4 mg-top-10">
                        <canvas id="weatherDay1" width="256" height="256"></canvas> 
                        <h5>Sat : 21°C</h5>
                    </div>
                    <div class="col-xs-4 mg-top-10">
                        <canvas id="weatherDay2" width="256" height="256"></canvas> 
                        <h5>Sun : 28°C</h5>
                    </div>
                    <div class="col-xs-4 mg-top-10">
                        <canvas id="weatherDay3" width="256" height="256"></canvas> 
                        <h5>Mon : -5°C</h5>
                    </div>
                </div>
            </div>
        </div> 
        
    </div>

</div>
<!-- End Page Content -->

</aside>
<!-- End Page Content Wrapper -->




<?php require_once('includes/footer.php') ?>
<?php ob_flush(); ?>