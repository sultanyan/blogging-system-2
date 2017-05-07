<?php 
	require_once "config/config.php";
	require_once "libs/Db.php"; 
	require_once "includes/header.php";
	require_once "helpers/format_helper.php"; 
?>

<?php 
	$db = new Db();
	$sql = "SELECT * FROM `posts` ORDER BY `id` DESC";
	$result = $db->select($sql);
?>
<div class="container">
  <div class="row">
    <div class="col-sm-8 blog-main">
    <?php while ($row = $result->fetch_assoc()) : ?>
	    <div class="blog-post">
	        <h2 class="blog-post-title"><?php echo $row['post_title'] ?></h2>
	        <p class="blog-post-meta"><?php echo formatDate($row['date']) ?> by <span class="text-muted"><?php echo $row['author'] ?></span> </p>
	        <p><?php echo truncate($row['body']) ?></p>
	        <p> <strong>Tags:</strong> <span style="font-style: italic;"><?php echo $row['tags']; ?></span></p>
	        <a href="post.php?post=<?php echo urlencode($row['id']); ?>" class="btn btn-outline-primary read-more">Read More</a>
	    </div>
    <?php endwhile; ?>        
        
<?php require_once "includes/footer.php"; ?>