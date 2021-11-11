<?php
$query = "SELECT * FROM categories";
$statement1 = $db->prepare($query);
$statement1->execute();
$categories = $statement1->fetchAll();
$statement1->closeCursor();

if (isset($_POST['submit'])) {
    $course_name = $_POST['course_name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $course_detail = $_POST['course_detail'];
    $category_id = $_POST['category_id'];

    if (isset($_FILES['img'])) {
        $img = basename($_FILES["img"]["name"]);
        $target_path = './images/' . $img;
        $img_tmp = $_FILES['img']['tmp_name'];
        move_uploaded_file($img_tmp, $target_path);
    } else {
        $image_error = "<span style='color: red;'>(*)</span>";
    }
}



if (isset($course_name) && isset($author) && isset($price) && isset($course_detail) && isset($img) && isset($category_id)) {
    $query = 'INSERT INTO courses(category_id, course_name, img, price, author, course_detail) VALUES (:category_id, :course_name, :img, :price, :author, :course_detail)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':course_name', $course_name);
    $statement->bindValue(':img', $img);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':author', $author);
    $statement->bindValue(':course_detail', $course_detail);
    $statement->execute();
    $statement->closeCursor();
    $message = "Thêm khóa học thành công";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("refresh:0; url=master_page.php?page_layout=courses");
}

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
                <a href="master_page.php?page_layout=courses"><button type="button" class="btn btn-primary">Quay lại trang khóa học</button></a>
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
                <form method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="formGroupExampleInput">Tên khóa học</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="course_name" required><br>

                        <label for="formGroupExampleInput">Tác giả</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="author" required><br>

                        <label for="formGroupExampleInput">Giá</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="VND" name="price" required><br>

                        <label for="formGroupExampleInput">Hình ảnh</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
                        <?php if (isset($image_error)) {
                            echo $image_error;
                        } ?><br>

                        <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
                        <button type="reset" class="btn btn-secondary">Làm mới</button>
                    </div>
                    <div class="col-md-6">
                        <label for="formGroupExampleInput">Loại khóa học</label>
                        <?php if (isset($category_id_error)) {
                            echo $category_id_error;
                        } ?>
                        <select class="form-control form-control-sm" name="category_id">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name'] ?></option>
                            <?php endforeach ?>
                        </select><br>

                        <label for="formGroupExampleInput">Chi tiết khóa học</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="course_detail" required></textarea><br>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/.row-->