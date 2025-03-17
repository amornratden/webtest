<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">ข้อมูลประเภทสินค้า</h4>
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
                        <a href="?page=productsSize">การจัดการข้อมูล</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=productsSize">ข้อมูลประเภทสินค้า</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-2">
                        <a href="" data-toggle="modal" data-target="#addDataSize" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มรายการประเภทสินค้า</a>
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
                            <h4 class="card-title"><i class="fa fa-list"></i> ข้อมูลประเภทสินค้าทั้งหมด</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อประเภทสินค้า</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อประเภทสินค้า</th>
                                            <th>การจัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        $select_dataSize = $conn->query("SELECT * FROM tbl_products_sizes ORDER BY size_id ASC");
                                        $chkrow_dataSize = mysqli_num_rows($select_dataSize);
                                        if ($chkrow_dataSize >= 1) {
                                            while ($row_dataSize = $select_dataSize->fetch_array()) {
                                                $size_id = $row_dataSize['size_id'];
                                        ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $row_dataSize['size_name'] ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDataSize<?= $row_dataSize['size_id'] ?>"><i class="icon-note" aria-hidden="true"></i> แก้ไขข้อมูล</a>
                                                        <a href="controller/form.php?delSizeId=<?= $size_id ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบรายการเลขที่ <?= $size_id ?> ใช่หรือไม่?');"><i class="icon-trash" aria-hidden="true">ลบข้อมูล</i></a>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editDataSize<?= $row_dataSize['size_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                                                                    <h3><i class="fa fa-pencil-square"></i> แบบฟอร์มแก้ไขข้อมูลประเภทสินค้า</h3>
                                                                    <h6 class="text-muted">EDIT TYPE PRODUCT INFORMATION</h6>
                                                                    <hr>
                                                                    <div class="mb-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">ชื่อประเภทสินค้า</label>
                                                                        <input type="text" class="form-control" name="size_name" id="exampleFormControlInput1" value="<?= $row_dataSize['size_name'] ?>" required>
                                                                        <input type="hidden" name="size_id" value="<?= $row_dataSize['size_id'] ?>">
                                                                    </div>
                                                                    <hr class="mt-3">
                                                                    <div class="d-flex justify-content-start">
                                                                        <button type="submit" name="btn_editDataSize" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
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
<div class="modal fade" id="addDataSize" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                    <h3><i class="fa fa-plus-square"></i> แบบฟอร์มเพิ่มข้อมูลประเภทสินค้า</h3>
                    <h6 class="text-muted">ADD TYPE SIZE INFORMATION</h6>
                    <hr>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อประเภทสินค้า</label>
                        <input type="text" class="form-control" name="size_name" id="exampleFormControlInput1" placeholder="กรอกชื่อประเภทสินค้า" required>
                    </div>

                    <hr class="mt-3">
                    <div class="d-flex justify-content-start">
                        <button type="submit" name="btn_addDataSize" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
                        <button type="button" class="btn btn-outline-danger mx-1" data-dismiss="modal">ปิดหน้าต่าง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>