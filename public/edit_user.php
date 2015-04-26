<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
  $user = find_user_by_id($_GET["id"]);
 // $user = $_GET["user_id"];
  
  if (!$user) {
    // user ID was missing or invalid or 
    // user couldn't be found in database
    redirect_to("manage_users.php");
  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $user["id"];
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);
  
    $query  = "UPDATE users SET ";
    //$query .= "username = '{$username}', ";
    $query .= "password = '{$hashed_password}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "user updated.";
      redirect_to("manage_users.php");
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
   <?php include("../includes/layouts/nav.php"); ?>
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit user: <?php echo htmlentities($user["username"]); ?></h2>
    <form action="edit_user.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
      
      <p><a href="edit_password.php?user_id=<?php $_SESSION["user_id"] ?>">Change Password</a>
      </p>
        
        <a href="delete_user.php?id=<?php echo urlencode($user["id"]); ?>" onclick="return confirm('Are you sure?');">Delete Account</a>
        
        
<!--      <input type="submit" name="submit" value="Edit user" />-->
    </form>
    <br />
<!--    <a href="manage_users.php">Cancel</a>-->
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>