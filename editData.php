<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">แก้ไขข้อมูลส่วนตัว</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="?page=homepage">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=editData">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php if (isset($_SESSION['msg_success'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex justify-content-between">
                                <strong class="mt-2"><?= $_SESSION['msg_success'] ?></strong>
                                <button type="button" class="btn" data-dismiss="alert" aria-label="Close">ปิดหน้าต่าง</button>
                            </div>
                        </div>
                    <?php unset($_SESSION['msg_success']); } ?>

                    <div class="card">
                        <form action="controller/form.php" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <div class="card-title"><i class="fa fa-list"></i> แบบฟอร์มแก้ไขข้อมูลส่วนตัว</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">ชื่อ-นามสกุล</label>
                                            <input type="text" class="form-control" name="emp_fullname" value="<?= $row_empId['emp_fullname'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">ชื่อผู้ใช้</label>
                                            <input type="text" class="form-control" name="emp_user" value="<?= $row_empId['emp_user'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="btn__editData" class="btn btn-success px-5">บันทึกข้อมูล</button>
                                <a href="?page=editData" class="btn btn-danger">ล้างข้อมูล</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>