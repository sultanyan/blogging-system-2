<?php
	require_once "../libs/Db.php";
	require_once "../config/config.php";
	$db = new Db();

	/* Add post action */
	if (isset($_POST['add_post'])) {
		$post_title = mysqli_real_escape_string($db->link, $_POST['post_title']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
		$author = mysqli_real_escape_string($db->link, $_POST['author']);
		$tags = mysqli_real_escape_string($db->link, $_POST['tags']);

		$sql = "INSERT INTO `posts` (`post_title`, `category`, `body`, `author`, `tags`) VALUES('$post_title', '$category', '$body', '$author', '$tags')";
		$result = $db->insert($sql);
	}

	/* Add category action */
	if (isset($_POST['add_category'])) {
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$sql = "INSERT INTO `categories` (`name`) VALUES('$name')";
		$result = $db->insert($sql);
	}

	/* Delete category action */
	if (isset($_GET['action']) && $_GET['action'] == 'delete') {
		$category = $_GET['id'];
		$sql = "DELETE FROM `categories` WHERE `id` = '".intval($category)."' LIMIT 1";
		$result = $db->delete($sql);
	}

	/* Update category action */
	if (isset($_GET['action']) && $_GET['action'] == 'update') {
		if (isset($_POST['update_category'])) {
			$name = mysqli_real_escape_string($db->link, $_POST['name']);
			$id = intval($_GET['id']);
			$sql = "UPDATE `categories` SET `name` = '$name' WHERE `id` = '".$id."' LIMIT 1";
			$result = $db->update($sql);
		}
	}

	/* Delete post action */
	if (isset($_GET['action']) && $_GET['action'] == 'delete_post') {
		$post_id = intval($_GET['id']);
		$sql = "DELETE FROM `posts` WHERE `id` = '".$post_id."' LIMIT 1";
		$result = $db->delete($sql);
	}

	/* Update post action */
	if (isset($_GET['action']) && $_GET['action'] == 'update_post') {
		if (isset($_POST['update_post'])) {
			$id = intval($_GET['post_id']);
			$post_title = mysqli_real_escape_string($db->link, $_POST['post_title']);
			$category = mysqli_real_escape_string($db->link, $_POST['category']);
			$body = mysqli_real_escape_string($db->link, $_POST['body']);
			$author = mysqli_real_escape_string($db->link, $_POST['author']);
			$tags = mysqli_real_escape_string($db->link, $_POST['tags']);

			$sql = "UPDATE `posts` SET `post_title` = '$post_title', `category` = '$category', `body` = '$body', `author` = '$body', `tags` = '$tags' WHERE `id` = '".$id."' LIMIT 1";
			$result = $db->update($sql);
		}
	}