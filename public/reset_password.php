<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php

if (isset($_POST['submit'])) {
  // Process the form
    
      
  
  // validations
  $required_fields = array( "username", "password");
  validate_presences($required_fields);

  if (empty($errors)) {
    
    // Perform Update

    
    $username = $_POST["username"];
    $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);
  
    $query  = "UPDATE users SET ";
    $query .= "password = '{$hashed_password}' ";
    $query .= "WHERE username = '{$username}' ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "user updated.";
      redirect_to("login.php");
    } else {
      // Failure
      $_SESSION["message"] = "user update failed.";
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
    
    <h2>Reset Password </h2>
      <p>This function is for developer use only. Once site is in alpha, this link will only be available through email, where username is replaced by email for verification</p>
    <form action="reset_password.php" method="post">
      <p>Username: <input type="text" name="username" value="" /> 
      </p>
      <p>New Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Reset Password" />
    </form>
    <br />
    <a href="login.php">Cancel</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>