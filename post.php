<?php include 'inc/header.php'; ?>
<?php 
    // Get post id from GET
    if ( !isset($_GET['id']) ){
        header('location: index.php');
        exit();
    } else {
        $post_id = $_GET['id'];
    }
    // Get post from DB
    $query = "SELECT * FROM posts WHERE id = $post_id";
    $post = $db->select($query)->fetch_assoc();
?>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
        
      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $post['title'];?></h2>
        <p class="blog-post-meta"><?php echo formatDate($post['date']);?> by <a href="posts.php?auth=<?php echo urlencode($post['author']);?>" class="read-more"><?php echo $post['author'];?></a></p>
        <?php echo $post['body'];?>
      </div>
        
<?php include 'inc/footer.php'; ?>