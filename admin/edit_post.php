<?php
if (isset($_GET['post_id'])) {
	require_once "../config/config.php";
	require_once "../libs/Db.php"; 
	require_once "includes/header.php";
	require_once "../helpers/format_helper.php";
	$db = new Db();
	$sql = "SELECT * FROM `categories` ORDER BY `id` DESC";
	$result = $db->select($sql);

	$id = intval($_GET['post_id']);
	$post_sql = "SELECT * FROM `posts` WHERE `id` = '".$id."'";
	$post_q = $db->select($post_sql);
	$post = $post_q->fetch_assoc();

	$cat_sql = "SELECT * FROM `categories` WHERE `id` = '".intval($post['category'])."'";
	$cat_q = $db->select($cat_sql);
	$cat = $cat_q->fetch_assoc();
?>

<div class="container">
	<form action="process.php?action=update_post&id=<?php echo $post['id'] ?>" method="post">
		<div class="form-group">
			<label for="post_title">Post Title</label>
			<input type="text" class="form-control" name="post_title" value="<?php echo $post['post_title']; ?>">
		</div>

		<div class="form-group">
			<label for="category">Category</label>
			<select class="form-control" name="category">
				  <option value="<?php echo $post['category'] ?>"><?php echo $cat['name']; ?></option>  
			  <?php while($cats = $result->fetch_assoc()): ?>
				  <option value="<?php echo $cats['id']; ?>"><?php echo $cats['name']; ?></option>
			  <?php endwhile; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="body">Post Content</label>
			<textarea name="body" name="body" cols="30" rows="5" class="form-control"><?php echo $post['body'] ?></textarea>	
		</div>

		<div class="form-group">
			<label for="author">Author</label>
			<input type="text" class="form-control" name="author" value="<?php echo $post['author']; ?>">
		</div>

		<div class="form-group">
			<label for="tags">Tags</label>
			<input type="text" class="form-control" name="tags" value="<?php echo $post['tags']; ?>">
		</div>

		<div class="form-group">
			<input type="submit" name="update_post" value="Update Post" class="btn btn-outline-success">
		</div>

	</form>
</div>

<?php require_once "includes/footer.php"; } ?>