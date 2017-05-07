<?php
	require_once "../config/config.php";
	require_once "../libs/Db.php"; 
	require_once "includes/header.php";
	require_once "../helpers/format_helper.php"; 
	$db = new Db();
	$sql = "SELECT * FROM `posts` ORDER BY `id` DESC";
	$result = $db->select($sql);
?>

<div class="container">

	<?php
		if (isset($_GET['msg'])) {
			echo displayMsg($_GET['msg']);
		}
	?>

	<table class="table table-hover">
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Category</th>
			<th>Author</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
		
	<?php while($row = $result->fetch_assoc()): ?>	
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['post_title']; ?></td>
			<td>
				<?php 
					$cat_q = "SELECT * FROM `categories` WHERE `id` = '".intval($row['category'])."' ORDER BY `id` DESC";
					$cat_res = $db->select($cat_q);
					while ($category = $cat_res->fetch_assoc()) : ?>
						<?php echo $category['name']; ?>
					<?php endwhile;?>	
			</td>
			<td><?php echo $row['author']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td>
				<a href="edit_post.php?post_id=<?php echo $row['id'] ?>">Edit</a>
				<a href="process.php?action=delete_post&id=<?php echo $row['id'] ?>">Delete</a>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>

<?php require_once "includes/footer.php"; ?>