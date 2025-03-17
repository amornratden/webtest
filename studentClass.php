<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">ข้อมูลชั้นเรียน</h4>
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
                        <a href="?page=studentClass">การจัดการข้อมูลชั้นเรียน</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=studentClass">ข้อมูลชั้นเรียน</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-2">
                        <a href="" data-toggle="modal" data-target="#addDataClass" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มรายการข้อมูลชั้นเรียน</a>
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
                            <h4 class="card-title"><i class="fa fa-list"></i> ข้อมูลชั้นเรียนทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อชั้นเรียน</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อชั้นเรียน</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        $select_dataClass = $conn->query("SELECT * FROM tbl_student_class ORDER BY class_id ASC");
                                        $chkrow_dataClass = mysqli_num_rows($select_dataClass);
                                        if ($chkrow_dataClass >= 1) {
                                            while ($row_dataClass = $select_dataClass->fetch_array()) {
                                                $class_id = $row_dataClass['class_id'];
                                        ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $row_dataClass['class_name'] ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editDataClass<?= $row_dataClass['class_id'] ?>"><i class="icon-note" aria-hidden="true"></i> แก้ไขข้อมูล</a>
                                                        <a href="controller/form.php?delClassId=<?= $class_id ?>" class="btn btn-sm btn-danger" onclick="confirm('คุณต้องการลบรายการเลขที่ <?= $class_id ?> ใช่หรือไม่?')"><i class="icon-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editDataClass<?= $row_dataClass['class_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                                                                    <h3><i class="fa fa-pencil-square"></i> แบบฟอร์มแก้ไขข้อมูลชั้นเรียน</h3>
                                                                    <h6 class="text-muted">EDIT CLASS INFORMATION</h6>
                                                                    <hr>
                                                                    <div class="mb-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">ชื่อชั้นเรียน</label>
                                                                        <input type="text" class="form-control" name="class_name" id="exampleFormControlInput1" value="<?= $row_dataClass['class_name'] ?>" required>
                                                                        <input type="hidden" name="class_id" value="<?= $row_dataClass['class_id'] ?>">
                                                                    </div>
                                                                    <hr class="mt-3">
                                                                    <div class="d-flex justify-content-start">
                                                                        <button type="submit" name="btn_editDataClass" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
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
<div class="modal fade" id="addDataClass" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                    <h3><i class="fa fa-plus-square"></i> แบบฟอร์มเพิ่มข้อมูลชั้นเรียน</h3>
                    <h6 class="text-muted">ADD CLASS INFORMATION</h6>
                    <hr>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อชั้นเรียน</label>
                        <input type="text" class="form-control" name="class_name" id="exampleFormControlInput1" placeholder="กรอกชื่อชั้นเรียน" required>
                    </div>

                    <hr class="mt-3">
                    <div class="d-flex justify-content-start">
                        <button type="submit" name="btn_addDataClass" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
                        <button type="button" class="btn btn-outline-danger mx-1" data-dismiss="modal">ปิดหน้าต่าง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>