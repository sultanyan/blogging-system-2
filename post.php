<?php 
	require_once "config/config.php";
	require_once "libs/Db.php"; 
	require_once "helpers/format_helper.php";
	require_once "includes/header.php"; 
?>

<?php 
	if (isset($_GET['post'])) {
		$id = $_GET['post'];
		$sql = "SELECT * FROM `posts` WHERE `id` = '".intval($id)."' ORDER BY `id` DESC LIMIT 1";
		$db = new Db();
		$result = $db->select($sql);
		$post = $result->fetch_assoc();
?>
	<div class="container">
	  <div class="row">
	    <div class="col-sm-8 blog-main">
	      <div class="blog-post">
	        <h2 class="blog-post-title"><?php echo $post['post_title'] ?></h2>
	        <p class="blog-post-meta"><?php echo formatDate($post['date']) ?> by <?php echo $post['author']; ?></p>
	        <p><?php echo $post['body']; ?></p>
	        </div><!-- /.blog-post -->
	        
<?php require_once "includes/footer.php"; 
}
?>