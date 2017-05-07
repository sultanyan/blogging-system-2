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
	<div class="row">
		<div class="col-md-8">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Actions</th>
				</tr>
				
				<?php while($row = $result->fetch_assoc()): ?>	
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td>
							<a href="edit_category.php?id=<?php echo $row['id'] ?>">Edit</a>
							<a href="process.php?action=delete&id=<?php echo $row['id']; ?>">Delete</a>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>	
		</div>

		<div class="col-md-4">
			<form action="process.php" method="post">
				<div class="form-group">
					<label for="name">Category Name</label>
					<input type="text" class="form-control" name="name">
				</div>

				<div class="form-group">
					<input type="submit" name="add_category" value="Add Category" class="btn btn-outline-success">
				</div>
			</form>		
		</div>
	</div>
</div>
	



<?php require_once "includes/footer.php"; ?>