<!DOCTYPE html>
<html>
<?php
echo $msg; 
if (isset($this->session->userdata['admin_logged_in'])) {

header("location: http://localhost/nash_task/index.php/admin/dash");
}


?>
<head>
	<title>Admin Login</title>
</head>
<body>

	<div id='login_form'>
        <form align='center' action='<?php echo site_url();?>/admin/process' method='post' name='process'>
            <h2>Admin Login</h2>
            <br />            
            <label for='username'>Username</label>
            <input type='text' name='username' id='username' size='25' />
            <br>
            <br>
        
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='25' />  
            <br>
            <br>                         
        
            <input type='Submit' value='Login' />            
        </form>
    </div>

</body>
</html>


