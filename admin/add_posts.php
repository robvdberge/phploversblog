<?php include 'inc/header.php';?>
<?php
    if ( isset($_POST['submit']) ){
        // validate fields
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link,$_POST['body']);
        $category = mysqli_real_escape_string($db->link,$_POST['category']);
        $author = mysqli_real_escape_string($db->link,$_POST['author']);
        $tags = mysqli_real_escape_string($db->link,$_POST['tags']);
        // check for empty fields
        if ( empty($title) || empty($body) || empty($category) || empty($author)){
            $error = "Fields must not be empty!";
        } else {
            // insert new record
            $query = "INSERT INTO posts(title, body, category, author, tags) 
            VALUES('$title', '$body', $category, '$author', '$tags')";
            $insert_row = $db->insert($query);
        }
        
    }
?>
<form method="POST" action="add_posts.php">
  <div class="form-group">
    <label>Post title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control" placeholder="Enter the post"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
    <?php  
            $catQuery = "SELECT * FROM category";
            $allCats = $db->select($catQuery);
            while ( $row = $allCats->fetch_assoc() ):
        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
        <?php endwhile;?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" class="form-control" placeholder="Enter authorname">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input type="text" name="tags" class="form-control" placeholder="Enter tags">
  </div>
  <div>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
    <a href="index.php" class="btn btn-primary">Go back</a>
  </div>
</form>
<?php include 'inc/footer.php'; ?>