<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
</head>
<body>
    <h1>Create Account</h1>
    <form method="post" action="<?php echo site_url('account/create'); ?>">
        <label>Username</label>
        <input type="text" name="username" required>
        <br>
        <label>Password</label>
        <input type="password" name="password" required>
        <br>
        <label>Name</label>
        <input type="text" name="name" required>
        <br>
        <label>Role</label>
        <input type="text" name="role" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="<?php echo site_url('account'); ?>">Back to Account List</a>
</body>
</html>
