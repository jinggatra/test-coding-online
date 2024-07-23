<!DOCTYPE html>
<html>

<head>
    <title>View Account</title>
</head>

<body>
    <h1><?php echo $account['name']; ?></h1>
    <p>Username: <?php echo $account['username']; ?></p>
    <p>Role: <?php echo $account['role']; ?></p>
    <a href="<?php echo site_url('account'); ?>">Back to Account List</a>
</body>

</html>