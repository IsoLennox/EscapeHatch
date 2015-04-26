<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
    <?php include("../includes/layouts/nav.php"); ?>
  </div>
  <div id="page">
    <?php echo message(); ?> 
    
    <h2>Edit user: <?php echo htmlentities($_SESSION["username"]); ?></h2>
    <form action="edit_user.php?id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post">
      
        <?php
    $find_user_email= "SELECT * FROM users WHERE id={$_SESSION["user_id"]}";
$user_email = mysqli_query($connection, $find_user_email);

while($contact = mysqli_fetch_assoc($user_email)){
    $email=$contact["email"];
}
 
//$email_array=mysqli_fetch_assoc($user_email);
?>
        <p><?php echo $email; ?></p>
        <p><a href="edit_email.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>">Change Email Address</a>
      </p>
        
        
      <p><a href="edit_password.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>">Change Password</a>
      </p>
        
        <a href="delete_user.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>" onclick="return confirm('Are you sure?');">Delete Account</a>
        
        
<!--      <input type="submit" name="submit" value="Edit user" />-->
    </form>
    <br />
<!--    <a href="manage_users.php">Cancel</a>-->
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>