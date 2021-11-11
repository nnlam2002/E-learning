<script>
	function deleteCategory() {
		var conf = confirm("Bạn có chắc chắn muốn xóa danh mục này không?");
		return conf;
	}
</script>

<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$rowsPerPage = 5;
$start = $page * $rowsPerPage - $rowsPerPage;

$query = "SELECT * FROM categories ORDER BY category_id ASC LIMIT $start, $rowsPerPage";
$statement = $db->prepare($query);
// $statement->bindValue(':perRow',$perRow);
// $statement->bindValue(':rowsPerPage',$rowsPerPage);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

$statement2 = $db->prepare("SELECT * FROM categories");
$statement2->execute();
$totalRows = $statement2->rowCount();
$statement2->closeCursor();
$totalPages = ceil($totalRows / $rowsPerPage);

$listPage = "";
for ($i = 1; $i <= $totalPages; $i++) {
	if ($i == $page) {
		$listPage .= '<li class="page-item active"><a class="page-link" href="master_page.php?page_layout=categories&page=' . $i . '">' . $i . '</a></li>';
	} else {
		$listPage .= '<li class="page-item"><a class="page-link" href="master_page.php?page_layout=categories&page=' . $i . '">' . $i . '</a></li>';
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
		<li class="active">Danh mục</li>
	</ol>
</div>
<!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Quản lý danh mục</h1>
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
				<a href="master_page.php?page_layout=add_category"><button type="button" class="btn btn-primary">Thêm danh mục mới</button></a>
				<ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
							<em class="fa fa-search"></em>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<form class="form-inline my-2 my-lg-0" method="POST" action="master_page.php?page_layout=search_category" for='search'>
								<input class="form-control mr-sm-2" type="text" aria-label="Search" name="search" placeholder="Tìm kiếm..."> 
							</form>
						</ul>
					</li>
				</ul>
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tên danh mục</th>
							<th scope="col">Sửa</th>
							<th scope="col">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($categories as $category) :
						?>
							<tr>
								<th scope="row"><?php echo $category['category_id'] ?></th>
								<td><?php echo $category['category_name'] ?></td>
								<td><a href="master_page.php?page_layout=edit_category&category_id=<?php echo $category['category_id'] ?>" title="Sửa">
										<ion-icon name="create-outline"></ion-icon>
									</a>
								</td>
								<td><a onclick="return deleteCategory();" href="./category/delete_category.php?category_id=<?php echo $category['category_id'] ?>" title="Xóa">
										<ion-icon name="close-circle-outline"></ion-icon>
									</a>
								</td>
							</tr>
						<?php
						endforeach;
						?>
					</tbody>
				</table>
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