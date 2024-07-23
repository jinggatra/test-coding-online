<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo site_url('account/login'); ?>">
        <label>Username</label>
        <input type="text" name="username" required>
        <br>
        <label>Password</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
