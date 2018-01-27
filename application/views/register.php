
<html>
<head>
	<title>Register</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
    <h1 align="center" >Register User </h1>

<!--<form action="<?php echo site_url('welcome/upload');?>" method="post">-->
    <div>
    	<form align="center" id="data" method="post" enctype="multipart/form-data">

        	Username:
        	<input type="text" name="username" required>
        	<br><br>
        	Email:
        	<input type="email" name="email" required>
        	<br><br>
        	Password:
        	<input type="password" id="password" name="password" required>
        	<br><br>
        	Confirm Passowrd:
        	<input type="password" id="confirm_password" name="confirm_password" required>
        	<br><br>
        	Upload Photo:
        	<input type="file" name="photo" id="photo" required>
            <br><br>
        	<input type="submit" id="submit" name="submit">
        	<input type="reset">
        </form>
    </div>


<!-- JQuery to submit form -->
<script>
	$("form#data").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: window.location.pathname,
        type: 'POST',
        data: formData,
        success: function (data) {
            alert("Data Posted... (If image is valid it will be uploaded)")
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
   
</script>

<!-- Validation -->
<script type="text/javascript">
    $(function () {
        $("#submit").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>


</body>

</html>
