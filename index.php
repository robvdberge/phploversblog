<?php
 include 'inc/header.php';

 // Select all posts
 $query = "SELECT * FROM posts ORDER BY id DESC";
 // Run query
 $all_posts = $db->select($query);
 
?>
  <div class="jumbotron p-4 p-md-5 text-white rounded bg-purple">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">International PHP conference 2019</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#777bb4"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#777bb4"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
  </div>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
        <?php if ( $all_posts ):
            while ( $result = $all_posts->fetch_assoc()):?>
      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $result['title'];?></h2>
        <p class="blog-post-meta"><?php echo formatDate($result['date']);?> by <a href="posts.php?auth=<?php echo urlencode($result['author']);?>" class="read-more"><?php echo $result['author'];?></a></p>

        <?php echo shortenText($result['body']);?>
        <br>
        <a href="post.php?id=<?php echo urlencode($result['id']);?>" class="read-more">Read more</a>
        
      </div><!-- /.blog-post -->
        <?php endwhile; else: echo "<p>There are no categories yet.</p>";endif; ?>

<?php include 'inc/footer.php'; ?>

