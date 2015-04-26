<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
  $user_id = $_GET["user_id"];
  

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array( "password");
  validate_presences($required_fields);

  if (empty($errors)) {
    
    // Perform Update

    
     
    $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);
  
    $query  = "UPDATE users SET ";
    $query .= "password = '{$hashed_password}' ";
    $query .= "WHERE id = {$user_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "password updated.";
      redirect_to("account_settings.php");
    } else {
      // Failure
      $_SESSION["message"] = "passwrd update failed.";
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
    
    <h2>Edit user: <?php echo htmlentities($_SESSION["username"]); ?></h2>
    <form action="edit_password.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post">
      <p>Username: <?php echo htmlentities($_SESSION["username"]); ?> 
      </p>
      <p>New Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Edit user" />
    </form>
    <br />
    <a href="manage_users.php">Cancel</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>