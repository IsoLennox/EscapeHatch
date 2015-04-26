<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php 
//post_id passed through URL from 'EDIT' link
$post_id=$_GET["post_id"]; 


// ask database for blog post info

$user_id = $_SESSION["user_id"]; 
$author = $_SESSION["username"];
$query = "SELECT * FROM blog_posts WHERE post_id = {$post_id}";
$current_post = mysqli_query($connection, $query);
//for each post_id, get data
$post_title ="";
$post_content ="";
while($post = mysqli_fetch_assoc($current_post)){
$post_title =$post["post_title"];
$post_content= $post["content"];

}

if (isset($_POST['submit'])) {
  // Process the form
  
   
  $post_title = mysql_prep($_POST["post_title"]);
  $position = (int) $_POST["position"];
  $visible = (int) $_POST["visible"];
  $content = mysql_prep($_POST["content"]);

  // validations
  $required_fields = array("post_title", "content");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("post_title" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $query  = "UPDATE blog_posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "author = '{$author}', ";
    $query .= "content = '{$content}' ";
    $query .= "WHERE post_id = {$post_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "post updated.";
      redirect_to("blog.php?user_id={$_SESSION["user_id"]}");
    } else {
      // Failure
      $_SESSION["message"] = "post update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
     <?php include("../includes/layouts/nav.php"); ?>
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit post: <?php echo htmlentities($post_title); ?></h2>
    <form action="edit_post.php?post_id=<?php echo urlencode($post_id); ?>" method="post">
      <p>Menu name:
        <input type="text" name="post_title" value="<?php echo htmlentities($post_title); ?>" />
      </p>
       
      <p>Content:<br />
        <textarea name="content" rows="20" cols="80"><?php echo htmlentities($post_content); ?></textarea>
      </p>
      <input type="submit" name="submit" value="Save" />
    </form>
    <br />
    <a href="blog.php?user_id=<?php echo $_SESSION["user_id"] ?>">Cancel</a>
    &nbsp;
    &nbsp;
    <a href="delete_post.php?post_id=<?php echo urlencode($post_id); ?>" onclick="return confirm('Are you sure?');">Delete post</a>
    
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>