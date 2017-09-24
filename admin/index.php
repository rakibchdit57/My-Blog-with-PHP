<?php include "includes/admin_header.php";?>


    <div id="wrapper">
         <?php
         global $connection;
         if($connection) 
         echo " ";?>
                            
  
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                          
       
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Section</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             <!--   <li><a href="../index.php">Home</a></li>-->
                
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        
                         <?php
                        
                        if(isset($_SESSION['username']))
                        {
                            echo $_SESSION['username'];
                        }
                        
                        
                        
                        ?>
                        
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./post.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="./post.php?source=add_post">Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li>
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="./users.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </li>
                    <!--  <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Section
                            <small><?php echo $_SESSION['username'];?></small>
                           
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
                
                
                
                
                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                   <?php 
                        
                        $query="SELECT * FROM posts";
                        $select_all_posts=mysqli_query($connection,$query);
                        $post_counts=mysqli_num_rows($select_all_posts);
                   
                        echo  "<div class='huge'>{$post_counts}</div>";
                        
                    ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">  
                        <?php 
                        $query="SELECT * FROM comments";
                        $select_all_comments=mysqli_query($connection,$query);
                        $comment_counts=mysqli_num_rows($select_all_comments);
                        echo  "<div class='huge'>{$comment_counts}</div>";
                        ?> 
                        
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                        
                        $query="SELECT * FROM users";
                        $select_all_users=mysqli_query($connection,$query);
                        $user_counts=mysqli_num_rows($select_all_users);
                   
                        echo  "<div class='huge'>{$user_counts}</div>";
                        
                        ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
    
                        <?php 
                        $query="SELECT * FROM categories";
                        $select_all_categories=mysqli_query($connection,$query);
                        $category_count=mysqli_num_rows($select_all_categories);
                   
                        echo  "<div class='huge'>{$category_count}</div>";
                        
                        ?>
                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
     
    <?php
                
     $query="SELECT * FROM posts WHERE post_status='draft' ";
     $select_all_draft_posts=mysqli_query($connection,$query);                   $post_draft_counts=mysqli_num_rows($select_all_draft_posts);
                
     $query="SELECT * FROM comments WHERE comment_status='unapproved' ";
     $unapproved_comment_query=mysqli_query($connection,$query);                   $unapproved_comment_count=mysqli_num_rows($unapproved_comment_query);
                
                
     $query="SELECT * FROM users WHERE user_role='subscriber' ";
     $select_all_subscribers=mysqli_query($connection,$query);                   $subscribers_counts=mysqli_num_rows($select_all_subscribers);
                
    ?>            
                
                
                
                
                
    <div class="row">
      <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          /*['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 50, 40, 20],
          ['2015', 117, 46, 25],
          ['2016', 66, 112, 300],
          ['2017', 30, 700, 99]*/
            ['Data','Count'],
            <?php
            
            $element_text=['Active Post','Draft Post','Categoreis','Users','Comments','Pending Comments','Subscriber'];
            $element_count=[$post_counts,$post_draft_counts,$category_count,$user_counts,$comment_counts,$unapproved_comment_count,$subscribers_counts];
            for($i=0;$i<7;$i++)
            {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }
            ?>
                    
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
        <div id="columnchart_material" style="width: auto; height: 500px;"></div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
<?php include "includes/admin_footer.php";?>