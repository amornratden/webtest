<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="image/user_profile.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $row_empId['emp_fullname']  ?>
                            <span class="user-level">ผู้ดูแลระบบ</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="?page=editData">
                                    <span class="link-collapse">แก้ไขข้อมูลส่วนตัว</span>
                                </a>
                            </li>
                            <li>
                                <a href="?page=editPassword">
                                    <span class="link-collapse">เปลี่ยนรหัสผ่าน</span>
                                </a>
                            </li>
                            <li>
                                <a href="page/logout.php">
                                    <span class="link-collapse">ออกจากระบบ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?= isset($_GET['page']) && ($_GET['page'] == "adminList" || $_GET['page'] == "employeeList"  || 
                    $_GET['page'] == "ordersList" || $_GET['page'] == "ordersSummary" || $_GET['page'] == "productsList" 
                    || $_GET['page'] == "productsSize" || $_GET['page'] == "productsCate" || $_GET['page'] == "studentClass" 
                    || $_GET['page'] == "ordersCancleList") ? 'active submenu' : ''; ?>">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>การจัดการข้อมูล</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse 
                    <?= isset($_GET['page']) && ($_GET['page'] == "adminList" || $_GET['page'] == "employeeList"  || 
                    $_GET['page'] == "ordersList" || $_GET['page'] == "ordersSummary" || $_GET['page'] == "productsList" 
                    || $_GET['page'] == "productsSize" || $_GET['page'] == "productsCate" || $_GET['page'] == "studentClass" 
                    || $_GET['page'] == "ordersCancleList") ? 'show' : ''; ?>" 
                    id="base">
                        <ul class="nav nav-collapse">
                            <li class="<?= isset($_GET['page']) && $_GET['page'] == "adminList" ? 'active' : ''; ?>">
                                <a href="?page=adminList">
                                    <span class="sub-item">ข้อมูลผู้ดูแลระบบ</span>
                                </a>
                            </li>
                            <li class="<?= isset($_GET['page']) && $_GET['page'] == "employeeList" ? 'active' : ''; ?>">
                                <a href="?page=employeeList">
                                    <span class="sub-item">ข้อมูลพนักงาน</span>
                                </a>
                            </li>
                            <li class="<?= isset($_GET['page']) && $_GET['page'] == "productsSize" ? 'active' : ''; ?>">
                                <a href="?page=productsSize">
                                    <span class="sub-item">ข้อมูลประเภทสินค้า</span>
                                </a>
                            </li>
                            <li class="<?= isset($_GET['page']) && $_GET['page'] == "productsList" ? 'active' : ''; ?>">
                                <a href="?page=productsList">
                                    <span class="sub-item">ข้อมูลสินค้า</span>
                                </a>
                            </li>
                            <!--<li class="<?= isset($_GET['page']) && $_GET['page'] == "ordersList" ? 'active' : ''; ?>">
                                <a href="?page=ordersList">
                                    <span class="sub-item">ข้อมูลรายการขายสินค้า</span>
                                </a>
                            </li>-->
                            <li class="<?= isset($_GET['page']) && $_GET['page'] == "ordersSummary" ? 'active' : ''; ?>">
                                <a href="?page=ordersSummary">
                                    <span class="sub-item">ข้อมูลรายงานการขาย</span>
                                </a>
                            </li>
                            <!--<li class="<?= isset($_GET['page']) && $_GET['page'] == "ordersCancleList" ? 'active' : ''; ?>">
                                <a href="?page=ordersCancleList">
                                    <span class="sub-item">ข้อมูลรายการยกเลิก</span>
                                </a>
                            </li>-->
                            
                            
                            <!--<li class="<?= isset($_GET['page']) && $_GET['page'] == "productsCate" ? 'active' : ''; ?>">
                                <a href="?page=productsCate">
                                    <span class="sub-item">ข้อมูลหมวดหมู่สินค้า</span>
                                </a>
                            </li>
                            <li class="<?= isset($_GET['page']) && $_GET['page'] == "studentClass" ? 'active' : ''; ?>">
                                <a href="?page=studentClass">
                                    <span class="sub-item">ข้อมูลชั้นเรียน</span>
                                </a>
                            </li>-->
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>