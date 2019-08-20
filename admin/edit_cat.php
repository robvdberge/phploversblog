<?php include 'inc/header.php';?>
<?php
    if ( !isset($_GET['id']) && !isset($_GET['del'])){
        header('location: index.php');
        exit();
    } else {
        $id = $_GET['id'];
    }
    $db = new Database;
    $query = "SELECT * FROM category WHERE id = $id";
    $post = $db->select($query)->fetch_assoc();

    if ( isset($_POST['submit']) ){
      // validate fields
      $name    = mysqli_real_escape_string($db->link, $_POST['name']);
      // check for empty fields
      if ( empty($name) ){
          $error = "Fields must not be empty!";
      } else {
          // insert new record
          $query = "UPDATE category SET
            name = '$name'
            WHERE id = '$id'";
          $update_row = $db->update($query);
      }  
    }
    if ( isset($_GET['del']) ){
      if ( $_GET['del'] == 'true'){
        $query = "DELETE FROM category WHERE id = $id";
        $delete_row = $db->delete($query);
      }
    }

?>
<form method="POST" action="edit_cat.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $post['name'];?>">
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
    <a href="index.php" class="btn btn-primary">Cancel</a>
    <a href="edit_cat.php?id=<?php echo $id;?>&del=true" name="delete" class="btn btn-warning">Delete</a>
  </div>
</form>
<?php include 'inc/footer.php'; ?>