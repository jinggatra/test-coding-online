<!DOCTYPE html>
<html>
<head>
    <title>Edit Account</title>
</head>
<body>
    <h1>Edit Account</h1>
    <form method="post" action="<?php echo site_url('account/edit/'.$account['username']); ?>">
        <label>Password</label>
        <input type="password" name="password" required>
        <br>
        <label>Name</label>
        <input type="text" name="name" required>
        <br>
        <label>Role</label>
        <input type="text" name="role" required>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="<?php echo site_url('account'); ?>">Back to Account List</a>
</body>
</html>
