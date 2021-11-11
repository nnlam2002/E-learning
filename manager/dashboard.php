<?php
$statement = $db->prepare("SELECT * FROM categories");
$statement->execute();
$totalCategories = $statement->rowCount();

$statement = $db->prepare("SELECT * FROM courses");
$statement->execute();
$totalCourses = $statement->rowCount();

$statement = $db->prepare("SELECT * FROM users");
$statement->execute();
$totalUsers = $statement->rowCount() * 1000;
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Trang chủ</li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Trang chủ</h1>
    </div>
</div>
<!--/.row-->

<div class="panel panel-container">
    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-book color-blue"></em>
                    <div class="large" id="category-count"></div>
                    <div class="text-muted">Danh mục</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-clone color-red"></em>
                    <div class="large" id="course-count"></div>
                    <div class="text-muted">Khoá Học</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                    <div class="large" id="user-count"></div>
                    <div class="text-muted">Người dùng</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                    <div class="large" id="comment-count"></div>
                    <div class="text-muted">Bình luận</div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Giới thiệu
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
                <p>
                    Trung tâm Tin học & Công nghệ StudyCamp được thành lập vào ngày 06/10/2021, hoạt động trong lĩnh vực đào tạo công nghệ thông tin, đặc biệt là đào tạo chuyên sâu trong lĩnh vực lập trình và đồ họa website với trụ sở chính đặt tại Đà Nẵng<br />
                    - 470 Đường Trần Đại Nghĩa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng, Việt Nam<br />
                </p>
                <br />
                <p>
                    Đây là hệ thống quản trị của website Thương mại điện tử do Trung tâm Tin học & Công nghệ StudyCamp xây dựng và phát triển, (Nghiêm cấm sao lưu hay chia sẻ dưới mọi hình thức đối với những ai không phải là học viên của StudyCamp)
                </p>
                <br />
                <p>
                    Hệ thống quản trị này có các chức năng quản lý sau:
                    <br />
                    - Quản lý Thành viên
                    <br />
                    - Quản lý Danh mục sản phẩm
                    <br />
                    - Quản lý Sản phẩm
                    <br />
                    - Quản lý khóa học
                    <br />
                    - Quản lý bình luận
                </p>
                <br />
                <p>
                    Hệ thống đang trong quá trình hoàn thiện bởi các Chuyên gia Công nghệ web của Trung tâm Tin học & Công nghệ StudyCamp và các bạn học viên. Hệ thống vẫn tiếp tục được nâng cấp và cải tiến để cho các bạn học viên các khóa học sau được sử dụng những chức năng tốt nhất của hệ thống
                </p>
                <br />
                <p>
                    <b>StudyCamp Education!</b>
                </p>
            </div>
        </div>
    </div>
</div>
<!--/.row-->

<!-- <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>New Orders</h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="92"><span class="percent">92%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Comments</h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="65"><span class="percent">65%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>New Users</h4>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="56"><span class="percent">56%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Visitors</h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="27"><span class="percent">27%</span></div>
                </div>
            </div>
        </div>
    </div> -->
<!--/.row-->
<script>
    function animateNumber(finalNumber, duration, startNumber = 0, callback) {
        let currentNumber = startNumber
        const interval = window.setInterval(updateNumber, 17)
        function updateNumber() {
            if (currentNumber >= finalNumber) {
                clearInterval(interval)
            } else {
                let inc = Math.ceil(finalNumber / (duration / 17))
                if (currentNumber + inc > finalNumber) {
                    currentNumber = finalNumber
                    clearInterval(interval)
                } else {
                    currentNumber += inc
                }
                callback(currentNumber)
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        animateNumber(<?php echo $totalCategories ?>, 3000, 0, function(number) {
            const formattedNumber = number.toLocaleString()
            document.getElementById('category-count').innerText = formattedNumber
        })

        animateNumber(<?php echo $totalCourses ?>, 3000, 0, function(number) {
            const formattedNumber = number.toLocaleString()
            document.getElementById('course-count').innerText = formattedNumber
        })

        animateNumber(<?php echo $totalUsers ?>, 800, 0, function(number) {
            const formattedNumber = number.toLocaleString()
            document.getElementById('user-count').innerText = formattedNumber
        })

        animateNumber(25000, 800, 0, function(number) {
            const formattedNumber = number.toLocaleString()
            document.getElementById('comment-count').innerText = formattedNumber
        })
    })
</script>