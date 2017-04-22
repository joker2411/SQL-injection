<br><br><br><br><br><br><br>
<?php
	require 'connect.inc.php';
	session_start();
	$userid = $_SESSION['userid'];
	echo "<h2 align=\"center\"> <font color=\"red\">You are logged in successfully - ".$userid."</font> </h2>";
?>

<!DOCTYPE html>
<html>

<head>
	<style>
    	body
        {
            background:url('c.jpg') no-repeat center center fixed;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            margin: 0;
            padding: 0;
        }

    </style>
</head>

<body>
<form action="search.php"  method="POST">
	<div id="formarea">
		<table align="center">
			<tr>
				<td><strong>ID </strong></td>
				<td><strong>: <input type="text" name="search"></strong></td>
			</tr>
		</table>
		<table align="center">
			<td align="right"> <input type="submit" value="Search"></td>
		</table>
	</div>
</form>

</body>
</html>


<?php
	require 'connect.inc.php';
	session_start();
	$userid = $_SESSION['userid'];
	echo "<h4 align=\"center\"> <a href=\"logout.php\"> <font color=\"red\">LOG-OUT</font> </a> </h4>";
	if(isset($_POST['search']))
	{
		if(!empty($_POST['search']))
		{
			$search = $_POST['search'];
			$query="SELECT userid,name FROM users WHERE id='$search' ";
			if(mysqli_multi_query($con,$query))
			{
				do
				{
					if($result = mysqli_store_result($con))
					{
						while ($row=mysqli_fetch_row($result))
						{
							$first=$row[0];
		      				$second=$row[1];
		      				echo "first - ".$first."<br>second - ".$second."<br><br>";
						}
					}
				}
				while (mysqli_next_result($con));
			}
			else
				echo "<font color=\"red\"><h3>* Please enter your own userid.Don't mess around.</h3></font>";
		}
		else
		{
			echo "<font color=\"red\"><h3>* Please enter userid to search.</h3></font>";
		}
	}
?>