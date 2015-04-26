<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php"); ?>
<?php confirm_logged_in(); ?> 
<?php 
//$user_id=$_GET["user_id"]; 
$layout_context = "user"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
     
      <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
  <div id="page">
      
       <?php echo message(); ?>

      <h2>Contacts</h2>
        <a href="contact_of.php">View Following You</a>
      <hr/>
          
         
        <ul>
        <?php 
 
 
// 1. FIND ALL CONTACTS WITH YOUR ID AS A CONTACTS_WITH ID (You added THEM)

    $contacts_array=find_your_contacts();

    if(empty($contacts_array)){
        echo "You have no friends! ";
        echo "<br/>";  


    }else {

        // 2. if contacts have YOU as a contacts_with_id, show them here (you added them)


        foreach($contacts_array as $contact) {
            //loop the array 

            //GET IMAGE FROM DB
    
    $query = "SELECT * FROM gallery WHERE user_id = {$contact["contact_id"]} AND pi = 1 ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    $image_array=mysqli_fetch_assoc($result);
 
    if(empty($image_array)){
         echo "<img class='thumb' src='uploads/default.png' alt='profileImg'/>";
        

    }else {
        //get image

        echo "<img class='thumb' src='".$image_array["path"]."' alt='profileImg'/>";
    }//end get prof img
            
            echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
            echo htmlentities($contact["contact_username"]);
            echo "</div><br/>";
            echo "View Profile: <a href='profile.php?user_id=";
            echo urlencode($contact["contact_id"]);
            echo "'>";
            echo htmlentities($contact["contact_username"]);
            echo "</a><br/>"; 
            echo "<br />   - <a href='remove_contact.php?contact_user_id={$contact["contact_id"]}&contact_username={$contact["contact_username"]}'>Remove Friend</a>";
            echo "</div><br/><br/>";


        }//end iterate through contacts
    }//end see if user has contacts


        ?>
        </ul>
    </div>
  </div> 
<?php include("../includes/layouts/footer.php"); ?>