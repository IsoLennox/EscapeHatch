<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php
 //image info to use without calling db again
$image_id=$_GET["id"]; 
$image_path=$_GET["path"]; 
$image_caption=$_GET["caption"]; 
$contact_id=$_GET["contact_id"]; 
?>
 
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
    <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
  <div id="page">
      
       <?php echo message(); ?>
 
              <?php 

    //get data 
    
    echo "<h2>Edit Image</h2>";

        if($_SESSION["user_id"]===$contact_id){
        
            
            
        //This is your profile: view option to edit  
  
     
    
     
    
    //GET IMAGE FROM DB
    
    //call DB for gallery w image_id of $image_id
 
    $result = get_photo_from_gallery($image_id);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
        echo "<br/><br/><br/>";
        echo "This image does not exist";
        echo "<br/>";
    

    }else {
        //get image
    echo "<div id='full-image'>";
        foreach($result as $image){
 
            echo "<img src='".$image["path"]."' alt='edit_img'/>";
            
            echo "<br/><Br/>".$image["caption"];
            
            
            
            echo "<br/><Br/><a href='edit_caption.php?image_id=".$image["id"]."&caption=".$image["caption"]."'>Edit Caption</a>" ;
            echo "<br/><Br/><a href='update_profile_img.php?image_path=".$image["path"]."&image_id=".$image["id"]."'>Make Profile Image</a>" ;
            echo "<br/><Br/><a href='delete_image.php?image_id=".$image["id"]."' onclick=\"return confirm('Permenantly DELETE image?');\" >Delete Image</a>";
 
  
    
            }//end loop through images
        echo "</div>"; 
    }//end find imgs in DB
    
 
    echo mysqli_fetch_assoc($result);
    echo "<br />";
    
    }else{
        
        //not your profile, only show image
            
            $result = get_photo_from_gallery($image_id);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
        echo "<br/><br/><br/>";
        echo "This image does not exist";
        echo "<br/>";
    

    }else {
        //get image
    echo "<div id='full-image'>";
        foreach($result as $contact_image){
 
            echo "<img src='".$contact_image["path"]."' alt='edit_img'/>";
            
            echo "<br/><Br/>".$contact_image["caption"]; 
 
  
    
            }//end loop through images
        echo "</div>"; 
    }//end find imgs in DB
            
          
        } ?>
      
      </div>     
</div>
<?php include("../includes/layouts/footer.php"); ?>