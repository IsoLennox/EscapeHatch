<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
$user_id= $_GET["user_id"];

if (isset($_POST['submit'])) {
 
    
    $required_fields = array("password");
    validate_presences($required_fields);
    
   if (empty($errors)) {   
  $query = "DELETE FROM users WHERE id = {$user_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
      $_SESSION["message"] = "user deleted.";
      $_SESSION["user_id"] = null;
      $_SESSION["username"] = null;
      redirect_to("login.php");
  } else {
    // Failure
    $_SESSION["message"] = "user deletion failed.";
    redirect_to("manage_users.php");
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
    &nbsp;
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
     <h2>DELETE YOUR ACCOUNT</h2><br /><br />
     <?php echo $_SESSION["username"] ?>
      
    <form action="delete_user.php?user_id=<?php echo $_SESSION["user_id"] ?>" method="post">
       
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Submit" />
    </form>
      
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>