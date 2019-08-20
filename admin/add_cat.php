<?php include 'inc/header.php';?>
<?php
    if ( isset($_POST['submit']) ){
        // validate fields
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        // check for empty fields
        if ( empty($name) ){
            $error = "Name field must not be empty!";
        } else {
            // insert new record
            $query = "INSERT INTO category(name) VALUES('$name')";
            $insert_row = $db->insert($query);
        }
    }
?>
<form method="POST" action="add_cat.php">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter category">
  </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
    <a href="index.php" class="btn btn-primary">Go back</a>
  </div>
</form>
<?php include 'inc/footer.php'; ?>