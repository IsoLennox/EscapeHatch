<?php require_once("../includes/session.php"); 
require_once("../includes/functions.php"); 
require_once("../includes/db_connection.php"); 
confirm_logged_in(); 
//user_id passed through URL from 'VIEW PROFILE' link 
$user_id=$_GET["user_id"]; 
include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
      <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
    
    <?php

//CHECK IF YOUR PROFILE
      if($user_id == $_SESSION["user_id"]){?>
    <div id="quick-post">
         <h2>New Post</h2>
    <form action="new_post.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post">
      <p>
        <input type="text" name="post_title" value="" placeholder="Post Title" />
      </p>
       
      <p> 
        <textarea name="content" rows="5" cols="80" placeholder="Write a new post!"></textarea>
      </p>
      <input type="submit" name="submit" value="Create Post" />
    </form>
    </div>
     <?php } ?>
    
  <div id="page">
      
       <?php echo message(); ?>
      
<?php 
    $result=find_user_blog_posts($user_id);    
                                                                
//$query = "SELECT * FROM blog_posts WHERE user_id = {$user_id} ORDER BY post_id DESC";
//$result = mysqli_query($connection, $query);
$result_array = mysqli_fetch_assoc($result);
 $author=$result_array["author"]; 
 
?>
        <h2>
            <?php //check for posts, so that "author" isn't empty
            if(empty($author)){
                echo "This user has no blog posts";
            }else{
             echo "<h2>".$author."'s Blog</h2>";
             echo "<a href='profile.php?user_id=".$user_id."'>View Profile</a>";
            }
?>
      
      
      </h2>
          <br />

        
        <ul>
  
      
<?php
//while($post = mysqli_fetch_assoc($result)){ 
foreach($result as $post){ 

    //if user_id == post user_id, give options to edit posts
    
    echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
    echo htmlentities($post["post_title"]);
    echo "</div><br/>";
    echo "by: <a href='profile.php?user_id=";
    echo urlencode($post["user_id"]);
    echo "'>";
    echo htmlentities($post["author"]);
    echo "</a>";
        echo "<br/><br />";
    echo $post["content"];
    echo "<br /><br/>";
    if($user_id === $_SESSION["user_id"]){
    echo "<a href='edit_post.php?post_id={$post["post_id"]}'>EDIT</a><br/>";
    }
    echo "</div><br/>";
    echo "<br/>";
    
}
                                 
 
                                 
?>
      </ul>      
      </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>