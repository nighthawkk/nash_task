<!DOCTYPE html>
<html>
<head>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {padding: 14px 40px;}
.button2 {padding: 14px 40px;}
.button3 {padding: 14px 40px;}

</style>
</head>
<body>

<h1 align="center" >Welcome</h1>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<center>
<button onclick="location.href='<?php echo site_url('welcome/register'); ?>';" class="button button1">Register User</button>
<button onclick="location.href='<?php echo site_url('user'); ?>';" class="button button2">User login</button>
<button onclick="location.href='<?php echo site_url('admin'); ?>';" class="button button3">Admin login</button>
</center>

</body>
</html>
