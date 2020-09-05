<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style >
	.contaner{
			text-align: center;
		 	justify-content: center;		
	}
		 .form-control{
		 		padding: 10px;
		 }
	</style>
</head>
<body>

<div class="contaner">
	<h1>Login</h1>
	<form class="form-control" method="post" action="<?php echo base_url('welcome/login_user');?>">
		<div>
			<div class="form-control">
			<label>Email Id</label>
		<input type="text" name="email" value="">
		</div>
		<div class="form-control">
			<label>Password</label>
		<input type="password" name="password" value="">
		</div>
		<div class="form-control">
			<button>Login</button>
		</div>
		</div>
	</form>
</div>
</body>
</html>