<?php include "includes/header.php";?>
<?php include "includes/db.php";?>

    <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Test Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    
                    $query="SELECT * FROM categories";
                    $select_all_catagoreies_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_catagoreies_query))
                    {
                        $cat_title=$row['cat_title'];
                         echo "<li><a href='#'>{$cat_title}</a></li>";
                    }
                    
                    ?>
                    
               <!--    <li>
                        <a href="admin">Admin</a>
                    </li>-->
<!--
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                     <?php
                    if(isset($_GET['category']))
                    {
                        $post_category_id=$_GET['category'];
                    }
                    
                    $query="SELECT * FROM posts WHERE post_category_id=$post_category_id";
                    $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['date'];
                        $post_image=$row['post_image'];
                        $post_content=substr($row['post_content'],0,100);
                        ?>
                    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
         
                   <?php } ?>
            </div>
               

            <!-- Blog Sidebar Widgets Column -->
        
           <?php include "includes/sidebar.php";?>
       
        <!-- /.row -->

        <hr>
<?php
include "includes/footer.php";
?>
       