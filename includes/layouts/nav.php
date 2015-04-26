<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php confirm_logged_in(); ?> 

<?php  

//GET IMAGE FROM DB
    
    $query = "SELECT * FROM gallery WHERE user_id = {$_SESSION["user_id"]} AND pi = 1 ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
         echo "<img class='profileImg' src='uploads/default.png' alt='profileImg'/>";
        

    }else {
        //get image

        echo "<a href='profile.php?user_id=".$_SESSION["user_id"]."'><img class='thumb' src='".$image_array["path"]."' alt='profileImg'/></a>";
    }
    



?>

<h2><a href="profile.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>"><?php echo htmlentities($_SESSION["username"]); ?></a><br /></h2>
    <br /> 
      
      
 




      <img src="images/icons/tiny-contacts.png"/><a href="view_contacts.php">Contacts</a><br />

      <img src="images/icons/tiny-gallery.png"/><a href="gallery.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>">My Gallery</a><br />
      <img src="images/icons/tiny-newpost.png"/><a href="blog.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>">My Blog</a><br />
          
    <img src="images/icons/tiny-feedview.png"/><a href="post_feed.php">Blog Feed</a><br />
                        
      <img src="images/icons/tiny-settings.png"/><a href="account_settings.php">Settings</a><br />

      
          
      <img src="images/icons/tiny-search.png"/><a href="all_posts.php">Browse All</a><br />

<br/>
<br/>
<br/><a id="small-link" href="background_image.php">Change Background Image</a>
     