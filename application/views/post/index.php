<!DOCTYPE html>
<html>

<head>
    <title>Post List</title>
</head>

<body>
    <h1>Post List</h1>
    <a href="<?php echo site_url('post/create'); ?>">Create Post</a>
    <a href="<?php echo site_url('account/logout'); ?>">Logout</a>
    <ul>
        <?php foreach ($posts as $post) : ?>
            <li>
                <a href="<?php echo site_url('post/view/' . $post['idpost']); ?>">
                    <?php echo $post['title']; ?>
                </a> by <?php echo $post['name']; ?>
                <a href="<?php echo site_url('post/edit/' . $post['idpost']); ?>">Edit</a>
                <a href="<?php echo site_url('post/delete/' . $post['idpost']); ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>