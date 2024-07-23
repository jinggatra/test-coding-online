<!DOCTYPE html>
<html>

<head>
    <title>Account List</title>
</head>

<body>
    <h1>Account List</h1>
    <a href="<?php echo site_url('account/create'); ?>">Create Account</a>
    <a href="<?php echo site_url('account/logout'); ?>">Logout</a>
    <ul>
        <?php foreach ($accounts as $account) : ?>
            <li>
                <a href="<?php echo site_url('account/view/' . $account['username']); ?>">
                    <?php echo $account['name']; ?>
                </a>
                <a href="<?php echo site_url('account/edit/' . $account['username']); ?>">Edit</a>
                <a href="<?php echo site_url('account/delete/' . $account['username']); ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>