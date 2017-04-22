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

<form action="log_in.php"  method="POST">
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
				<td><strong>USER ID</strong></td>
				<td><strong>: <input type="text" name="userid"></strong></td>
			</tr>
			<tr>
				<td><strong>PASSWORD</strong></td>
				<td><strong>: <input type="password" name="password"></strong></td>
			</tr>
			<tr>
				<td></td>
				<td align="right"> Forget Password </td>
			</tr>
			<tr><td></td><td></td></tr>
			<tr><td></td><td></td></tr>
			<tr>
				<td align="right"> <input type="submit" value="Log in"></td>
				<td align="left"> &nbsp;&nbsp;<input type="reset" value="Reset"> </td>
			</tr>
		</table>
	</div>
</form>

</body>
</html>

<?php
	require 'connect.inc.php';
	if(isset($_POST['userid']) && isset($_POST['password']))
	{
		if(!empty($_POST['userid']) && !empty($_POST['password']))
		{
			$userid = $_POST['userid'];
			$password = md5($_POST['password']);
			$query = "SELECT * FROM users WHERE userid='$userid' AND password='$password' ";
			$result = mysqli_query($con,$query);
      		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      		$count = mysqli_num_rows($result);
      		if($result)
      		{
      			ob_start();
				session_start();
				$_SESSION['userid'] = $userid;
				header('Location:search.php');
      			echo "<h1 align=\"center\">You are loged-in successfully!</h1>";
      		}
      		else
      		{
      			echo "<h3><font color=\"red\">* Userid and password didn't match up.</font></h3>";
      		}
		}
		else
		{
			echo "<font color=\"red\"><h3>* Please enter userid and password both.</h3></font>";
		}
	}
?>