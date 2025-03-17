<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">ข้อมูลการขายสินค้า</h4>
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
                        <a href="?page=ordersList">การจัดการข้อมูลการขาย</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=ordersList">ข้อมูลการขายสินค้า</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-2">
                        <a href="../../exportExcel/exportEXCEL_totalOrder.php" target="_blank" class="btn btn-primary"><i class="fa fa-file-excel" aria-hidden="true"></i> EXPORT EXCEL</a>
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
                            <h4 class="card-title"><i class="fa fa-list"></i> ข้อมูลสินค้าทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>ผู้ออกใบสั่งซื้อ</th>
                                            <th>วันที่ออกใบสั่งซื้อ</th>
                                            <th>ชื่อ-นามสกุลผู้สั่งซื้อ</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>ผู้ออกใบสั่งซื้อ</th>
                                            <th>ชื่อ-นามสกุลผู้สั่งซื้อ</th>
                                            <th>วันที่ออกใบสั่งซื้อ</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $select_tblUserorders = $conn->query("SELECT * FROM tbl_userorders AS uorder 
                                        INNER JOIN tbl_employee AS emp
                                        WHERE uorder_emp_id = emp.emp_id AND NOT uorder.uorder_status = '1' AND NOT uorder.uorder_status = '2' 
                                        AND NOT uorder.uorder_status = '3' AND NOT uorder.uorder_status = '5' 
                                        ORDER BY uorder.uorder_datesend DESC");
                                        $chkrow_tblUserorders = $select_tblUserorders->num_rows;
                                        if ($chkrow_tblUserorders >= 1) {
                                            while ($row_tblUserorders = $select_tblUserorders->fetch_array()) {
                                                $uorder_id = $row_tblUserorders['uorder_id'];
                                                $chk_uorder_prefix = $row_tblUserorders['uorder_prefix'];
                                                if ($chk_uorder_prefix == 1) {
                                                    $uorder_prefix = "นาย";
                                                } elseif ($chk_uorder_prefix == 2) {
                                                    $uorder_prefix = "นาง";
                                                } elseif ($chk_uorder_prefix == 3) {
                                                    $uorder_prefix = "นางสาว";
                                                }
                                        ?>
                                                <tr>
                                                    <td><?= $row_tblUserorders['uorder_id'] ?></td>
                                                    <td><?= $row_tblUserorders['emp_fullname'] ?></td>
                                                    <td><?= $uorder_prefix . $row_tblUserorders['uorder_fname'] . ' ' . $row_tblUserorders['uorder_lname'] ?></td>
                                                    <td><?= date("d/m/Y", strtotime($row_tblUserorders['uorder_datesend'])) ?></td>
                                                    <td>
                                                        <a href="../../exportPDF/exportPDF_userOrder.php?userOrderId=<?= $uorder_id ?>" target="_blank" class="btn btn-sm btn-primary pl-3 pr-3 ">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"> พิมพ์ใบคำสั่งซื้อ</i>
                                                        </a>
                                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editDataOrder<?= $uorder_id ?>"><i class="icon-note" aria-hidden="true"></i> แก้ไขคำสั่งซื้อ</a>
                                                        <a href="controller/form.php?updateStatusCancleOrderId=<?= $uorder_id ?>" class="btn btn-sm btn-danger" onclick="confirm('คุณต้องการยกเลิกคำสั่งซื้อเลขที่ <?= $uorder_id ?> ใช่หรือไม่?')"><i class="flaticon-multimedia-1" aria-hidden="true"> ยกเลิกคำสั่งซื้อ</i></a>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editDataOrder<?= $row_tblUserorders['uorder_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                                                                    <h3><i class="fa fa-wpforms"></i> แบบฟอร์มเพิ่มข้อมูลผู้สั่งซื้อ </h3>
                                                                    <h6 class="text-muted">ADD ORDER INFORMATION</h6>
                                                                    <hr>
                                                                    <hr>
                                                                    <i class="fa fa-list mb-2"> แบบฟอร์มเพิ่มข้อมูลผู้สั่งซื้อ</i>
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-6">
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">คำนำหน้าชื่อ</label>
                                                                                <select class="form-control" name="uorder_prefix" aria-label="Default select example" required>
                                                                                    <option value="">****ระบุคำนำหน้าชื่อ****</option>
                                                                                    <option value="1" <?= $row_tblUserorders['uorder_prefix'] == '1' ? 'selected' : ''; ?>>นาย</option>
                                                                                    <option value="2" <?= $row_tblUserorders['uorder_prefix'] == '2' ? 'selected' : ''; ?>>นาง</option>
                                                                                    <option value="3" <?= $row_tblUserorders['uorder_prefix'] == '3' ? 'selected' : ''; ?>>นางสาว</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                                                                                <input type="text" class="form-control" name="uorder_fname" id="exampleFormControlInput1" value="<?= $row_tblUserorders['uorder_fname'] ?>" required>
                                                                                <input type="hidden" name="uorder_id" value="<?= $row_tblUserorders['uorder_id'] ?>">
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">นามสกุล</label>
                                                                                <input type="text" class="form-control" name="uorder_lname" id="exampleFormControlInput1" value="<?= $row_tblUserorders['uorder_lname'] ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6">
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">รหัสนักศึกษา</label>
                                                                                <input type="text" class="form-control" name="uorder_idstudent" id="exampleFormControlInput1" value="<?= $row_tblUserorders['uorder_idstudent'] ?>" required>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">เบอร์โทรศัพท์</label>
                                                                                <input type="text" class="form-control" name="uorder_phone" id="exampleFormControlInput1" value="<?= $row_tblUserorders['uorder_phone'] ?>" required>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">ระดับชั้น</label>
                                                                                <select class="form-control" name="uorder_class_id" aria-label="Default select example" required>
                                                                                    <option value="" selected>****ระบุระดับชั้น****</option>
                                                                                    <?php
                                                                                    $select_class = $conn->query("SELECT * FROM tbl_student_class ORDER BY class_id ASC");
                                                                                    while ($row_class = $select_class->fetch_array()) {
                                                                                    ?>
                                                                                        <option value="<?= $row_class['class_id'] ?>" <?= $row_tblUserorders['uorder_class_id'] == $row_class['class_id'] ? 'selected' : ''; ?>><?= $row_class['class_name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="mt-3">
                                                                    <div class="d-flex justify-content-start">
                                                                        <button type="submit" name="btn_editUserOrder" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
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