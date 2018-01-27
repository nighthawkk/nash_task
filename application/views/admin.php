<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['admin_logged_in'])) {
$username = ($this->session->userdata['admin_logged_in']['admin_username']);
$email = ($this->session->userdata['admin_logged_in']['adminid']);
} else {
header("location: ".site_url('admin')."");
}
?>
<head>
	<title>Admin Panel</title>
</head>
<body>
<h1 align="center">User Management</h1>

<?php
		if($userArray->num_rows() > 0)
		{ 
?>
<input type="text" id="search_input" onkeyup="myFunction()" placeholder="Search for usernames..">
<b id="logout"><a href="do_logout">Logout</a></b>



<table id="myTable">
	<tr class="header">
		<th style="width:10%;">User Id</th>
		<th style="width:15%;">Username</th>
		<th style="width:30%;">Email</th>
		<th style="width:15%;">Password</th>
		<th style="width:30%;">Edit/Delete</th>

	</tr>

	<?php
			foreach ($userArray->result() as $value) {
	?>
				<tr>
					<td><?php echo $value->id ?></td>
					<td><?php echo $value->username ?></td>
					<td><?php echo $value->email ?></td>
					<td><?php echo $value->password ?></td>
					<td>
						<form action="<?php echo site_url('admin/edit_user');?>" method="post"> <input type="hidden" name="id" value="<?php echo $value->id?>"> <button type="submit" class="btn info">Edit</button></form> <form action="<?php echo site_url('admin/delete_user');?>" method="post"> <input type="hidden" name="id" value="<?php echo $value->id?>"><button type="submit" class="btn danger">Delete</button></form>
				    </td>
			    </tr>
<?php
			}
		}
		else
		{
			echo ' <h3 align="center">No data found.</h3>';
		}
	?>
</table>

<style type="text/css">
	#search_input {
    width: 16%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
	}

	#myTable {
	    border-collapse: collapse; /* Collapse borders */
	    width: 100%; /* Full-width */
	    border: 1px solid #ddd; /* Add a grey border */
	    font-size: 18px; /* Increase font-size */
	}

	#myTable th, #myTable td {
	    text-align: left; /* Left-align text */
	    padding: 12px; /* Add padding */
	}

	#myTable tr {
	    /* Add a bottom border to all table rows */
	    border-bottom: 1px solid #ddd; 
	}

	#myTable tr.header, #myTable tr:hover {
	    /* Add a grey background color to the table header and on hover */
	    background-color: #f1f1f1;
	}


	.btn {
    border: 2px solid black;
    background-color: white;
    color: black;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
	}

	.info {
    border-color: #2196F3;
    color: dodgerblue
	}

	.info:hover {
	    background: #2196F3;
	    color: white;
	}

	.danger {
    border-color: #f44336;
    color: red
	}

	.danger:hover {
	    background: #f44336;
	    color: white;
	}


</style>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("search_input");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>



</body>
</html>