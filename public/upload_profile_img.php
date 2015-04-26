<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php");
confirm_logged_in();
$user_id = $_GET["user_id"];
  

if (isset($_POST['submit'])) {
    
 
  // Process the form
    //CHECK IMAGE
    
    $target_dir = "uploads/".$_SESSION["user_id"]."/";
    if (!file_exists($target_dir)) {
        
        //CREATE DIRECTORY
    mkdir($target_dir, 0777, true);
        
        //UPLOAD FILE
        
        require_once("../includes/upload_profile_img.php"); 

        
        
}else{
        
        //DIRECTORY EXISTS. UPLOAD IMAGE
    
     require_once("../includes/upload_profile_img.php"); 
    
   
}//end check for directory and upload
   
} else {
  // This is probably a GET request
  
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
    
    <h2>Edit <?php echo htmlentities($_SESSION["username"]); ?>'s Profile Image</h2>
      

<form action="upload_profile_img.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
      
    <br /> 
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>