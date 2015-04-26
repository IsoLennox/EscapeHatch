<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php"); ?>
<?php confirm_logged_in(); ?> 
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
     
      <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
  <div id="page">
      
       <?php echo message(); ?>
      
      <h2>Following You</h2>
      <hr/>
    
        <ul>
        <?php 

// 1. FIND ALL CONTACTS WITH YOUR ID AS A CONTACTS ID (added YOU as friend)
 

$result=find_following_you();
$contacts_array=mysqli_fetch_assoc($result);
 
if(empty($contacts_array)){
    echo "No one has added you! ";
    echo "<br/>";  
    
    
}else {
     foreach($result as $contact){
        $contact_username= $contact["contacts_with_username"];
        $contact_id= $contact["contacts_with_id"];
        //echo $contact["contacts_with_username"]."<br/>"; 
         
        $check_if_contact=see_if_user_is_your_contact($contact_id);
        $if_contact_array=mysqli_fetch_assoc($check_if_contact);
         
         
         if(!$if_contact_array){
            //GET IMAGE FROM DB
    
    $query = "SELECT * FROM gallery WHERE user_id = {$contact_id} AND pi = 1 LIMIT 1";
    $result = mysqli_query($connection, $query);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
         echo "<img class='thumb' src='uploads/default.png' alt='profileImg'/>";
        

    }else {
        //get image

        echo "<img class='thumb' src='".$image_array["path"]."' alt='profileImg'/>";
    }//end get prof img 
             
             
            echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
            echo htmlentities($contact_username);
            echo "</div><br/>";
            echo "View Profile: <a href='profile.php?user_id=";
            echo urlencode($contact_id);
            echo "'>";
            echo htmlentities($contact_username);
            echo "</a><br/><br/>"; 
             echo "You are not following this contact.<br/>"; 
             echo "+ <a href='add_contact.php?contact_user_id={$contact_id}&contact_username={$contact_username}'>Add Contact</a><br/>";
            echo "</div><br/><br/>";
 
         }else{
            //GET IMAGE FROM DB
    
    $query = "SELECT * FROM gallery WHERE user_id = {$contact_id} AND pi = 1 LIMIT 1";
    $result = mysqli_query($connection, $query);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
         echo "<img class='thumb' src='uploads/default.png' alt='profileImg'/>";
        

    }else {
        //get image

        echo "<img class='thumb' src='".$image_array["path"]."' alt='profileImg'/>";
    }//end get prof img 
             
            echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
            echo htmlentities($contact_username);
            echo "</div><br/>";
            echo "View Profile: <a href='profile.php?user_id=";
            echo urlencode($contact_id);
            echo "'>";
            echo htmlentities($contact_username);
            echo "</a><br/><br/>"; 
             echo "You are mutual contacts!<br/>"; 
             echo "- <a href='remove_contact.php?contact_user_id={$contact_id}&contact_username={$contact_username}'>Remove Contact</a><br/>";
            echo "</div><br/><br/>";
         }
     }  
}//end see if user has contacts
                            
        ?>
        </ul>    
      </div>    
  </div> 
<?php include("../includes/layouts/footer.php"); ?>