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
                        <a href="#"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li class="active">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./users.php">View All User</a>
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
                            <small>Rakib Ch.</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php insert_categories();?>
                        <form action="" method="post">
                           <div class="form-group">
                               <label for="cat-title">Add Category</label>
                            <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                            <?php
                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                include "includes/edit_categories.php";
                            }
                            ?>
                        </div>
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                             </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <?php //SELECT ALL
                                 find_all_categories();
                               ?>
                                
                                
                                <?php //DELETE
                                delete_categories();
                                ?>
                                 </tr>
                            </tbody>
                            </table>
                        </div>
         
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
<?php include "includes/admin_footer.php";?>
