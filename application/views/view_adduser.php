<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
		<center>
			<h3>Add User</h3>
			<form method="post">
				<table>
					<tr>
						<td>USERNAME</td>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>PASSWORD</td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td>RE-TYPE</td>
						<td><input type="password" name="confpass" /></td>
					</tr>
					<tr>
						<td>USER TYPE</td>
						<td>
							<select name="type">
								<option>Admin</option>
								<option>User</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="buttonAdd" value="Add User" /></td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>