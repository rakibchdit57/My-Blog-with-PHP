<?php include "includes/admin_header.php";?>
<?php include "function.php";?>
<?php ob_start();?>

 <?php
  if(isset($_SESSION['username']))
   {
      $username=$_SESSION['username'];
      $query="SELECT * FROM users WHERE username='{$username}' ";
      $select_user_profile_query=mysqli_query($connection,$query);
      
      while($row=mysqli_fetch_array($select_user_profile_query))
      {
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_password=$row['user_password'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
        
      }
   }
  ?>
<?php

if(isset($_POST['edit_user']))
{

    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

   /* $post_comment_count=4;*/
    
    /*move_uploaded_file($post_image_temp,"../images/$post_image");*/
    
     $query="UPDATE users SET ";
     $query.="user_firstname='{$user_firstname}', ";
     $query.="user_lastname='{$user_lastname}', ";
     $query.="user_role='{$user_role}', ";
     $query.="username='{$username}', ";
     $query.="user_email='{$user_email}', ";
     $query.="user_password='{$user_password}' ";
     $query.="WHERE username='{$username}' ";
    
    $edit_user_query=mysqli_query($connection,$query);
    confirm($edit_user_query);
   
}





?>
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
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Home</a></li>
                
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="#">View Post</a>
                            </li>
                            <li>
                                <a href="#">Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                      <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
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
                       
                     
<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
<label for="title">Firstname</label>
    <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="user_firstname">
</div>
    
    <div class="form-group">
<label for="post_status">Lastname</label>
    <input type="text" value="<?php echo $user_lastname?>" class="form-control" name="user_lastname">
</div>   
    <div class="form-group">

        <select name="user_role" id="">
            <option value="subscriber"><?php echo $user_role?></option>
            <?php
            if($user_role=='admin')
            {
                echo "<option value='subscriber'>Subscriber</option>";
            }
           else
           {
               echo "<option value='admin'>Admin</option>";
           }
            ?>
        </select>
</div>
    <div class="form-group">
<label for="post_tags">Username</label>
    <input type="text" value="<?php echo $username?>" class="form-control" name="username">
</div>
    
    <div class="form-group">
<label for="post_content">Email</label>
        <input type="text" value="<?php echo $user_email?>" class="form-control" name="user_email">
</div>
     <div class="form-group">
<label for="post_content">Password</label>
        <input type="password" value="<?php echo $user_password?>" class="form-control" name="user_password">
</div>
    
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value= "Update User">
    </div>
</form>                
                    
                    
            </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
<?php include "includes/admin_footer.php";?>
