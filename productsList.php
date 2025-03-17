<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">ข้อมูลสินค้า</h4>
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
                        <a href="?page=productsList">การจัดการข้อมูล</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=productsList">ข้อมูลสินค้า</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-2">
                        <a href="" data-toggle="modal" data-target="#addDataProduct" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มรายการสินค้า</a>
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
                                            <th>รหัสสินค้า</th>                                            
                                            <th>ชื่อสินค้า</th>
                                            <th>ราคาสินค้า</th>                
                                            <th>ประเภทสินค้า</th>                                            
                                            <th>การจัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>รหัสสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>ราคาสินค้า</th>
                                            <th>ประเภทสินค้า</th>                                            
                                            <th>การจัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $Chkprefix = "";
                                        $select_dataPro = $conn->query("SELECT * FROM tbl_products AS pro
                                        INNER JOIN tbl_products_sizes AS size
                                        WHERE  pro.pro_size_id = size.size_id 
                                        ORDER BY pro.pro_size_id ASC");
                                        $chkrow_dataPro = mysqli_num_rows($select_dataPro);
                                        if ($chkrow_dataPro >= 1) {
                                            while ($row_dataPro = $select_dataPro->fetch_array()) {
                                                $pro_id = $row_dataPro['pro_id'];

                                                if ($row_dataPro['pro_size_id'] != '0') {
                                                    $select_tblSize = $conn->query("SELECT * FROM tbl_products_sizes WHERE size_id = '" . $row_dataPro['pro_size_id'] . "'");
                                                    $row_tblSize = $select_tblSize->fetch_array();
                                                    $size_name = $row_tblSize['size_name'];
                                                }
                                        ?>
                                                <tr>
                                                    <td><?= $row_dataPro['pro_id'] ?></td>                                                    
                                                    <td><?= $row_dataPro['pro_name'] ?></td>
                                                    <td><?= number_format($row_dataPro['pro_price'], 2) ?></td>                                    
                                                    <!--<td><?= $row_dataPro['pro_size_id'] == '0' ? 'ไม่มีประเภท' : 'สินค้า '.$size_name; ?></td>-->
                                                    <td><?= $row_dataPro['pro_size_id'] == '0' ? 'ไม่ได้ระบุ' : ' '.$size_name; ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editDataProduct<?= $row_dataPro['pro_id'] ?>"><i class="icon-note" aria-hidden="true"></i> แก้ไขข้อมูล</a>
                                                        <a href="controller/form.php?delProId=<?= $pro_id ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบรายการเลขที่ <?= $pro_id ?> ใช่หรือไม่?');"><i class="icon-trash" aria-hidden="true">ลบข้อมูล</i></a>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editDataProduct<?= $row_dataPro['pro_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                                                                    <h3><i class="fa fa-pencil-square"></i> แบบฟอร์มแก้ไขข้อมูลสินค้า</h3>
                                                                    <h6 class="text-muted">EDIT PRODUCT INFORMATION</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-6">
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">รหัสสินค้า</label>
                                                                                <input type="text" class="form-control" disabled value="<?= $row_dataPro['pro_id'] ?>">
                                                                                <input type="hidden" name="pro_id" value="<?= $row_dataPro['pro_id'] ?>">
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">ชื่อสินค้า</label>
                                                                                <input type="text" class="form-control" name="pro_name" id="exampleFormControlInput1" value="<?= $row_dataPro['pro_name'] ?>" required>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">ราคา</label>
                                                                                <input type="number" class="form-control" name="pro_price" id="exampleFormControlInput1" value="<?= $row_dataPro['pro_price'] ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6">
                                                                            <!--<div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">จำนวนคงเหลือ</label>
                                                                                <input type="number" class="form-control" name="pro_qty" id="exampleFormControlInput1" value="<?= $row_dataPro['pro_qty'] ?>" required>
                                                                            </div>-->
                                                                            <div class="mb-2">
                                                                                <label for="exampleFormControlInput1" class="form-label">ประเภทสินค้า</label>
                                                                                <select class="form-control" name="pro_size_id" aria-label="Default select example">
                                                                                    <option value="" selected>****ระบุประเภท****</option>
                                                                                    <?php
                                                                                    $select_dataSize = $conn->query("SELECT * FROM tbl_products_sizes ORDER BY size_id ASC");
                                                                                    while ($row_dataSize = $select_dataSize->fetch_array()) {
                                                                                    ?>
                                                                                        <option value="<?= $row_dataSize['size_id'] ?>" <?= $row_dataSize['size_id'] == $row_dataPro['pro_size_id'] ? 'selected' : ''; ?>><?= $row_dataSize['size_name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <hr class="mt-3">
                                                                    <div class="d-flex justify-content-start">
                                                                        <button type="submit" name="btn_editDataProduct" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
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
<div class="modal fade" id="addDataProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="controller/form.php" method="post" enctype="multipart/form-data">
                    <h3><i class="fa fa-plus-square"></i> แบบฟอร์มเพิ่มข้อมูลสินค้า</h3>
                    <h6 class="text-muted">ADD PRODUCT INFORMATION</h6>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">ชื่อสินค้า</label>
                                <input type="text" class="form-control" name="pro_name" id="exampleFormControlInput1" placeholder="กรอกชื่อสินค้า" required>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">ราคา</label>
                                <input type="number" class="form-control" name="pro_price" id="exampleFormControlInput1" placeholder="กรอกราคาสินค้า" required>
                            </div>
                        
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">ประเภทสินค้า</label>
                                <select class="form-control" name="pro_size_id" aria-label="Default select example">
                                    <option value="" selected>****ระบุประเภทสินค้า****</option>
                                    <?php
                                    $select_dataSize = $conn->query("SELECT * FROM tbl_products_sizes ORDER BY size_id ASC");
                                    while ($row_dataSize = $select_dataSize->fetch_array()) {
                                    ?>
                                        <option value="<?= $row_dataSize['size_id'] ?>"><?= $row_dataSize['size_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                        </div>
                    </div>

                    <hr class="mt-3">
                    <div class="d-flex justify-content-start">
                        <button type="submit" name="btn_addDataProduct" class="btn btn-success px-5"><i class="fa fa-check-square-o" aria-hidden="true"> บันทึกข้อมูล</i></button>
                        <button type="button" class="btn btn-outline-danger mx-1" data-dismiss="modal">ปิดหน้าต่าง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>