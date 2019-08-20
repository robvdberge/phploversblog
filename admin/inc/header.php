<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php $db = new Database;?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP Lovers Admin page</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <div class="logo"><img src="./img/logo.png" alt=""></div>
      </div>
      <div class="col-4 text-center">
        <h2>Admin Area</h2>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        
        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlentities($_GET['msg']);?></div>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-center">
      <a class="p-2 text-muted" href="index.php">Dashboard</a>
      <a class="p-2 text-muted" href="add_posts.php">Add Post</a>
      <a class="p-2 text-muted" href="add_cat.php">Add Category</a>
      <a class="p-2 text-muted pull-right" href="http://localhost/phploversblog">Visit Blog</a>
    </nav>
  </div>
<!-- end of header -->