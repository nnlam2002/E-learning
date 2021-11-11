<?php
if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    if (isset($category_name)) {
        $query = 'INSERT INTO categories(category_name) VALUES (:category_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_name', $category_name);
        $statement->execute();
        $statement->closeCursor();
        $message = "Thêm danh mục thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("refresh:0; url=master_page.php?page_layout=categories");
    }
}
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
        <h1 class="page-header">Thêm danh mục mới</h1>
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
                <a href="master_page.php?page_layout=categories"><button type="button" class="btn btn-primary">Quay lại trang danh mục</button></a>
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
                <form method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tên danh mục</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="JavaScript" name="category_name" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
                    <button type="reset" class="btn btn-secondary">Làm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/.row-->