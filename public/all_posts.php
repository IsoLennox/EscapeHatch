<?php require_once("../includes/session.php"); 
require_once("../includes/functions.php");
require_once("../includes/db_connection.php");
confirm_logged_in(); include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
     
      <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
  <div id="page">
      
       <?php echo message(); ?>

      <h2>Posts by All Users</h2><br />
    + <a href="new_post.php?user_id=<?php echo $_SESSION["user_id"] ?>">Add a new post</a><br />
      <hr/>
          
         
        <ul>
<?php 
 
// 1. make sure the user has created a profile

$result_array = get_logged_in_user_profile();

//$num_profiles_found = count($result);
//iterate over all the rows
if(empty($result_array)){
    echo "You must create a profile! ";
    echo "<br/>"; 
    echo "<a href='create_profile.php?user_id={$_SESSION["user_id"]}'>Create Your Profile Now</a>";
    
    
}else {
    
    // 2. if profile has been created, show  FRIENDS blog posts
    
    //currently showing ALL blog posts:
                                 
$user_id = $_SESSION["user_id"];
    
$all_posts=find_all_blog_posts();

foreach($all_posts as $post) { //loop the array 
 

            //GET IMAGE FROM DB
    
    $query = "SELECT * FROM gallery WHERE user_id = {$post["user_id"]} AND pi = 1 ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
         echo "<div id='post'><img class='thumb' src='uploads/default.png' alt='profileImg'/>";
        

    }else {
        //get image

        echo "<div id='post'><img class='thumb' src='".$image_array["path"]."' alt='profileImg'/>";
    }//end get prof img
        
    
        
        echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
        echo htmlentities($post["post_title"]);
    echo "</div><br/>";
        echo "by: <a href='profile.php?user_id=";
        echo urlencode($post["user_id"]);
        echo "'>";
        echo htmlentities($post["author"]);
        echo "</a>";
            echo "<br/><br/>";
        echo $post["content"];
        echo "</div></div><br/>";
        echo "<br/>";
    

    }
    
    
}//end see if user has created profile
 
                                 
?>
        </ul>
        
      </div>
 
    
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>