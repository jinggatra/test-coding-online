<!DOCTYPE html>
<html>

<head>
    <title>View Post</title>
</head>

<body>
    <h1><?php echo $post['title']; ?></h1>
    <p><?php echo $post['content']; ?></p>
    <p>Author: <?php echo $post['username']; ?></p>
    <p>Date: <?php echo $post['date']; ?></p>
    <a href="<?php echo site_url('post'); ?>">Back to Post List</a>
</body>

</html>