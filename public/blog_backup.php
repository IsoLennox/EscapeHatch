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
  <div id="page">
      
       <?php echo message(); ?>
      
<?php 
                           
                                                                  
$query = "SELECT * FROM blog_posts WHERE user_id = {$user_id} ORDER BY post_id DESC";
$result = mysqli_query($connection, $query);
$result_array = mysqli_fetch_assoc($result);
   // var_dump($result_array);
//iterate over all the rows
?>
        <h2>
            <?php //check for posts, so that "author" isn't empty
            if(empty($result_array["author"])){
                echo "This user has no blog posts";
            }else{
             echo "<h2>".$result_array["author"]."'s Blog</h2>";
             echo "<a href='profile.php?user_id=".$user_id."'>View Profile</a>";
            }
?>
      
      
      </h2>
          <br />
<?php

//CHECK IF YOUR PROFILE
      if($user_id == $_SESSION["user_id"]){
       echo "<br/> + <a class='new-post-link' href='new_post.php'>Add a new post</a>
          <br /><hr />";
      }elseif($_SESSION["user_id"]!==$user_id){
                //not your profile: view options to add or remove friend

                //QUERY TABLE TO SEE IF THIS PERSON IS YOUR FRIEND

        $query = "SELECT * FROM contacts WHERE contact_id ={$user_id} AND  contacts_with_id = {$_SESSION["user_id"]} LIMIT 1";

        $result = mysqli_query($connection, $query);
        $contacts_array=mysqli_fetch_assoc($result);



        if(empty($contacts_array)){
            //IF !FRIEND, ADD:
             echo "<br />   + <a href='add_contact.php?contact_user_id={$contact_id}&contact_username={$result_array["author"]}'>Add Friend</a>";

        }else {

             //ELSE (If friend): REMOVE:

                  echo "<br />   + <a href='remove_contact.php?contact_user_id={$contact_id}&contact_username={$result_array["author"]}'>Remove Friend</a>";

                }     
            }
              
//END SEE IF YOUR PROFILE OR IF FRIEND

?>
        
        <ul>
<!--            Show latest post, since last one gets caught in limbo -->
        <div id="post-wrap">
            
           <?php 

if(!empty($result_array["content"])){
                $result_array["post_title"] = $result_array["post_title"]; 
            $result_array["user_id"] = $user_id; 
            $result_array["author"]=$result_array["author"];
            $result_array["content"]=$result_array["content"];
            $result_array["post_id"]=$result_array["post_id"];
             
}else{
            $result_array["post_title"] = "Create your first post!"; 
            $result_array["user_id"] = $user_id; 
            $result_array["author"]=$_SESSION["username"];
            $result_array["content"]="";
            $result_array["post_id"]="";

}
            ?>
            
           <div id="post-title"> <?php echo $result_array["post_title"] ?></div><br />
        by: <a href='profile.php?user_id=<?php echo $result_array["user_id"] ?>'> <?php echo $result_array["author"] ?></a><br /><br />
            <?php echo $result_array["content"] ?> <br /><br />
            <?php 
              if($user_id === $_SESSION["user_id"] && $result_array["content"]!==""){
    echo "<a href='edit_post.php?post_id={$result_array["post_id"]}'>EDIT</a><br/>";
    }?>
            
            </div> 
            <br />   
            <br />   
      
<?php
while($post = mysqli_fetch_assoc($result)){ 

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