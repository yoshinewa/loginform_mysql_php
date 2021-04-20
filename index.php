<!DOCTYPE html>
<html>
<head>
	<title>LOGIN SE101.L21.PMCL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="login.php" method="post">
		<h2>LOGIN SE101.L21.PMCL</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Username</label>
		<input type="text" name="usrname" placeholder="Username">

		<label>Password</label>
		<input type="password" name="password" placeholder="Password">

		<button type="submit">Login</button>
	</form>
</body>
</html>