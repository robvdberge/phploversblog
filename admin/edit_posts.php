<?php include 'inc/header.php';?>
<?php
    if ( !isset($_GET['id']) && !isset($_GET['del'])){
        header('location: index.php');
        exit();
    } else {
        $id = $_GET['id'];
    }
    $db = new Database;
    if ( isset($_POST['submit']) ){
        // validate fields
        $title    = mysqli_real_escape_string($db->link, $_POST['title']);
        $body     = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author   = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags     = mysqli_real_escape_string($db->link, $_POST['tags']);
        // check for empty fields
        if ( empty($title) || empty($body) || empty($category) || empty($author)){
            $error = "Fields must not be empty!";
        } else {
            // insert new record
            $query = "UPDATE posts SET
              title = '$title',
              body = '$body', 
              category = $category, 
              author = '$author', 
              tags = '$tags'
              WHERE id = '$id'";
            $update_row = $db->update($query);
        }  
    }
    if ( isset($_GET['del']) ){
      if ( $_GET['del'] == 'true'){
        $query = "DELETE FROM posts WHERE id = $id";
        $delete_row = $db->delete($query);
      }
    }
?>
<?php
    
    $query = "SELECT posts.*, category.name 
                FROM posts LEFT JOIN category on posts.category = category.id 
                WHERE posts.id = $id";
    $post = $db->select($query)->fetch_assoc();
?>
<form method="POST" action="edit_posts.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Post title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control"><?php echo $post['body'];?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php  
            $catQuery = "SELECT * FROM category";
            $allCats = $db->select($catQuery);
            while ( $row = $allCats->fetch_assoc() ):
        ?>
        <option value="<?php echo $row['id'];?>"
        <?php if ($post['category'] == $row['id']){ echo "selected";}?>><?php echo $row['name'];?></option>
        <?php endwhile;?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" class="form-control" value="<?php echo $post['author'];?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input type="text" name="tags" class="form-control" value="<?php echo $post['tags'];?>">
  </div>
  <div>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
    <a href="index.php" class="btn btn-primary">Cancel</a>
    <a href="edit_posts.php?id=<?php echo $id;?>&del=true" class="btn btn-warning">Delete</a>
  </div>
</form>
<?php include 'inc/footer.php'; ?>