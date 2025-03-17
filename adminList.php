<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">ข้อมูลผู้ดูแลระบบ</h4>
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
                        <a href="?page=adminList">การจัดการข้อมูล</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=adminList">ข้อมูลผู้ดูแลระบบ</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-2">
                        <a href="" data-toggle="modal" data-target="#addDataAdmin" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มบัญชีผู้ดูแลระบบ</a>
                    </div>

                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex justify-content-between">
                                <strong class="h4 mt-2 text-success"><?= $_SESSION['success'] ?></strong>
                                <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
                            </div>
                        </div>
                    <?php unset($_SESSION['success']);
                    } ?>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex justify-content-between">
                                <strong class="h4 mt-2 text-danger"><?= $_SESSION['error'] ?></strong>
                                <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
                            </div>
                        </div>
                    <?php unset($_SESSION['error']);
                    } ?>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fa fa-list"></i> ข้อมูลผู้ดูแลระบบทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>สถานะผู้ใช้งาน</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>สถานะผู้ใช้งาน</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        $Chkprefix = "";
                                        $select_dataEmp = $conn->query("SELECT * FROM tbl_employee WHERE emp_administrator = '1' AND NOT emp_id = '$emp_id' ORDER BY emp_id ASC");
                                        $chkrow_dataEmp = mysqli_num_rows($select_dataEmp);
                                        if ($chkrow_dataEmp >= 1) {
                                            while ($row_dataEmp = $select_dataEmp->fetch_array()) {
                                        ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $row_dataEmp['emp_fullname'] ?></td>
                                                    <td><?= $row_dataEmp['emp_user'] ?></td>
                                                    <td><span class="btn btn-sm btn-primary"><i class="icon-user"></i> <?= $row_dataEmp['emp_administrator'] == '1' ? 'ผู้ดูแลระบบ' : 'พนักงาน' ?></span></td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#updateStatus<?= $row_dataEmp['emp_id'] ?>"><i class="icon-note" aria-hidden="true"></i> อัพเดตสถานะ</a>
                                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDataAdmin<?= $row_dataEmp['emp_id'] ?>"><i class="icon-note" aria-hidden="true"></i> แก้ไขข้อมูล</a>
                                                        <a href="controller/form.php?delAd=<?= $row_dataEmp['emp_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลผู้ดูแลระบบใช่หรือไม่?');"><i class="icon-trash" aria-hidden="true">ลบข้อมูล</i></a>
                                                        
                                                        
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="updateStatus<?= $row_dataEmp['emp_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                                                                    <h2>แบบฟอร์มอัพเดตข้อมูล</h2>
                                                                    <h6 class="text-muted">FORM FOR UPDATE INFORMATION</h6>
                                                                    <hr>
                                                                    <i class="fa fa-list mb-3"> แบบฟอร์มอัพเดตข้อมูล</i><br>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label mb-1">สถานะผู้ใช้งาน</label>
                                                                        <select class="form-control" name="emp_administrator" aria-label="Default select example">
                                                                            <option value="0" <?= $row_dataEmp['emp_administrator'] == '0' ? 'selected' : '' ?>>พนักงาน</option>
                                                                            <option value="1" <?= $row_dataEmp['emp_administrator'] == '1' ? 'selected' : '' ?>>ผู้ดูแลระบบ</option>
                                                                        </select>
                                                                        <input type="hidden" name="emp_id" value="<?= $row_dataEmp['emp_id'] ?>">
                                                                    </div>
                                                                    <div class="d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">ยกเลิก</button>
                                                                        <button type="submit" name="btn_updateStatusAdmin" class="btn btn-primary">บันทึกข้อมูล</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editDataAdmin<?= $row_dataEmp['emp_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                                                                    <h3><i class="fa fa-plus-square"></i> แบบฟอร์มแก้ไขผู้ดูแลระบบ</h3>
                                                                    <h6 class="text-muted">EDIT ADMINISTRATOR INFORMATION</h6>
                                                                    <hr>
                                                                    <div class="mb-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">ชื่อ-นามสกุล</label>
                                                                        <input type="text" class="form-control" name="emp_fullname" id="exampleFormControlInput1" value="<?= $row_dataEmp['emp_fullname'] ?>" required>
                                                                        <input type="hidden" name="emp_id" value="<?= $row_dataEmp['emp_id'] ?>">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">ชื่อผู้ใช้</label>
                                                                        <input type="text" class="form-control" name="emp_user" id="exampleFormControlInput1" value="<?= $row_dataEmp['emp_user'] ?>" required>
                                                                    </div>
                                                                    <hr class="mt-3">
                                                                    <div class="d-flex justify-content-start">
                                                                        <button type="submit" name="btn_editDataAdmin" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
                                                                        <button type="button" class="btn btn-outline-danger mx-1" data-dismiss="modal">ปิดหน้าต่าง</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addDataAdmin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                    <h3><i class="fa fa-plus-square"></i> แบบฟอร์มเพิ่มบัญชีผู้ดูแลระบบ</h3>
                    <h6 class="text-muted">ADD ADMINISTRATOR ACCOUNT</h6>
                    <hr>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="emp_fullname" id="exampleFormControlInput1" placeholder="กรอกชื่อ-นามสกุล" required>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" name="emp_user" id="exampleFormControlInput1" placeholder="กรอกชื่อผู้ใช้" required>
                    </div>
                    <hr>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="emp_password" id="exampleFormControlInput1" placeholder="กรอกรหัสผ่าน" required>
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" name="emp_cpassword" id="exampleFormControlInput1" placeholder="กรอกรหัสผ่านอีกครั้ง" required>
                    </div>
                    <hr class="mt-3">
                    <div class="d-flex justify-content-start">
                        <button type="submit" name="btn_addDataAdmin" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
                        <button type="button" class="btn btn-outline-danger mx-1" data-dismiss="modal">ปิดหน้าต่าง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>