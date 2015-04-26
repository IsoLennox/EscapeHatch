<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php
//user_id passed through URL from 'VIEW PROFILE' link in nav
$user_id=$_GET["user_id"]; 
?>
 

<?php $layout_context = "user"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
    <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
  <div id="page">
      
       <?php echo message(); ?>
 
              <?php 
//check for profile
                              

$result=find_user_profile();
$result_array=mysqli_fetch_assoc($result);
$contact_id=$result_array["user_id"];

if(empty($result_array)){
    echo "This user has not created a profile";
    echo "<br/>";
    if($_SESSION["user_id"]===$user_id){
    echo "<a href='create_profile.php?user_id={$user_id}'>Create Your Profile Now</a>";
    }
    
}else {
    //get data 
    
    echo "<h2>{$result_array["username"]}'s Gallery</h2>";
    echo "<a href='profile.php?user_id={$contact_id}'>View Profile</a> | <a href='blog.php?user_id={$contact_id}'>View Blog</a><br/><br/>";
    
    // Do we need to be able to add/remove friend from gallery??  I think not...
//    if($_SESSION["user_id"]!==$contact_id){
//        //not your profile: view options to add or remove friend
//        
//        //QUERY TABLE TO SEE IF THIS PERSON IS YOUR FRIEND
// 
//    $result=see_if_user_is_your_contact($contact_id);
//    $contacts_array=mysqli_fetch_assoc($result);
// 
//        if(empty($contacts_array)){
//            //IF !FRIEND, ADD:
//             echo "<br />   + <a href='add_contact.php?contact_user_id={$contact_id}&contact_username={$result_array["username"]}'>Add Friend</a><br/>";
//
//            //echo "You must add this friend to see their images
//
//        }else {
//
//             //ELSE (If friend): REMOVE BUTTON:
//
//                  echo "<br />   + <a href='remove_contact.php?contact_user_id={$contact_id}&contact_username={$result_array["username"]}'>Remove Friend</a><br/>";
//
//             
//
//            }//end check if user is friend        
//        
//        }//end check if this is YOUR profile/gallery:add/remove friend
//    
//    
        if($_SESSION["user_id"]===$contact_id){
        
        //This is your profile: view option to edit  
 
            
                  echo "<br/><div id='newposts'><img src='images/icons/tiny-gallery.png'/><a href='upload_gallery.php?user_id={$_SESSION["user_id"]}'>Upload Image</a></div><br />";
            
        
        //give option to upload profile pic
//            echo "<br />   + <a href='edit_gallery.php?user_id={$_SESSION["user_id"]}'>Edit Images</a><br/><br/>";
    
    }//end check if this is YOUR profile/gallery
    
    
    $user_id=$_GET["user_id"];
    $target_dir = "uploads/".$user_id."/";
    
 
    
    //GET IMAGE FROM DB
 
    $result = get_user_gallery($contact_id);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
        echo "<br/><br/><br/>";
        echo $result_array["username"]." has no Images.";
        echo "<br/>";
        if($_SESSION["user_id"]===$user_id){ 
       echo "<br />   + <a href='upload_gallery.php?user_id={$user_id}'>Upload Image</a>";
        }

    }else {
        //get images
    echo "<div id='gallery-wrap'>";
        foreach($result as $image){
 
//            echo "<img class='gallery_img' src='".$image["path"]."' alt='gallery_img'/>";
 
  echo "<a href=\"edit_image.php?id=".$image["id"]."&path=".$image["path"]."&caption=".$image["caption"]."&contact_id=".$contact_id."\" ><img class='gallery_img' src='".$image["path"]."' alt='gallery_img'/></a>"; 
    
            }//end loop through images
        echo "</div>"; 
    }//end find imgs in DB
    
 
    echo mysqli_fetch_assoc($result);
    echo "<br />";
    
    //end EDIT if your profile, ADD or REMOVE friend if not your profile

//       echo "This will show below gallery";

    } ?>
      
      </div>     
</div>
<?php include("../includes/layouts/footer.php"); ?>