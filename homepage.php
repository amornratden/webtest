<?php
$select_userOrder = $conn->query("SELECT * FROM tbl_userorders WHERE uorder_status = '4'");
$rowcount_userOrder = $select_userOrder->num_rows;

$select_userOrderCancle = $conn->query("SELECT * FROM tbl_userorders WHERE uorder_status = '5'");
$rowcount_userOrderCancle = $select_userOrderCancle->num_rows;

$select_dataProduct = $conn->query("SELECT * FROM tbl_products");
$rowcount_dataProduct = $select_dataProduct->num_rows;

$select_dataProductSize = $conn->query("SELECT * FROM tbl_products_sizes");
$rowcount_dataProductSize = $select_dataProductSize->num_rows;

$select_dataProductCate = $conn->query("SELECT * FROM tbl_products_categories");
$rowcount_dataProductCate = $select_dataProductCate->num_rows;

$select_dataClass = $conn->query("SELECT * FROM tbl_student_class");
$rowcount_dataClass = $select_dataClass->num_rows;

$select_dataEmp = $conn->query("SELECT * FROM tbl_employee WHERE emp_administrator = '0'");
$rowcount_dataEmp = $select_dataEmp->num_rows;

$select_dataAdmin = $conn->query("SELECT * FROM tbl_employee WHERE emp_administrator = '1' AND NOT emp_id = '$emp_id'");
$rowcount_dataAdmin = $select_dataAdmin->num_rows;

?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white pb-2 fw-bold">ระบบจัดการร้านคาเฟ่ เอวาลอนส์ วิทยาลัยอาชีวศึกษาพณิชยการเชียงราย</h1>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd mt--2">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <a href="?page=ordersList">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-interface-6 text-primary"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">รายการข้อมูลการขายสินค้า</p>
                                        <h4 class="card-title"><?= number_format($rowcount_userOrder) ?> รายการ</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!--  <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <a href="?page=ordersCancleList">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-interface-6 text-danger"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">รายการยกเลิกคำสั่งซื้อ</p>
                                        <h4 class="card-title"><?= number_format($rowcount_userOrderCancle) ?> รายการ</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd mt--2">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <a href="?page=productsList">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-list text-success"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">รายการข้อมูลสินค้า</p>
                                        <h4 class="card-title"><?= number_format($rowcount_dataProduct) ?> รายการ</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <a href="?page=productsSize">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-list text-info"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">รายการประเภทสินค้า</p>
                                        <h4 class="card-title"><?= number_format($rowcount_dataProductSize) ?> รายการ</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <a href="?page=productsCate">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-list text-warning"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">รายการหมวดหมู่สินค้า</p>
                                        <h4 class="card-title"><?= number_format($rowcount_dataProductCate) ?> รายการ</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd mt--2">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <a href="?page=employeeList">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-users text-primary"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">รายชื่อข้อมูลพนักงาน</p>
                                        <h4 class="card-title"><?= number_format($rowcount_dataEmp) ?> คน</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <a href="?page=adminList">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-user-5 text-success"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">รายชื่อข้อมูลผู้ดูแลระบบ</p>
                                        <h4 class="card-title"><?= number_format($rowcount_dataAdmin) ?> คน</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>