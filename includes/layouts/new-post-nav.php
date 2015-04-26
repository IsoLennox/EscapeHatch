<?php require_once("../includes/session.php"); 
require_once("../includes/db_connection.php"); 
 ?> 
 <div id="newposts">
      <img src="images/icons/tiny-gallery.png"/><a href="upload_gallery.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>">Upload Image</a>  

      <img src="images/icons/tiny-newpost.png"/><a href="new_post.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>">New Post</a><br />


 </div>
     