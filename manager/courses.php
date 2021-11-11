<script>
	function deleteCategories() {
		var conf = confirm("Bạn có chắc chắn muốn xóa khóa học này không?");
		return conf;
	}
</script>

<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$rowsPerPage = 6;
$start = $page * $rowsPerPage - $rowsPerPage;

$query = "SELECT * FROM courses INNER JOIN categories ON courses.category_id = categories.category_id ORDER BY course_id ASC LIMIT $start, $rowsPerPage";
$statement = $db->prepare($query);
// $statement->bindValue(':perRow',$perRow);
// $statement->bindValue(':rowsPerPage',$rowsPerPage);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();

$statement2 = $db->prepare("SELECT * FROM courses");
$statement2->execute();
$totalRows = $statement2->rowCount();
$statement2->closeCursor();
$totalPages = ceil($totalRows / $rowsPerPage);

$listPage = "";
for ($i = 1; $i <= $totalPages; $i++) {
	if ($i == $page) {
		$listPage .= '<li class="page-item active"><a class="page-link" href="master_page.php?page_layout=courses&page=' . $i . '">' . $i . '</a></li>';
	} else {
		$listPage .= '<li class="page-item"><a class="page-link" href="master_page.php?page_layout=courses&page=' . $i . '">' . $i . '</a></li>';
	}
}

$pre = $page == 1 ? 1 : $page - 1;
$next = $page == $totalPages ? $totalPages : $page + 1;
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
		<li class="active">Khóa học</li>
	</ol>
</div>
<!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Quản lý khóa học</h1>
	</div>
</div>
<!--/.row-->

<!-- <div class="row">
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<div class="easypiechart" id="easypiechart-teal" data-percent="56"><span class="percent">56%</span></div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<div class="easypiechart" id="easypiechart-blue" data-percent="92"><span class="percent">92%</span></div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<div class="easypiechart" id="easypiechart-orange" data-percent="65"><span class="percent">65%</span></div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<div class="easypiechart" id="easypiechart-red" data-percent="27"><span class="percent">27%</span></div>
				</div>
			</div>
		</div>
	</div> -->
<!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="master_page.php?page_layout=add_course"><button type="button" class="btn btn-primary">Thêm khóa học mới</button></a>
				<ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
							<em class="fa fa-cogs"></em>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
								<ul class="dropdown-settings">
									<li><a href="#">
											<em class="fa fa-cog"></em> Settings 1
										</a></li>
									<li class="divider"></li>
									<li><a href="#">
											<em class="fa fa-cog"></em> Settings 2
										</a></li>
									<li class="divider"></li>
									<li><a href="#">
											<em class="fa fa-cog"></em> Settings 3
										</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
			</div>


			<div class="panel-body">
				<div class="container-fluid">
					<div class="row">
						<?php
						foreach ($courses as $course) :
						?>
							<div class="col-lg-4">
								<div class="card">
									<a href=""><img src="./images/<?php echo $course['img'] ?>" class="card-img-top" alt="..." style="width: 100%; height: 15em;"></a>
									<div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between;">
										<h5 class="card-title"><?php echo $course['course_name'] ?></h5>
										<div style="display: flex; justify-content: space-between;">
											<strong>
												<p class="card-text"><?php echo $course['category_name'] ?></p>
											</strong>
											<p class="card-text" style="color: blue;"><?php echo $course['price'] ?> VND</p>
										</div>
										<p class="card-text" style="display:-webkit-box;
  																			-webkit-line-clamp: 3;
																			-webkit-box-orient: vertical;
																			overflow: hidden;">
											<?php echo $course['course_detail'] ?>
										</p>
										<div class="modal-footer">
											<a href="master_page.php?page_layout=a" class="btn btn-primary" title="Sửa">
												<ion-icon name="create-outline" style="pointer-events: none;"></ion-icon>
											</a>
											<a href="#" class="btn btn-primary" title="Xóa">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php
						endforeach;
						?>
					</div>
				</div>

				<!-- <table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tên khóa học</th>
							<th scope="col">Ngôn ngữ</th>
							<th scope="col">Giá</th>
							<th scope="col">Ảnh mô tả</th>
							<th scope="col">Sửa</th>
							<th scope="col">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($courses as $course) :
						?>
							<tr>
								<th scope="row"><?php echo $course['course_id'] ?></th>
								<td><?php echo $course['course_name'] ?></td>
								<td><?php echo $course['category_name'] ?></td>
								<td><?php echo $course['price'] ?></td>
								<td><img width="120px" height="80px" src="../images/<?php echo $course['image'] ?>" alt=""></td>
								<td><a href="master_page.php?page_layout=edit_category&category_id=<?php echo $category['category_id'] ?>">
										<ion-icon name="create-outline"></ion-icon>
									</a>
								</td>
								<td><a onclick="return deleteCategories();" href="./category/delete_category.php?category_id=<?php echo $category['category_id'] ?>">
										<ion-icon name="close-circle-outline"></ion-icon>
									</a>
								</td>
							</tr>
						<?php
						endforeach;
						?>
					</tbody>
				</table> -->
				<div style="float: right;">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="master_page.php?page_layout=categories&page=<?php echo $pre ?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<?php
							echo $listPage;
							?>
							<li class="page-item">
								<a class="page-link" href="master_page.php?page_layout=categories&page=<?php echo $next ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>


				</div>

			</div>
		</div>
	</div>
</div>
<!--/.row-->