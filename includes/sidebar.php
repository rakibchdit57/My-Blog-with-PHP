
<div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search">
                        <span  class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                        </form>
                    <!-- /.input-group -->
                </div>
    

    
    <!-- /.LogIn -->
    <div class="well">
                    <h4>Log In Please..</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username:rico">
                    </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Enter Passsword:1234">
                        </div>
                      <!--<span class="input-group-btn">
                        <button class="btn btn-default" name="login" type="submit">Submit</button>
                        
                        </span>-->
                         <input class="btn btn-success" type="submit" name="login" value="Submit">
                        </form>
                    <!-- /.input-group -->
                </div>
    

                <!-- Blog Categories Well -->
                <div class="well">
                    
                    <?php
                    
                    $query="SELECT * FROM categories";
                    $select_catagoreies_sidebar=mysqli_query($connection,$query);
                    ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                              while($row=mysqli_fetch_assoc($select_catagoreies_sidebar))
                               {
                                 $cat_title=$row['cat_title'];
                                  $cat_id=$row['cat_id'];
                                 echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                               }            
                               ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
<!--
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
-->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              <!--  <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>-->

            </div>