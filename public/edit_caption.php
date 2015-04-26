<?php require_once("../includes/session.php");
require_once("../includes/db_connection.php");
require_once("../includes/functions.php");
require_once("../includes/validation_functions.php");
confirm_logged_in(); 

//post_id passed through URL from 'EDIT' link
$image_id=$_GET["image_id"]; 
$old_caption=$_GET["caption"]; 


// ask database for blog post info

$user_id = $_SESSION["user_id"];  


$query = "SELECT * FROM gallery WHERE id = {$image_id} AND  user_id= {$image_id}";
$image_details = mysqli_query($connection, $query);
$image_array=mysqli_fetch_assoc($image_details);
 
 
foreach($image_details as $image){
    echo "<img src='".$image["path"]."' alt='edit_img'/>";
    echo "<br/><Br/>".$image["caption"];
    

}




if (isset($_POST['submit'])) {
  // Process the form
  
    $old_caption="";
   
  $new_caption = mysql_prep($_POST["new_caption"]);


  // validations
  $required_fields = array("new_caption");
  validate_presences($required_fields);
 
  
  if (empty($errors)) {
    
    // Perform Update

    $query  = "UPDATE gallery SET ";
    $query .= "caption = '{$new_caption}' ";
    $query .= "WHERE id = {$image_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "post updated.";
      redirect_to("gallery.php?user_id={$_SESSION["user_id"]}");
    } else {
      // Failure
      $_SESSION["message"] = "post update failed.";
        redirect_to("gallery.php?user_id={$_SESSION["user_id"]}");
    }
  
  }
} else {
  // This is probably a GET request, SHOW FORM
  
} // end: if (isset($_POST['submit']))

?>

 
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
     <?php include("../includes/layouts/nav.php"); ?>
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit Image</h2>
    <form action="edit_caption.php?image_id=<?php echo urlencode($image_id); ?>" method="post">
        
      <p>Edit Caption:
         <br/>
          
          <textarea name="new_caption" rows="5" cols="40"><?php echo htmlentities($old_caption); ?></textarea>
      </p>
      
      <input type="submit" name="submit" value="Save" />
    </form>
    <br />
    <a href="gallery.php?user_id=<?php echo $_SESSION["user_id"] ?>">Cancel</a>
   
    
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>