<?php
ob_start();
session_start();
include_once('../database/database.php');

$error = null;
if (isset($_POST['submit'])) {
	if (isset($_POST['user_name'])) {
		$user_name = $_POST['user_name'];
	} else {
		$error = "Please enter user name and password";
	}

	if (isset($_POST['password'])) {
		$password = $_POST['password'];
	} else {
		$error = "please enter user name and password";
	}

	if (isset($user_name) && isset($password)) {
		$query = "SELECT * FROM users WHERE user_name = :user_name AND password = :password";
		$statement = $db->prepare($query);
		$statement->bindValue(":user_name", $user_name);
		$statement->bindValue(":password", $password);
		$statement->execute();
		$user = $statement->fetch();
		$statement->closeCursor();

		if (!empty($user) && $user['access_rights'] == 1) {
			$_SESSION['user_name'] = $user_name;
			$_SESSION['password'] = $password;
			header("location:master_page.php");
		} else {
			$error = "Sai tên đăng nhập hoặc mật khẩu";
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampStudy - Login Admin</title>
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/datepicker3.css" rel="stylesheet">
	<link href="./css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Đăng nhập</div>
				<?php
					if(!isset($_SESSION['user_name'])){
				?>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="User Name" name="user_name" type="input" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<span><span style="color:red;"><?php echo $error; ?></span></span>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ mật khẩu
								</label>
							</div>
							<input type="submit" name="submit" class="btn btn-primary" value="Log In">
						</fieldset>
					</form>
				</div>
				<?php 
					}else{
						header('location:master_page.php');
					}
				?>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>