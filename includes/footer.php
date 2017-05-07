<?php require_once "libs/Db.php"; ?>
<?php
  $db = new Db(); 
  $sql = "SELECT * FROM `categories` ORDER BY `id` DESC";
  $result = $db->select($sql);
?>
</div><!-- /.blog-main -->
    <div class="col-sm-3 offset-sm-1 blog-sidebar">
      <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>
      <div class="sidebar-module">
        <h4>Categories</h4>
        <ol class="list-unstyled">
        <?php while ($row = $result->fetch_assoc()) : ?>
          <li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name'] ?></a></li>
        <?php endwhile; ?>
        </ol>
      </div>
    </div><!-- /.blog-sidebar -->
  </div><!-- /.row -->
</div><!-- /.container -->

<footer class="blog-footer">
  <p>&copy; Rightless</a>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>

<script src="js/jquery3.1.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>