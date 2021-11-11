<?php
ob_start();
session_start();
include_once('../database/database.php');

if($_SESSION['user_name'] && $_SESSION['password']){
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyCamp - Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		ion-icon {
  			pointer-events: none; 
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="master_page.php"><span>StudyCamp</span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar"  style="overflow-y:hidden;">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['user_name'] ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			
			<div class="clear"></div>
			<div class="container">
				<a href="" style="text-decoration: none;">Chỉnh sửa hồ sơ <ion-icon name="create-outline"></ion-icon></a>
			</div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav" id="side_bar">
			<li class="mi"><a href="master_page.php"><em class="fa fa-dashboard">&nbsp;</em> Trang chủ</a></li>
			<li class="mi"><a href="master_page.php?page_layout=categories"><em class="fa fa-book">&nbsp;</em> Danh mục</a></li>
			<li class="mi"><a href="master_page.php?page_layout=courses"><em class="fa fa-clone">&nbsp;</em> Khóa học<h1></h1></a></li>
			<li class="mi"><a href="master_page.php?page_layout=users"><em class="fa fa-users">&nbsp;</em> Thành viên</a></li>
			<li class="mi"><a href="master_page.php?page_layout=comments"><em class="fa fa-commenting-o">&nbsp;</em> Bình luận</a></li>
			<!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
						</a></li>
					<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
						</a></li>
					<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
						</a></li>
				</ul>
			</li> -->
			<hr>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<?php
		if (isset($_GET['page_layout'])) {
			switch ($_GET['page_layout']) {
				case 'categories':
					include_once('./categories.php');
					break;
				case 'courses':
					include_once('./courses.php');
					break;
				case 'comments':
					include_once('./comments.php');
					break;
				case 'users':
					include_once('./users.php');
					break;
				case 'add_category':
					include_once('./category/add_category.php');
					break;
				case 'edit_category':
					include_once('./category/edit_category.php');
					break;
				case 'search_category':
					include_once('./category/search_category.php');
					break;
				case 'add_course':
					include_once('./course/add_course.php');
					break;
				
			}
		} else {
			include_once('./dashboard.php');
		}
		?>
	</div>
	<!--/.main-->


	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script>
		// let menu = document.querySelectorAll('.mi');
		// for(let i = 0; i < menu.length; i++){
		// 	menu[i].onclick = function(){
		// 					console.log(i);
		// 		let j= 0;
		// 		while(j < menu.length){
		// 			menu[j++].className = 'mi';
		// 		}
		// 		menu[i].className = 'mi active';
		// 	};
		// }

		// window.onload = function() {
		// 	var chart1 = document.getElementById("line-chart").getContext("2d");
		// 	window.myLine = new Chart(chart1).Line(lineChartData, {
		// 		responsive: true,
		// 		scaleLineColor: "rgba(0,0,0,.2)",
		// 		scaleGridLineColor: "rgba(0,0,0,.05)",
		// 		scaleFontColor: "#c5c7cc"
		// 	});
		// };
	</script>
</body>

</html>
<?php  
}else{
	header('location:index.php');
}
?>