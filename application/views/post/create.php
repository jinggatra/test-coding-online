<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
</head>

<body>
    <h1>Create Post</h1>
    <form method="post" action="<?php echo site_url('post/create'); ?>">
        <label>Title</label>
        <input type="text" name="title" required>
        <br>
        <label>Content</label>
        <textarea name="content" required></textarea>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="<?php echo site_url('post'); ?>">Back to Post List</a>
</body>

</html>