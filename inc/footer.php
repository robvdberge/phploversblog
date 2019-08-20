<?php
  // Select all categories
  $query = "SELECT * FROM category";
  // Run query
  $all_categories = $db->select($query);
?>
      
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>

    </div><!-- /.blog-main -->
    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0"><?php echo $site_description;?></p>
      </div>
      
      <div class="p-4">
        <h4 class="font-italic">Categories</h4>
        <ol class="list-unstyled mb-0">
          <?php if ( $all_categories ):
              while ( $result = $all_categories->fetch_assoc() ): ?>
          <li><a href="posts.php?category=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
          <?php endwhile; endif;?>
        </ol>
      </div>
      

      <div class="p-4">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->
<footer class="blog-footer">
  <p>
    Php Lovers Blog &copy; 2019
  </p>
</footer>
</body>
</html>