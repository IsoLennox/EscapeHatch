<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
//user_id passed through URL from 'EDIT' link
$user_id=$_GET["user_id"]; 


//EDIT PROFILE

// ask database for profile info
 
$this_users_profile = find_user_profile(); 
foreach ($this_users_profile as $profile){
    $username = $profile["username"];
    $profile_content= $profile["profile_content"];

}


 
if (isset($_POST['submit'])) {
  // Process the form
  

  $content = mysql_prep($_POST["content"]);

  // validations
  $required_fields = array("content");
  validate_presences($required_fields);
  
  
  if (empty($errors)) {
    
    // Perform Update

    $query  = "UPDATE profile SET ";
    $query .= "profile_content = '{$content}' ";
    $query .= "WHERE user_id = {$user_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "profile updated.";
      redirect_to("profile.php?user_id={$user_id}");
    } else {
      // Failure
      $_SESSION["message"] = "profile update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "user"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
     <?php include("../includes/layouts/nav.php"); ?>
  </div>
  <div id="post">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit Profile</h2>
<form action="edit_profile.php?user_id=<?php echo urlencode($user_id); ?>" method="post">
       
      <p>Content:<br />
        <textarea name="content" rows="20" cols="80"><?php echo htmlentities($profile_content); ?></textarea>
      </p>
      <input type="submit" name="submit" value="Save" />
    </form>
    <br />
    <a href="profile.php?user_id=<?php echo urlencode($user_id); ?>">Cancel</a>

    
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>