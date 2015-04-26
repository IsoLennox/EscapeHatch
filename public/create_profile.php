<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$user_id=$_GET["user_id"]; 


if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("content");
  validate_presences($required_fields);

  
  if (empty($errors)) {
    // Perform Create

    $user_id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    $content = mysql_prep($_POST["content"]); 
  
    $query  = "INSERT INTO profile (";
    $query .= "  user_id, username, profile_content";
    $query .= ") VALUES (";
    $query .= "  {$user_id},'{$username}', '{$content}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Profile created.";
      redirect_to("profile.php?user_id={$user_id}");
    } else {
      // Failure
      $_SESSION["message"] = "Profile creation failed.";
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
    
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Create Profile</h2>
    <form action="create_profile.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post">
     
       
      <p>Content:<br />
        <textarea name="content" rows="20" cols="80"></textarea>
      </p>
      <input type="submit" name="submit" value="Create Profile" />
    </form>
    <br />
    <a href="profile.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>">Cancel</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>