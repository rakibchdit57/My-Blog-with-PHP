<?php

function confirm($result)
{
    global $connection;
    
    if(!$result)
    {
        die("QUERY FAILED.".mysqli_error($connection));
    }
}



function insert_categories(){
 if(isset($_POST['submit']))
 {
     global $connection;
   $cat_title=$_POST['cat_title'];
   if($cat_title==""||empty($cat_title))
    {
      echo "This field should not be empty";
    }
    else 
    {
      $query="INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
      $create_categories_value=mysqli_query($connection,$query);
      if(!$create_categories_value)
        die('Query Failed'.mysqli_error());
     }
 }    
}
function find_all_categories(){
     global $connection;
     $query="SELECT * FROM categories";
     $select_catagoreies=mysqli_query($connection,$query);
     while($row=mysqli_fetch_assoc($select_catagoreies))
     {
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";
        echo "</tr>";
      }            
    
}
function delete_categories(){
        global $connection;
       if(isset($_GET['delete']))
       {
         $the_cat_id=$_GET['delete'];
         $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
         $delete_query=mysqli_query($connection,$query);
         header("Location: categories.php");
       }
}
?>