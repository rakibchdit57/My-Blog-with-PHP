
<?php
if(isset($_POST['create_post']))
{
    $post_title=$_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_category_id=$_POST['post_category_id'];
    $post_status=$_POST['post_status'];
    
    
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    
    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
    
   /* $post_comment_count=4;*/
    
    move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query="INSERT INTO posts(post_category_id,post_title,post_author,date,post_image,post_content,post_tags,post_status) VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') "; 
    
    $create_post_category=mysqli_query($connection,$query);
    
    confirm($create_post_category);
    
    $the_post_id=mysqli_insert_id($connection);
    
    echo "<p class='bg-success'>Post Created.<a href='../post.php?p_id={$the_post_id}'>View post</a>or<a href='post.php'>Edit Post</a></p>";
}

?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
</div>
    
    <div class="form-group">
<label for="post_category">Post Category</label>
  
        <!--<input type="text" class="form-control" name="post_category_id">-->
        
<!--
<label for="post_category">Post Category</label>
    <input value="?>" type="text" class="form-control" name="post_category_id">
-->
        <select name="post_category_id" value="">
        
        <?php
            global $connection;
            $query="SELECT * FROM categories";
            $select_categories=mysqli_query($connection,$query);
            confirm($select_categories);
            while($row=mysqli_fetch_assoc($select_categories))
            {
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            
        ?>
        
        </select>
</div>
    
    <div class="form-group">
<label for="title">Post Author</label>
    <input type="text" class="form-control" name="post_author">
</div>
    
    <div class="form-group">
<label for="post_status"></label>
    
        <select name="post_status" value="">
          
            <option value="draft">Post Status</option>
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
            
        </select>
        
        
        
       <!-- <input type="text" class="form-control" name="post_status">-->
</div>
    
    <div class="form-group">
<label for="post_image">Post Image</label>
    <input type="file" name="image">
</div>
    
    <div class="form-group">
<label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>
    
    <div class="form-group">
<label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>
    
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>