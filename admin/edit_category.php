<?php
if (isset($_GET['id'])) {

	require_once "../config/config.php";
	require_once "../libs/Db.php"; 
	require_once "includes/header.php";
	require_once "../helpers/format_helper.php";
	$db = new Db();
	$category = $_GET['id'];
	$sql = "SELECT * FROM `categories` WHERE `id` = '".intval($category)."' LIMIT 1";
	$result = $db->select($sql);
	$category = $result->fetch_assoc();
?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<form action="process.php?action=update&id=<?php echo $category['id'] ?>" method="post">
				<div class="form-group">
					<label for="name">Category Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $category['name']; ?>">
				</div>

				<div class="form-group">
					<input type="submit" name="update_category" value="Update Category" class="btn btn-outline-success">
				</div>
			</form>	
		</div>
	</div>
</div>
	
<?php require_once "includes/footer.php"; } ?>