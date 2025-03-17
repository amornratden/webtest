<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">ข้อมูลรายงานการขายสินค้า</h4>
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
                        <a href="?page=ordersSummary">การจัดการข้อมูลรายงานการขายสินค้า</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?page=ordersSummary">ข้อมูลรายงานการขายสินค้า</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="" method="post">
                            <div class="card-header bg-primary">
                                <div class="card-title text-white"><i class="fa fa-list"></i> สรุปการขายประจำวัน</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="email2">วันที่</label>
                                            <select class="form-control" name="uorder_search_day" aria-label="Default select example" required>
                                                <?php
                                                if (isset($_POST['btn__search'])) {
                                                    $uorder_search_day = $_POST['uorder_search_day'];
                                                    $uorder_search_month = $_POST['uorder_search_month'];
                                                    $uorder_search_year = $_POST['uorder_search_year'];
                                                ?>
                                                    <option value="<?= $uorder_search_day ?>"><?= $uorder_search_day ?></option>
                                                <?php } else { ?>
                                                    <?php for ($ii = 1; $ii <= 31; $ii++) { ?>
                                                        <option value="<?= $ii ?>"><?= $ii ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="email2">เดือน</label>
                                            <select class="form-control" name="uorder_search_month" aria-label="Default select example" required>
                                                <?php
                                                $month = array('', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤศภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
                                                if (isset($_POST['btn__search'])) {
                                                    $uorder_search_day = $_POST['uorder_search_day'];
                                                    $uorder_search_month = $_POST['uorder_search_month'];
                                                    $uorder_search_year = $_POST['uorder_search_year'];
                                                ?>
                                                    <option value="<?= $uorder_search_month ?>"><?= $month[$uorder_search_month] ?></option>
                                                <?php } else { ?>
                                                    <?php
                                                    for ($jj = 1; $jj <= 12; $jj++) { ?>
                                                        <option value="<?= $jj ?>"><?= $month[$jj] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="email2">ปี ค.ศ.</label>
                                            <select class="form-control" name="uorder_search_year" aria-label="Default select example" required>
                                                <?php
                                                $year_now = date("Y");
                                                if (isset($_POST['btn__search'])) {
                                                    $uorder_search_day = $_POST['uorder_search_day'];
                                                    $uorder_search_month = $_POST['uorder_search_month'];
                                                    $uorder_search_year = $_POST['uorder_search_year'];
                                                ?>
                                                    <option value="<?= $uorder_search_year ?>"><?= $uorder_search_year ?></option>
                                                <?php } else { ?>
                                                    <?php for ($hh = $year_now; $hh >= $year_now - 100; $hh--) { ?>
                                                        <option value="<?= $hh ?>"><?= $hh ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 mt-3">
                                    <button type="submit" name="btn__search" class="btn btn-success px-5"><i class="fa fa-search"></i> ค้นหาข้อมูล</button>
                                    <a href="?page=ordersSummary" class="btn btn-danger">ล้างข้อมูลการค้นหา</a>
                                </div>
                                <div class="card-action mt-3">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4 class="card-title mb-3"><i class="fa fa-list"></i> รายงานการขายสินค้า</h4>
                                        </div>
                                        <div class="h4">
                                            สรุปยอดขาย: <b>
                                                <?php
                                                if (isset($_POST['btn__search'])) {
                                                    $uorder_search_day = $_POST['uorder_search_day'];
                                                    $uorder_search_month = $_POST['uorder_search_month'];
                                                    $uorder_search_year = $_POST['uorder_search_year'];

                                                    if ($uorder_search_month == '1') {
                                                        $uorder_search_monthh = "มกราคม";
                                                    } elseif ($uorder_search_month == '2') {
                                                        $uorder_search_monthh = "กุมภาพันธ์";
                                                    } elseif ($uorder_search_month == '03') {
                                                        $uorder_search_monthh = "มีนาคม";
                                                    } elseif ($uorder_search_month == '4') {
                                                        $uorder_search_monthh = "เมษายน";
                                                    } elseif ($uorder_search_month == '5') {
                                                        $uorder_search_monthh = "พฤษภาคม";
                                                    } elseif ($uorder_search_month == '6') {
                                                        $uorder_search_monthh = "มิถุนายน";
                                                    } elseif ($uorder_search_month == '7') {
                                                        $uorder_search_monthh = "กรกฏาคม";
                                                    } elseif ($uorder_search_month == '8') {
                                                        $uorder_search_monthh = "สิงหาคม";
                                                    } elseif ($uorder_search_month == '9') {
                                                        $uorder_search_monthh = "กันยายน";
                                                    } elseif ($uorder_search_month == '10') {
                                                        $uorder_search_monthh = "ตุลาคม";
                                                    } elseif ($uorder_search_month == '11') {
                                                        $uorder_search_monthh = "พฤศจิกายน";
                                                    } elseif ($uorder_search_month == '12') {
                                                        $uorder_search_monthh = "ธันวาคม";
                                                    }
                                                    echo 'วันที่ ' . $uorder_search_day . ' เดือน ' . $uorder_search_monthh . ' ปี ค.ศ. ' . $uorder_search_year;
                                                } else {
                                                    echo 'ข้อมูลการขายทั้งหมด';
                                                }
                                                ?>
                                            </b>
                                        </div>
                                    </div>

                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>เลขที่ใบสั่งซื้อ</th>
                                                <th>ผู้ออกใบสั่งซื้อ</th>
                                                <th>วันที่ออกใบสั่งซื้อ</th>                                                
                                                <th>ราคาสุทธิ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!isset($_POST['btn__search'])) {
                                                $select_tblUserorders = $conn->query("SELECT * FROM tbl_userorders AS uorder 
                                                INNER JOIN tbl_employee AS emp
                                                WHERE uorder_emp_id = emp.emp_id AND NOT uorder.uorder_status = '1' AND NOT uorder.uorder_status = '2' 
                                                AND NOT uorder.uorder_status = '3' AND NOT uorder.uorder_status = '5' 
                                                ORDER BY uorder.uorder_datesend DESC");
                                            } else {
                                                $uorder_search_day = $_POST['uorder_search_day'];
                                                $uorder_search_month = $_POST['uorder_search_month'];
                                                $uorder_search_year = $_POST['uorder_search_year'];
                                                $select_tblUserorders = $conn->query("SELECT * FROM tbl_userorders AS uorder 
                                                INNER JOIN tbl_employee AS emp
                                                WHERE uorder_emp_id = emp.emp_id 
                                                AND NOT uorder.uorder_status = '1' AND NOT uorder.uorder_status = '2' 
                                                AND NOT uorder.uorder_status = '3' AND NOT uorder.uorder_status = '5'
                                                AND DAY(uorder.uorder_datesend) = '$uorder_search_day' 
                                                AND MONTH(uorder.uorder_datesend) = '$uorder_search_month' 
                                                AND YEAR(uorder.uorder_datesend) = '$uorder_search_year' 
                                                ORDER BY uorder.uorder_datesend DESC");
                                            }
                                            $total_priceAll = 0;
                                            $chkrow_tblUserorders = $select_tblUserorders->num_rows;
                                            if ($chkrow_tblUserorders >= 1) {
                                                while ($row_tblUserorders = $select_tblUserorders->fetch_array()) {
                                                    $uorder_id = $row_tblUserorders['uorder_id'];
                                                    $total_priceAll += $row_tblUserorders['uorder_totalprice'];
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
                                                        
                                                        <td><?= date("d/m/Y", strtotime($row_tblUserorders['uorder_datesend'])) ?></td>
                                                        <td><?= number_format($row_tblUserorders['uorder_totalprice'], 2) ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2"></th>
                                                <th>รวมราคาทั้งสิ้น</th>
                                                <th><?= number_format($total_priceAll, 2) ?> บาท</th>
                                            </tr>
                                        </tfoot>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2"></th>
                                                <th>รวมจำนวน</th>
                                                <th><?= number_format($chkrow_tblUserorders) ?> รายการ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>