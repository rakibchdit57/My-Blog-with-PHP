<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>
<?php
if(isset($_SESSION['user_id']))
{
    echo $_SESSION['user_id'];
   /* echo "<h1>We found</h1>";
     echo "<h1>We found</h1>";
     echo "<h1>We found</h1>";
     echo "<h1>We found</h1>";*/
    
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>eHut</title>

    <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="footer.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="sidebar.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script src="main.js"></script>
      
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">eHut</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
      <li><a href="about_us.php">About Us</a></li>
    
    </ul>
      <form class="navbar-form navbar-left" action="search.php" method="post">
      <div class="form-group">
        <input style="width:300px;" type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
         
        <div class="dropdown-menu" style="width:400px;">
            <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                <div class="col-md-3">Sl. No</div>
                    <div class="col-md-3">Product Image</div>
                    <div class="col-md-3">Product Name</div>
                    <div class="col-md-3">Price IN  $</div>
                </div>
                </div>
                <div class="panel-body">
                    <div id="cart_product">   
                        
                    </div>
            
        
                    </div>
                </div>
                <div class="panel-footer"></div>
            
        
            </div>
        </li>
         
      <!--<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
   <!--   <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        -->
        
        
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
                            <a href="cart.php" style="text-decoration:none;color:black;"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a>
                        </li>
                         
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        
                        
                    </ul>
                </li>
                
    </ul>
  </div>
</nav> 
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <!--<p><br></p>-->
      <div class="container-fluid">
      
      <div class="row">
         <div class="col-md-1"></div>
          <div class="col-md-2">
          <!--<div class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"><h4>Catgories</h4></a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
          </div>-->
              
    <?php       
    $query="SELECT * FROM categories";
    $select_category_query=mysqli_query($connection,$query);
    
    echo "<div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Catgories</h4></a></li>";
    
    while($row=mysqli_fetch_array($select_category_query))
    {
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
        echo "<li><a href='show_all_category1.php?cat_id={$cat_id}'>$cat_title</a></li>";
    }
    echo "</div>";
    ?>
         <!-- <div class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"><h4>Brands</h4></a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
          </div>
         -->
    <?php       
    $query="SELECT * FROM brands";
    $select_brands_query=mysqli_query($connection,$query);
    
    echo "<div class='nav nav-pills nav-stacked'>
            <li class='active'><a href='#'><h4>Brands</h4></a></li>";
    
    while($row=mysqli_fetch_array($select_brands_query))
    {
        $brand_id=$row['brand_id'];
        $brand_title=$row['brand_title'];
        echo "<li><a href='show_all_brand1.php?brand_id={$brand_id}'>$brand_title</a></li>";
    }
    echo "</div>";
    ?>
    
              
              
         <!-- <div class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"><h4>New Item</h4></a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
               <li><a href="#">Catgories</a></li>
          </div>-->
          
          </div>
          
          <!--product panel-->
          
          <div class="col-md-8">
              <div class="row">
                  <div class="col-md-12" id="product_message">
                  
                  </div>
              
              </div>
          <div class="panel panel-info">
          <div class="panel-heading">Products</div>
        <div class="panel-body">  
            <div id="get_product1"></div>

                
              
              </div>
              <div class="panel-footer">&copy;2017</div>
                  
          </div>
          
          </div>
          <div class="col-md-1"></div>
      </div>
             
      </div>
     <div class="row">
          
          <div class="col-md-12">
              
              <center>
              <ul class="pagination" id="pageno">
                  <li><a hrerf='#'>1</a></li>
                 
                  </ul>
              
              </center>
              
              </div>
          
          </div>

         <?php include "footer.php";?>
  </body>
       
</html>
 