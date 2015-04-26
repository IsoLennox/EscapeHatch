<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php //confirm_logged_in(); ?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username","email", "password", "confirm_password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
    
    
    //trying to create a function to check for unique ussername.
    //made username key UNIQUE for now, instead??  commented out below:64
//   $prospect_username = array("username");
//  validate_username_unique($prospect_username);
//    
 
  
  if (empty($errors) ) {
    // Perform Create

    $username = mysql_prep($_POST["username"]);
    $email = mysql_prep($_POST["email"]);
   // $hashed_password = password_encrypt($_POST["password"]);
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $first_password = $_POST["password"];
    $confirmed_password = $_POST["confirm_password"];
      
   if($first_password===$confirmed_password){
      
 
    
      //create user
    $query  = "INSERT INTO users (";
    $query .= "  username, email, password";
    $query .= ") VALUES (";
    $query .= "  '{$username}','{$email}', '{$hashed_password}'";
    $query .= ") ";
    $new_user_created = mysqli_query($connection, $query);
      
    
      
  

    if ($new_user_created) {
 
        
    // Success
      $_SESSION["message"] = "User created! Please Log In.";
      //redirect_to("profile.php?user_id={$user_id}");
      redirect_to("login.php");
        
        echo "yay!";
    } else {
      // Failure
     $_SESSION["message"] = "user creation failed.";
        
        //Made username key UNIQUE, if fail: usernameis taken
      //$_SESSION["message"] = "That username is taken!";
    }
  }elseif($first_password!==$confirmed_password){
   $_SESSION["message"] = "Passwords Do Not Match!";
   }
    }//end confirm no errors
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
    
    <h2>Create user</h2>
    <form action="new_user.php" method="post">
      <p>Username:
        <input type="text" name="username" value="" />
      </p>
        <p>Email For Password Recovery:
        <input type="text" name="email" value="" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
        <p>Confirm Password:
        <input type="password" name="confirm_password" value="" />
      </p>
      <input type="submit" name="submit" value="Create user" />
    </form>
    <br />
    <a href="login.php">Cancel</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>