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
                <a class="navbar-brand" href="#">Start Bootstrap</a>
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
                    
                   <li>
                        <a href="admin">Admin</a>
                    </li>
              <?php
            
                   /*if(isset($_SESSION['firstname']))
                   {*/
                     if(isset($_GET['p_id']))
                     $the_post_id=$_GET['p_id'];
                     echo "<li><a href='admin/post.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                       
                   /*}*/
                     
                 
                ?>
                          
                
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
                    if(isset($_GET['p_id']))
                    {
                        $the_post_id=$_GET['p_id'];
                    }
                    $query="SELECT * FROM posts WHERE post_id= $the_post_id";
                    $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                        ?>
                    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content?></p>
                <!--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
-->
                <hr>
         
                   <?php } ?>
                  
                <!-- Blog Comments -->
                <?php
                if(isset($_POST['create_comment']))
                {
                 $the_post_id=$_GET['p_id'];
                 $comment_author=$_POST['comment_author'];
                 $comment_email=$_POST['comment_email'];
                 $comment_content=$_POST['comment_content'];
                
                 if(!empty($comment_author)&&!empty($comment_email)&&!empty($comment_content)){
                     
                     $query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date )";
                $query.="VALUES($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";
                $create_comment_query=mysqli_query($connection,$query);
                if(!$create_comment_query){
                    die('QUERY FAILED'.mysqli_error($connetion));
                }
                
                    $query="UPDATE posts SET post_comment_count=post_comment_count+1 ";
                    $query.="WHERE post_id=$the_post_id ";
                    $update_comment_count=mysqli_query($connection,$query);
                
                }
                    else{
                        echo "<script>alert('Some field is not empty')</script>";
                    }
                     
                 }    
                
                    
                
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        
                      <div class="form-group">
                          <label for="Author">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        
                        <div class="form-group">
                            <label for="Author">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment"class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                $query="SELECT * FROM comments WHERE comment_post_id={$the_post_id} ";
                $query.="AND comment_status='approved' ";
                $query.="ORDER by comment_id DESC ";
                $select_comment_query=mysqli_query($connection,$query);
                if(!$select_comment_query)
                {
                    die('QUERY FAILED'.mysqli_error($connection));
                
                }
                
                while($row=mysqli_fetch_array($select_comment_query))
                {
                    $comment_date=$row['comment_date'];
                    $comment_content=$row['comment_content'];
                    $comment_author=$row['comment_author'];
                
                
                  ?>
                

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>
                        </h4>
                        <?php echo $comment_content;?>
                    </div>
                </div>

            <?php } ?>
            
            </div>
               

            <!-- Blog Sidebar Widgets Column -->
        
           <?php include "includes/sidebar.php";?>
       
        <!-- /.row -->

        <hr>
<?php
include "includes/footer.php";
?>
       