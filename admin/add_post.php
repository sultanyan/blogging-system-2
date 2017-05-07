<?php
	require_once "../config/config.php";
	require_once "../libs/Db.php"; 
	require_once "includes/header.php";
	require_once "../helpers/format_helper.php";
	$db = new Db();
	$sql = "SELECT * FROM `categories` ORDER BY `id` DESC";
	$result = $db->select($sql); 
?>

<div class="container">
	<form action="process.php" method="post">
		<div class="form-group">
			<label for="post_title">Post Title</label>
			<input type="text" class="form-control" name="post_title">
		</div>

		<div class="form-group">
			<label for="category">Category</label>
			<select class="form-control" name="category">
			  	  <option value="#">Select one</option>
			  <?php while($cats = $result->fetch_assoc()): ?>
				  <option value="<?php echo $cats['id']; ?>"><?php echo $cats['name']; ?></option>
			  <?php endwhile; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="body">Post Content</label>
			<textarea name="body" name="body" cols="30" rows="5" class="form-control"></textarea>	
		</div>

		<div class="form-group">
			<label for="author">Author</label>
			<input type="text" class="form-control" name="author">
		</div>

		<div class="form-group">
			<label for="tags">Tags</label>
			<input type="text" class="form-control" name="tags">
		</div>

		<div class="form-group">
			<input type="submit" name="add_post" value="Add Post" class="btn btn-outline-success">
		</div>

	</form>
</div>

<?php require_once "includes/footer.php"; ?>