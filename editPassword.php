<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">แก้ไขข้อมูลส่วนตัว</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="?page=searchNumber">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=editPassword">แก้ไขข้อมูลรหัสผ่าน</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex justify-content-between">
                                <strong class="mt-2"><?= $_SESSION['success'] ?></strong>
                                <button type="button" class="btn" data-dismiss="alert" aria-label="Close">ปิดหน้าต่าง</button>
                            </div>
                        </div>
                    <?php unset($_SESSION['success']);
                    } ?>
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex justify-content-between">
                                <strong class="mt-2"><?= $_SESSION['error'] ?></strong>
                                <button type="button" class="btn" data-dismiss="alert" aria-label="Close">ปิดหน้าต่าง</button>
                            </div>
                        </div>
                    <?php unset($_SESSION['error']);
                    } ?>

                    <div class="card">
                        <form action="controller/form.php" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <div class="card-title"><i class="fa fa-list"></i> แบบฟอร์มแก้ไขข้อมูลรหัสผ่าน</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">รหัสผ่านเดิม</label>
                                            <input type="password" class="form-control" name="emp_oldpassword" placeholder="กรอกรหัสผ่านเดิม" required>
                                        </div>
                                        <hr class="mb-3">
                                        <div class="form-group">
                                            <label for="email2">รหัสผ่านใหม่</label>
                                            <input type="password" class="form-control" name="emp_newpassword" placeholder="กรอกรหัสผ่านใหม่" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">ยืนยันรหัสผ่านใหม่</label>
                                            <input type="password" class="form-control" name="emp_cnewpassword" placeholder="กรอกรหัสผ่านใหม่อีกครั้ง" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="btn__editPassword" class="btn btn-success px-5">บันทึกข้อมูล</button>
                                <a href="?page=editPassword" class="btn btn-danger">ล้างข้อมูล</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>