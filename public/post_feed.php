<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php");
confirm_logged_in(); ?> 

<?php 
//$user_id=$_GET["user_id"]; 
$layout_context = "user"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
     
      <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
    
    
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
    
    
    
  <div id="page">
      
       <?php echo message(); ?>
      
      
 
      <h2>Your Contacts Post Feed</h2>
 <br />
  <hr/>
          
         
        <ul>
        <?php 
 
// 1. make sure the currently logged inuser has created a profile
$query = "SELECT * FROM profile WHERE user_id = {$_SESSION["user_id"]}";
$result = mysqli_query($connection, $query);
$result_array=mysqli_fetch_assoc($result);
//$num_profiles_found = count($result);
//iterate over all the rows
if(empty($result_array)){
    echo "You must create a profile! ";
    echo "<br/>"; 
    echo "<a href='create_profile.php?user_id={$_SESSION["user_id"]}'>Create Your Profile Now</a>";
    
    
}else {
    
    // 2. if profile has been created, show  FRIENDS blog posts
    
    
    //3. Find contacts, added by user
 
$query = "SELECT * FROM contacts WHERE contacts_with_id = {$_SESSION["user_id"]}";
$result = mysqli_query($connection, $query);
$contacts_array=mysqli_fetch_assoc($result);
    
    //iterate through contacts
    
    //add limbo user
    $limbo_user=$contacts_array["contact_username"];
    $limbo_user_id=$contacts_array["contact_id"];

 
if(empty($contacts_array)){
    echo "You have no friends! Showing your posts";
    echo "<br/>";  
      
$query = "SELECT * FROM blog_posts WHERE user_id = {$_SESSION["user_id"]} ORDER BY post_id DESC";
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
            
    
    
}else {
    
    //You are following people, show their blog posts
 
    
    //put friend id's into array to use in find blog posts for userid
    $friends_array=array($limbo_user_id);
    while($contact = mysqli_fetch_assoc($result)){

        $friend_user_id=$contact["contact_id"];
        $friend_username=$contact["contact_username"];
        array_push($friends_array, $friend_user_id);

      }//end while friends id's in array
   // print_r($friends_array);
    
    $ids = join(',',$friends_array);  
   //get all users who's user_id match any number in array
$query = "SELECT * FROM blog_posts WHERE user_id IN ($ids) OR user_id={$_SESSION["user_id"]} ORDER BY post_id DESC";
$blog_result = mysqli_query($connection, $query);
    

 
    //Show post data
    while($post = mysqli_fetch_assoc($blog_result)){
        
               //SELECT ALL OF YOUR FRIENDS, to show profile img
        
$img_query = "SELECT * FROM users WHERE id={$contacts_array["contact_id"]}";
$img_result = mysqli_query($connection, $img_query);
    

 
    //Show post data
    while($img = mysqli_fetch_assoc($img_result)){
 
 //GET Profile IMAGE 
    
    $query = "SELECT * FROM gallery WHERE user_id = {$post["user_id"]} AND pi = 1 ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
         echo "<div id='post'><img class='thumb' src='uploads/default.png' alt='profileImg'/>";
        

    }else {
        //get image

        echo "<div id='post'><img class='thumb' src='".$image_array["path"]."' alt='profileImg'/>";
    }//end get prof img
        
    }
        
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

    }//end show posts 
        
      
 
}//end see if user has contacts
    

}//end see if user has created profile
 
                                 
        ?>
        </ul>
        
      </div>
 
     
</div>
<?php include("../includes/layouts/footer.php"); ?>