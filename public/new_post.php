<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("post_title", "content");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("post_title" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

     
 
      $user_id = $_SESSION["user_id"];
      $author = $_SESSION["username"];
    $post_title = mysql_prep($_POST["post_title"]);
    $content = mysql_prep($_POST["content"]);
  
    $query  = "INSERT INTO blog_posts (";
    $query .= "  user_id, author, post_title, content";
    $query .= ") VALUES (";
    $query .= "  {$user_id}, '{$author}', '{$post_title}', '{$content}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Post created.";
      redirect_to("blog.php?user_id={$_SESSION["user_id"]}");
    } else {
      // Failure
      $_SESSION["message"] = "Post creation failed.";
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
    
    <h2>Create Post</h2>
    <form action="new_post.php?user_id=<?php echo urlencode($_SESSION["user_id"]); ?>" method="post">
      <p>Title:
        <input type="text" name="post_title" value="" />
      </p>
       
      <p>Content:<br />
        <textarea name="content" rows="20" cols="80"></textarea>
      </p>
      <input type="submit" name="submit" value="Create Post" />
    </form>
    <br />
    <a href="blog.php">Cancel</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>