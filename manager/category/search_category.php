<script>
    function deleteCategories() {
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

if (isset($_POST['search'])) {
    $search = $_POST['search'];
} else {
    $search = $_GET['search'];
}



$searchNew = trim($search);
$arr_searchNew = explode(' ', $searchNew);
$searchNew = implode('%', $arr_searchNew);
$searchNew = '%' . $searchNew . '%';

$query = "SELECT * FROM categories WHERE category_name LIKE ('$searchNew') ORDER BY category_id ASC LIMIT $start, $rowsPerPage";
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$totalRows = $statement->rowCount();
$statement->closeCursor();

$statement2 = $db->prepare("SELECT * FROM categories WHERE category_name LIKE ('$searchNew')");
$statement2->execute();
$totalRows = $statement2->rowCount();
$statement2->closeCursor();
$totalPages = ceil($totalRows / $rowsPerPage);

$listPage = "";
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $page) {
        $listPage .= '<li class="page-item active"><a class="page-link" href="master_page.php?page_layout=search_category&search='.$search.'&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li class="page-item"><a class="page-link" href="master_page.php?page_layout=search_category&search='.$search.'&page=' . $i . '">' . $i . '</a></li>';
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
                                <input class="form-control mr-sm-2" type="search" aria-label="Search" name="search" placeholder="Tìm kiếm...">
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
                                <td><a onclick="return deleteCategories();" href="./category/delete_category.php?category_id=<?php echo $category['category_id'] ?>" title="Xóa">
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
                                <a class="page-link" href="master_page.php?page_layout=search_category&search=<?php echo $search ?>&page=<?php echo $pre ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                            echo $listPage;
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="master_page.php?page_layout=search_category&search=<?php echo $search ?>&page=<?php echo $next ?>" aria-label="Next">
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