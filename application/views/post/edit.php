<!DOCTYPE html>
<html>

<head>
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>
    <form method="post" action="<?php echo site_url('post/edit/' . $post['idpost']); ?>">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $post['title']; ?>" required>
        <br>
        <label>Content</label>
        <textarea name="content" required><?php echo $post['content']; ?></textarea>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="<?php echo site_url('post'); ?>">Back to Post List</a>
</body>

</html>