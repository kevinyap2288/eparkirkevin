<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>">
	<script src="<?=base_url('js/bootstrap.bundle.min.js')?>"type="text/javascript"></script>
</head>
<body>


<h3>User</h3>
<form action="<?= base_url('home/simpan_user') ?>" method="POST">
<table>
	<tr>
		<label for="user">Username:</label>
		<input type="text" class="form-control" id="user" placeholder="Enter Username" name="user"required value="<?=$ssleo->username?>">
	</tr>
		<tr>
		<label for="pass">Password:</label>
		<input type="password"class="form-control" id="pass" placeholder="Enter password" name="Password" required value="<?=$ssleo->password?>">
	</tr>
		 <div class="container ml-3">
    <label for="sel1" class="form-label">Level:</label>
    <select class="form-select" id="lvl" name="level" value="<?=$ssleo->level?>">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>

		<tr>
		<input type="hidden" value="<?=$ssleo->id_user?>" name="id">
		<button type="submit" class="btn btn-primary">Submit</button>
	</tr>


</table>
	

</form>
</body>
</html>