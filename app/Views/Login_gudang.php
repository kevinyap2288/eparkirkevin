<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>">
	<script src="<?=base_url('js/bootstrap.bundle.min.js')?>"type="text/javascript"></script>
</head>
<body>
<div class="container mt-3">
<h3 align="center">login</h3>
<form action="<?=base_url('/home/aksi_login')?>" method="POST">
<table>
	<tr>
		<label for="user">email:</label>
		<input type="email" class="form-control" id="user" placeholder="Enter email" name="user" required>
	</tr>
	</div>
	<div class="container mb-3">
	<tr>
		<label for="pass">Password:</label>
		<input type="password"class="form-control" id="pass" placeholder="Enter password" name="Password"required>
	</tr>
</div>
		<tr>
		<td>
		<button type="submit" class="btn btn-success">login</button>
		</td>
	</tr>
</table>	
</form>
</body>
</html>