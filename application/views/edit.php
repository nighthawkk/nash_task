<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
<h1 align="center">User Management</h1>
<h2 align="center">Edit User Detail</h2>

<?php           
    foreach ($userArr->result() as $value) {
?>

<form align="center" action="<?php echo site_url('admin/update');?>" method="post">

    UserId:
    <input type="text" name="id" value="<?php echo $value->id ?>" readonly="">
    <br>

	Username:
	<input type="text" name="username" value="<?php echo $value->username ?>" required>
	<br>
	Email:
	<input type="email" name="email" value="<?php echo $value->email ?>" required>
	<br>
	Password:
	<input type="text" id="password" name="password" value="<?php echo $value->password ?>" required>
	<br>
	<input type="submit" id="submit" name="submit" value="Update">
</form>

<?php } ?>


</body>

</html>
