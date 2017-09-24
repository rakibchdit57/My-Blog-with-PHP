<?php include "includes/admin_header.php";?>
<?php include "function.php";?>
<?php ob_start();?>
    <div id="wrapper">

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
                <a class="navbar-brand" href="index.php">Admin Section</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                
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
                                <a href="./post.php">View All Post</a>
                            </li>
                            <li>
                                <a href="./post.php?source=add_post">Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                      <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-file"></i> Comments</a>
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
                            
                        </h1>
                       
                     <?php
                     if(isset($_GET['source'])) 
                     {$source=$_GET['source'];}
                        else{
                            $source='';
                        }
                        switch($source)
                        {
                          case 'add_post':
                          include "includes/add_post.php";
                          break;
                          
                            case 'edit_post':
                            include "includes/edit_post.php";
                            break;
                                                          
                            case '44':
                            echo "NICE 44";
                            break;
                                
                            default:
                            include "includes/view_all_comments.php";
                            break;
                        }
                        
                        
                        
                     ?>
                        
                        
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
<?php include "includes/admin_footer.php";?>
