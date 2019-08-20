<?php include 'inc/header.php'; ?>
<?php 
    // Get post id from GET
    if ( isset($_GET['category']) ){
        $catId = $_GET['category']; 
        $query = "SELECT * FROM posts WHERE category = $catId ORDER BY id DESC";
    } elseif ( isset($_GET['auth']) ){// If author is selected
      $authName = $_GET['auth']; 
      $query = "SELECT * FROM posts WHERE author = '$authName' ORDER BY id DESC";
    } else {
        $query = "SELECT * FROM posts ORDER BY id DESC";
    }

    // Get post from DB
    
    $posts = $db->select($query);
?>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
        <?php if ($posts):
                while ($result = $posts->fetch_assoc()): ?>

      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $result['title'];?></h2>
        <p class="blog-post-meta"><?php echo formatDate($result['date']);?> by <a href="posts.php?auth=<?php echo urlencode($result['author']);?>" class="read-more"><?php echo $result['author'];?></a></p>
        <?php echo shortenText($result['body'],300);?>
        <a href="post.php?id=<?php echo $result['id'];?>" class="read-more">Read more...</a>
        
      </div><!-- /.blog-post -->
        <?php endwhile; else: echo "<p>There are no posts yet in this Category</p>"; endif; ?>

<?php include 'inc/footer.php'; ?>
