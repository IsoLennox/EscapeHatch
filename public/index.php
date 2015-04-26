<?php require_once("../includes/session.php");
require_once("../includes/functions.php");
require_once("../includes/db_connection.php"); 
confirm_logged_in(); ?> 
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
    <?php include("../includes/layouts/nav.php"); ?>
      
  </div><!-- end nav-->
  <div id="page">
      
       <?php echo message(); ?>
       <h2>Logged In</h2>
<?php

// 1. make sure the user has created a profile
$profile=get_logged_in_user_profile();
$result_array=mysqli_fetch_assoc($profile);
 
if(empty($result_array)){
    echo "You have not created a profile!";
    echo "<br/>"; 
    echo "<a href='create_profile.php?user_id={$_SESSION["user_id"]}'>Create Your Profile Now</a>";
    
    
}else {
    
    // 2. if profile has been created, show ALL site users blog posts
    // I chose all site users instead of just friends as a "browse" feature               
                                 
$user_id = $_SESSION["user_id"];      
 
$query = "SELECT * FROM blog_posts ORDER BY post_id DESC";
$result = mysqli_query($connection, $query);
//iterate over all the rows
while($post = mysqli_fetch_assoc($result)){
 
    
    echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
    echo htmlentities($post["post_title"]);
echo "</div><br/>";
    echo "by: <a href='profile.php?user_id=";
    echo urlencode($post["user_id"]);
    echo "'>";
    echo htmlentities($post["author"]);
    echo "</a>";
        echo "<br/>";
    echo htmlentities($post["content"]);
    echo "</div><br/>";
    echo "<br/>";
    
    } 
}


?>
   </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>