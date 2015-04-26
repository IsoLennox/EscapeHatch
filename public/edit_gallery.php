<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php"); ?>
<?php confirm_logged_in(); ?>

<?php
//user_id passed through URL from 'VIEW PROFILE' link in nav
$user_id=$_GET["user_id"]; 
?>
 
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

        if($_SESSION["user_id"]===$contact_id){
        
        //This is your profile: view option to edit  
 
            echo "<br />   + <a href='upload_gallery.php?user_id={$user_id}'>Upload Image</a><br/><br/>";
        
        echo "Click on an image to change a caption or delete it.<br/><Br/>";
    
    }else{
        
            redirect_to('edit_gallery.php?user_id='.$_SESSION["user_id"].'');
        
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
 
       // while($image = mysqli_fetch_assoc($result)){
        foreach($result as $image){
 
            echo "<a href=\"edit_image.php?id=".$image["id"]."&path=".$image["path"]."&caption=".$image["caption"]."&contact_id=".$contact_id."\" ><img class='gallery_img' src='".$image["path"]."' alt='gallery_img'/></a>"; 
  
    
            }//end loop through images
        
        echo "</div>"; 
    }//end find imgs in DB
    
 
    echo mysqli_fetch_assoc($result);
    echo "<br />";
 
 

    } ?>
      
      </div>     
</div>
<?php include("../includes/layouts/footer.php"); ?>