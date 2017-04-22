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

<form action="sign_up.php"  method="POST">
	<div id="formarea">
		<br><br><br><br><br><br><br><br><br>
		<table align="center">
			<tr>
				<td align="center"><strong><a href="sign_up.php">SIGN-UP</a></strong></td>
				<td align="center"><strong><a href="log_in.php">LOG-IN</a></strong></td>
			</tr>
			<tr><td></td><td></td></tr>
			<tr><td></td><td></td></tr>
			<tr><td></td><td></td></tr>
			<tr>
				<td><strong>NAME</strong></td>
				<td><strong>: <input type="text" name="name"></strong></td>
			</tr>
			<tr>
				<td><strong>USER ID</strong></td>
				<td><strong>: <input type="text" name="userid"></strong></td>
			</tr>
			<tr>
				<td><strong>PASSWORD</strong></td>
				<td><strong>: <input type="password" name="password"></strong></td>
			</tr>
			<tr>
				<td><strong>CONFIRM PASSWORD</strong></td>
				<td><strong>: <input type="password" name="con_password"></strong></td>
			</tr>
			<tr>
				<td></td>
				<td align="right"> <a href="privacy_policy.php">Privacy policy</a> </td>
			</tr>
			<tr><td></td><td></td></tr>
			<tr><td></td><td></td></tr>
			<tr>
				<td align="right"> <input type="submit" value="Sign up"></td>
				<td align="left"> &nbsp;&nbsp;<input type="reset" value="Reset"> </td>
			</tr>
		</table>
	</div>
</form>

</body>
</html>

<?php
	require 'connect.inc.php';
	if(isset($_POST['name']) && isset($_POST['userid']) && isset($_POST['password']) && isset($_POST['con_password']))
	{
		if(!empty($_POST['name']) && !empty($_POST['userid']) && !empty($_POST['password']) && !empty($_POST['con_password']))
		{
			$name = $_POST['name'];
			$userid = $_POST['userid'];
			$password = md5($_POST['password']);
			$con_password = md5($_POST['con_password']);
			$query = " SELECT userid FROM users where userid = '$userid' ";
			if($query_run = mysqli_query( $con , $query))
			{
				if(mysqli_num_rows($query_run) == NULL)
				{
					if($password == $con_password)
					{
						$query_signup = " INSERT INTO users VALUES(NULL,'$userid','$name','$password') ";
						if( $query_signup_run = mysqli_query( $con, $query_signup ) )
						{
							echo "<h1 align=\"center\">You have successfully registered - ".$name."!</h1><br>";
						}
						else
						{
							echo "<h3><font color=\"red\">* Can't perform the operation now.Please try again later.</font></h3>";
						}
					}
					else
					{
						echo "<h3><font color=\"red\">* You entered different passwords.</font></h3>";
					}
				}
				else
				{
					echo "<h3><font color=\"red\">* This Userid is already registered.Please either go to Log-in page or try again with a different Userid.</font></h3>";
				}
			}
			else
			{
				echo "<h3><font color=\"red\">* Can't perform the operation now.Please try again later.</font></h3>";
			}
		}
		else
		{
			echo "<h3><font color=\"red\">* Please Fill In All Spaces.</font></h3>";
		}
	}
?>