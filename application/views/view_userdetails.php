<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
		<center>
			<h2>User Details</h2>
			<table>
				<tr>
					<td>USER ID</td>
					<td><?php echo $user_id; ?></td>
				</tr>
				<tr>
					<td>USERNAME</td>
					<td><?php echo $username; ?></td>
				</tr>
				<tr>
					<td>PASSWORD</td>
					<td><?php echo $password; ?></td>
				</tr>
				<tr>
					<td>TYPE</td>
					<td><?php echo $type; ?></td>
				</tr>
			</table>
			<br/><br/>
			<a href="http://localhost:8082/ci226/home">Back to Home</a>
		</center>
	</body>
</html>