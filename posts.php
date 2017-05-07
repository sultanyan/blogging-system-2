<?php 
    require_once "config/config.php";
    require_once "libs/Db.php"; 
    require_once "includes/header.php";
    require_once "helpers/format_helper.php"; 
    $db = new Db();
?>

<?php 
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $sql = "SELECT * FROM `posts` WHERE `category` = '".intval($category)."' ORDER BY `id` DESC";
        $result = $db->select($sql);
    }else{
        $sql = "SELECT * FROM `posts` ORDER BY `id` DESC";
        $result = $db->select($sql);
    }
?>
<div class="container">
  <div class="row">
    <div class="col-sm-8 blog-main">
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['post_title'] ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']) ?> by <span class="text-muted"><?php echo $row['author'] ?></span> </p>
            <p><?php echo $row['body'] ?></p>
            <p> <strong>Tags:</strong> <span style="font-style: italic;"><?php echo $row['tags']; ?></span></p>
        </div>
    <?php endwhile; ?>                
<?php require_once "includes/footer.php"; ?>