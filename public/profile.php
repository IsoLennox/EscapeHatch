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
 
$profile_array=find_user_profile();
$profile_details=mysqli_fetch_assoc($profile_array);
$contact_id=$profile_details["user_id"];

if(empty($profile_details)){
    echo "This user has not created a profile";
    echo "<br/>";
    if($_SESSION["user_id"]===$user_id){
    echo "<a href='create_profile.php?user_id={$user_id}'>Create Your Profile Now</a>";
    }
    
}else {
    //get data 
    
    $user_id=$_GET["user_id"];
$target_dir = "uploads/".$user_id."/";
    
    
    
    
    
    
    
    echo "<div id='profile-header'>";
//     echo "<div id='half'>";
    
    //GET IMAGE FROM DB
    
    $query = "SELECT * FROM gallery WHERE user_id = {$contact_id} AND pi = 1 ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
        echo "This user has no profile image.";
        echo "<br/>";
        if($_SESSION["user_id"]===$user_id){
        echo "<a href='upload_profile_img.php?user_id={$user_id}'>Upload a Profile Image</a>";
        }

    }else {
        //get image

        echo "<img class='profileImg' src='".$image_array["path"]."' alt='profileImg'/>";
    }
    
    
//    echo "</div><!-- half-->";
//    echo "<div id='half'>";
    
     echo "<h2>{$profile_details["username"]}'s Profile</h2>";

    echo mysqli_fetch_assoc($result);
   
    
    //end EDIT if your profile, ADD or REMOVE friend if not your profile
    if($_SESSION["user_id"]===$contact_id){
        
        //This is your profile: view option to edit profile
     echo "<br />   + <a href='edit_profile.php?user_id={$user_id}'>Edit Profile</a>";
        
        
        //give option to upload profile pic
       echo "<br />   + <a href='upload_profile_img.php?user_id={$user_id}'>Upload Profile Image</a>";
        
        
        
    }if($_SESSION["user_id"]!==$contact_id){
        //not your profile: view options to add or remove friend
        
        //QUERY TABLE TO SEE IF THIS PERSON IS YOUR FRIEND
 
$query = "SELECT * FROM contacts WHERE contact_id ={$contact_id} AND  contacts_with_id = {$_SESSION["user_id"]} LIMIT 1";
        
$result = mysqli_query($connection, $query);
$contacts_array=mysqli_fetch_assoc($result);
        
        
 
if(empty($contacts_array)){
    //IF !FRIEND, ADD:
     echo "<br />   + <a href='add_contact.php?contact_user_id={$contact_id}&contact_username={$profile_details["username"]}'>Add Friend</a>";
    
}else {
    
     //ELSE (If friend): REMOVE:
        
          echo "<br />   + <a href='remove_contact.php?contact_user_id={$contact_id}&contact_username={$profile_details["username"]}'>Remove Friend</a>";

        }     
    }
    
         echo "<br/><br/><a href='blog.php?user_id={$contact_id}'>View Blog</a> | <a href='gallery.php?user_id={$contact_id}'>View Gallery</a>";
    
    
//    echo "</div><!-- half-->";
    echo "</div><!-- end profile header-->";
    

    echo "<div id='profile-content'>";
    echo $profile_details["profile_content"];
        echo "</div>";
 
}//END get profile data                    
        ?>
      
      </div>
 
     
</div>
<?php include("../includes/layouts/footer.php"); ?>