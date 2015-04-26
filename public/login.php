<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_user = attempt_login($username, $password);

    if ($found_user) {
      // Success
			// Mark user as logged in
			$_SESSION["user_id"] = $found_user["id"];
			$_SESSION["username"] = $found_user["username"];
      redirect_to("post_feed.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
 <html lang="en">
  <head>
    <title>EH v.2 Login </title>
    <link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="welcome">
        <img id="headerLogo" src="images/small_logo.png" alt="EH Logo"/>
      <h1>EscapeHatch</h1>
 
 
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
<!--     <h2>Welcome To EscapeHatch</h2><br /><br />-->
    <h2>Login</h2>
      
    <form action="login.php" method="post">
      <p>Username:
        <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Submit" />
    </form>
      <br />
        <a href="new_user.php">Create an Account</a><br/><br/>
      
      <!--
    ********** IF ANY PROBLEMS WITH PASSWORDS:

        <a href="reset_password.php">Reset Password</a>

-->
  </div>
</div>