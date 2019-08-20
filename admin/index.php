<?php include 'inc/header.php';?>
<?php
    $db = new Database;
    $query = "SELECT posts.*, category.name FROM posts LEFT JOIN category on posts.category = category.id ORDER BY date DESC";
    $posts = $db->select($query);
?>

    <table class="table table-striped">
        <tr>
            <th>Post Id</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
        </tr>
            <?php if ($posts):
                     while ( $row = $posts->fetch_assoc() ): ?>
        <tr>         
            <td><?php echo $row['id'];?></td>
            <td><a href="edit_posts.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['author'];?></td>
            <td><?php echo $row['date'];?></td>
        </tr>
            <?php endwhile;
                endif; ?>
        
    </table>

    <table class="table table-striped">
        <tr>
            <th>Category Id</th>
            <th>Category Name</th>
        </tr>
        
        <?php  
            $catQuery = "SELECT * FROM category ORDER BY name ASC";
            $allCats = $db->select($catQuery);
            while ( $row = $allCats->fetch_assoc() ):
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><a href="edit_cat.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
        </tr>
        <?php endwhile;?>
        <!-- Invoegen Updatefunctie-->
        <!-- Invoegen Deletefunctie-->
    </table>

<?php include 'inc/footer.php'; ?>