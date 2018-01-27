<!DOCTYPE html>
<html>
<?php 

if (isset($this->session->userdata['user_logged_in'])) {
$username = ($this->session->userdata['user_logged_in']['username']);
$email = ($this->session->userdata['user_logged_in']['userid']);
} else {
header("location: ".site_url('user')."");
}

?>
<head>
	<title></title>
</head>
<body>

	<h1 align="center">User Dashboard</h1>


	<form action="<?php echo site_url('welcome/twitter'); ?>" method="post">
		<input type="text" id="search_input" name="search" placeholder="Search Tweets">
		<input type="submit">
	</form>
	<b id="logout"><a href="<?php echo site_url('user/do_logout'); ?>">Logout</a></b>

	<?php
			if($twits)
			{ 
	?>

	



	<table id="myTable">
		<tr class="header">
			<th style="width:10%;">Twitter Handle</th>
			<th style="width:15%;">Name</th>
			<th style="width:30%;">Tweet</th>
			<th style="width:15%;">Created at</th>

		</tr>

		<?php
				foreach ($twits->statuses as $value) {
		?>
					<tr>
						<td><?php echo $value->user->screen_name ?></td>
						<td><?php echo $value->user->name ?></td>
						<td><?php echo $value->text ?></td>
						<td><?php echo date('Y-m-d H:i', strtotime($value->created_at)) ?></td>
						
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

	


</body>
</html>