<?php
include '../../../connectdb.php';
session_start();

if (isset($_SESSION['emp_Idlogin'])) {
    $emp_id = $_SESSION['emp_Idlogin'];
    $select_empId = $conn->query("SELECT * FROM tbl_employee WHERE emp_id = '$emp_id'");
    $row_empId = $select_empId->fetch_array();

    if (isset($_POST['btn__editData'])) {
        $emp_fullname = $_POST['emp_fullname'];
        $emp_user = $_POST['emp_user'];

        $update_dataEmp = $conn->query("UPDATE tbl_employee SET emp_fullname = '$emp_fullname', emp_user = '$emp_user'
        WHERE emp_id = '$emp_id'");
        if ($update_dataEmp) {
            $_SESSION['msg_success'] = "อัพเดตข้อมูลสำเร็จ ✅";
            header("location: ../index.php?page=editData");
        }
    }

    if (isset($_POST['btn__editPassword'])) {
        $emp_oldpassword = $_POST['emp_oldpassword'];
        $emp_newpassword = $_POST['emp_newpassword'];
        $emp_cnewpassword = $_POST['emp_cnewpassword'];
        $emp_coldpassword = $row_empId['emp_password'];

        if ($emp_oldpassword == $emp_coldpassword) {
            if ($emp_newpassword == $emp_cnewpassword) {
                $update_dataEmp = $conn->query("UPDATE tbl_employee SET emp_password = '$emp_newpassword' WHERE emp_id = '$emp_id'");
                if ($update_dataEmp) {
                    $_SESSION['success'] = "อัพเดตข้อมูลเสร็จสิ้น ✅";
                    header("location: ../?page=editPassword");
                }
            } else {
                $_SESSION['error'] = "ไม่สามารถเปลี่ยนรหัสผ่านได้! เนื่องจากรหัสผ่านใหม่ไม่ตรงกัน...";
                header("location: ../?page=editPassword");
            }
        } else {
            $_SESSION['error'] = "ไม่สามารถเปลี่ยนรหัสผ่านได้! เนื่องจากรหัสผ่านเดิมไม่ถูกต้อง...";
            header("location: ../?page=editPassword");
        }
    }

    if (isset($_POST['btn_updateStatusAdmin'])) {
        $emp_id = $_POST['emp_id'];
        $emp_administrator = $_POST['emp_administrator'];

        $update_dataEmp = $conn->query("UPDATE tbl_employee SET emp_administrator = '$emp_administrator'
        WHERE emp_id = '$emp_id'");
        if ($update_dataEmp) {
            $_SESSION['success'] = "อัพเดตข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=adminList");
        }
    }

    if (isset($_POST['btn_updateStatusEmp'])) {
        $emp_id = $_POST['emp_id'];
        $emp_administrator = $_POST['emp_administrator'];

        $update_dataEmp = $conn->query("UPDATE tbl_employee SET emp_administrator = '$emp_administrator'
        WHERE emp_id = '$emp_id'");
        if ($update_dataEmp) {
            $_SESSION['success'] = "อัพเดตข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=employeeList");
        }
    }
    if (isset($_GET['delAd'])) {
        $emp_id = $_GET['delAd'];

        $del_dataAd = $conn->query("DELETE FROM tbl_employee WHERE emp_id = '$emp_id'");
        if ($del_dataAd) {
            $_SESSION['success'] = "ลบรายการข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=adminList");
        }
    }

    if (isset($_GET['delEm'])) {
        $emp_id = $_GET['delEm'];

        $del_dataEmp = $conn->query("DELETE FROM tbl_employee WHERE emp_id = '$emp_id'");
        if ($del_dataEmp) {
            $_SESSION['success'] = "ลบรายการข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=employeeList");
        }
    }

    if (isset($_GET['delProId'])) {
        $pro_id = $_GET['delProId'];

        $del_dataPro = $conn->query("DELETE FROM tbl_products WHERE pro_id = '$pro_id'");
        if ($del_dataPro) {
            $_SESSION['success'] = "ลบรายการข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=productsList");
        }
    }

    if (isset($_POST['btn_editDataProduct'])) {
        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_qty = $_POST['pro_qty'];
        $pro_size_id = $_POST['pro_size_id'];
        $pro_cate_id = $_POST['pro_cate_id'];

        $update_dataProduct = $conn->query("UPDATE tbl_products 
        SET pro_name = '$pro_name', pro_price = '$pro_price', pro_qty = 200, pro_size_id = '$pro_size_id', pro_cate_id = '$pro_cate_id'
        WHERE pro_id = '$pro_id'");
        if ($update_dataProduct) {
            $_SESSION['success'] = "ดำเนินการอัพเดตข้อมูลสินค้าสำเร็จ ✅";
            header("location: ../?page=productsList");
        }
    }

    if (isset($_POST['btn_addDataProduct'])) {
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_qty = $_POST['pro_qty'];
        $pro_size_id = $_POST['pro_size_id'];
        $pro_cate_id = $_POST['pro_cate_id'];

        $insert_dataProduct = $conn->query("INSERT INTO tbl_products (pro_id,pro_name,pro_price,pro_qty,pro_size_id,pro_cate_id)
        VALUES(NULL,'$pro_name','$pro_price',200,'$pro_size_id','$pro_cate_id')");
        if ($insert_dataProduct) {
            $_SESSION['success'] = "ดำเนินการเพิ่มข้อมูลรายการสินค้าสำเร็จ ✅";
            header("location: ../?page=productsList");
        }
    }

    if (isset($_POST['btn_editDataCate'])) {
        $cate_id = $_POST['cate_id'];
        $cate_name = $_POST['cate_name'];

        $update_dataCate = $conn->query("UPDATE tbl_products_categories SET cate_name = '$cate_name'
        WHERE cate_id = '$cate_id'");
        if ($update_dataCate) {
            $_SESSION['success'] = "อัพเดตข้อมูลหมวดหมู่สินค้าสำเร็จ ✅";
            header("location: ../?page=productsCate");
        }
    }

    if (isset($_POST['btn_addDataCate'])) {
        $cate_name = $_POST['cate_name'];

        $insert_dataCate = $conn->query("INSERT INTO tbl_products_categories (cate_id,cate_name)
        VALUES(NULL,'$cate_name')");
        if ($insert_dataCate) {
            $_SESSION['success'] = "ดำเนินการเพิ่มข้อมูลหมวดหมู่สินค้าสำเร็จ ✅";
            header("location: ../?page=productsCate");
        }
    }

    if (isset($_GET['delCateId'])) {
        $cate_id = $_GET['delCateId'];

        $del_dataCate = $conn->query("DELETE FROM tbl_products_categories WHERE cate_id = '$cate_id'");
        if ($del_dataCate) {
            $_SESSION['success'] = "ลบรายการข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=productsCate");
        }
    }

    if (isset($_POST['btn_editDataSize'])) {
        $size_id = $_POST['size_id'];
        $size_name = $_POST['size_name'];

        $update_dataSize = $conn->query("UPDATE tbl_products_sizes SET size_name = '$size_name'
        WHERE size_id = '$size_id'");
        if ($update_dataSize) {
            $_SESSION['success'] = "อัพเดตข้อมูลขนาดไซส์สินค้าสำเร็จ ✅";
            header("location: ../?page=productsSize");
        }
    }

    if (isset($_POST['btn_addDataSize'])) {
        $size_name = $_POST['size_name'];

        $insert_dataSize = $conn->query("INSERT INTO tbl_products_sizes (size_id,size_name)
        VALUES(NULL,'$size_name')");
        if ($insert_dataSize) {
            $_SESSION['success'] = "ดำเนินการเพิ่มข้อมูลขนาดไซส์สินค้าสำเร็จ ✅";
            header("location: ../?page=productsSize");
        }
    }

    if (isset($_GET['delSizeId'])) {
        $size_id = $_GET['delSizeId'];

        $del_dataSize = $conn->query("DELETE FROM tbl_products_sizes WHERE size_id = '$size_id'");
        if ($del_dataSize) {
            $_SESSION['success'] = "ลบรายการข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=productsSize");
        }
    }

    if (isset($_POST['btn_editDataClass'])) {
        $class_id = $_POST['class_id'];
        $class_name = $_POST['class_name'];

        $update_dataClass = $conn->query("UPDATE tbl_student_class SET class_name = '$class_name'
        WHERE class_id = '$class_id'");
        if ($update_dataClass) {
            $_SESSION['success'] = "อัพเดตข้อมูลชั้นเรียนสำเร็จ ✅";
            header("location: ../?page=studentClass");
        }
    }

    if (isset($_POST['btn_addDataClass'])) {
        $class_name = $_POST['class_name'];

        $insert_dataClass = $conn->query("INSERT INTO tbl_student_class (class_id,class_name)
        VALUES(NULL,'$class_name')");
        if ($insert_dataClass) {
            $_SESSION['success'] = "ดำเนินการเพิ่มข้อมูลชั้นเรียนสำเร็จ ✅";
            header("location: ../?page=studentClass");
        }
    }

    if (isset($_GET['delClassId'])) {
        $class_id = $_GET['delClassId'];

        $del_dataClass = $conn->query("DELETE FROM tbl_student_class WHERE class_id = '$class_id'");
        if ($del_dataClass) {
            $_SESSION['success'] = "ลบรายการข้อมูลเสร็จสิ้น ✅";
            header("location: ../?page=studentClass");
        }
    }

    if (isset($_POST['btn_editUserOrder'])) {
        $uorder_id = $_POST['uorder_id'];
        $uorder_prefix = $_POST['uorder_prefix'];
        $uorder_fname = $_POST['uorder_fname'];
        $uorder_lname = $_POST['uorder_lname'];
        $uorder_idstudent = $_POST['uorder_idstudent'];
        $uorder_class_id = $_POST['uorder_class_id'];
        $uorder_phone = $_POST['uorder_phone'];

        $update_dataUorder = $conn->query("UPDATE tbl_userorders
        SET uorder_prefix = '$uorder_prefix', uorder_fname = '$uorder_fname', uorder_lname = '$uorder_lname', uorder_idstudent = '$uorder_idstudent',
        uorder_class_id = '$uorder_class_id', uorder_phone = '$uorder_phone'
        WHERE uorder_id = '$uorder_id'");
        if ($update_dataUorder) {
            $_SESSION['success'] = "ดำเนินการอัพเดตข้อมูลคำสั่งซื้อสำเร็จ ✅";
            header("location: ../?page=ordersList");
        }
    }

    if (isset($_GET['updateStatusCancleOrderId'])) {
        $uorder_id = $_GET['updateStatusCancleOrderId'];

        $update_dataUorder = $conn->query("UPDATE tbl_userorders SET uorder_status = '5'
        WHERE uorder_id = '$uorder_id'");
        if ($update_dataUorder) {
            $_SESSION['success'] = "ดำเนินการยกเลิกรายการคำสั่งซื้อสำเร็จ ✅";
            header("location: ../?page=ordersList");
        }
    }

    if (isset($_GET['updateStatusReCancleOrderId'])) {
        $uorder_id = $_GET['updateStatusReCancleOrderId'];

        $update_dataUorder = $conn->query("UPDATE tbl_userorders SET uorder_status = '4'
        WHERE uorder_id = '$uorder_id'");
        if ($update_dataUorder) {
            $_SESSION['success'] = "ดำเนินการคืนค่ารายการคำสั่งซื้อสำเร็จ ✅";
            header("location: ../?page=ordersCancleList");
        }
    }

    if (isset($_GET['delUorderId'])) {
        $uorder_id = $_GET['delUorderId'];

        $del_uDetail = $conn->query("DELETE FROM tbl_userorders_detail WHERE udetail_uorder_id = '$uorder_id'");
        if ($del_uDetail) {
            $del_dataUorder = $conn->query("DELETE FROM tbl_userorders WHERE uorder_id = '$uorder_id'");
            if ($del_dataUorder) {
                $_SESSION['success'] = "ลบรายการข้อมูลเสร็จสิ้น ✅";
                header("location: ../?page=ordersCancleList");
            }
        }
    }

    if (isset($_POST['btn_addDataAdmin'])) {
        $emp_fullname = $_POST['emp_fullname'];
        $emp_user = $_POST['emp_user'];
        $emp_password = $_POST['emp_password'];
        $emp_cpassword = $_POST['emp_cpassword'];

        if ($emp_password == $emp_cpassword) {
            $insert_dataEmp = $conn->query("INSERT INTO tbl_employee (emp_id,emp_fullname,emp_user,emp_password,emp_administrator)
            VALUES(NULL, '$emp_fullname', '$emp_user', '$emp_password', '1')");
            if ($insert_dataEmp) {
                $_SESSION['success'] = "เพิ่มข้อมูลบัญชีผู้ดูแลระบบเสร็จสิ้น ✅";
                header("location: ../?page=adminList");
            }
        } else {
            $_SESSION['error'] = "ไม่สามารถเพิ่มบัญชีได้! เนื่องจากรหัสผ่านไม่ตรงกัน...";
            header("location: ../?page=adminList");
        }
    }

    if (isset($_POST['btn_addDataEmp'])) {
        $emp_fullname = $_POST['emp_fullname'];
        $emp_user = $_POST['emp_user'];
        $emp_password = $_POST['emp_password'];
        $emp_cpassword = $_POST['emp_cpassword'];

        if ($emp_password == $emp_cpassword) {
            $insert_dataEmp = $conn->query("INSERT INTO tbl_employee (emp_id,emp_fullname,emp_user,emp_password)
            VALUES(NULL, '$emp_fullname', '$emp_user', '$emp_password')");
            if ($insert_dataEmp) {
                $_SESSION['success'] = "เพิ่มข้อมูลบัญชีพนักงานเสร็จสิ้น ✅";
                header("location: ../?page=employeeList");
            }
        } else {
            $_SESSION['error'] = "ไม่สามารถเพิ่มบัญชีได้! เนื่องจากรหัสผ่านไม่ตรงกัน...";
            header("location: ../?page=employeeList");
        }
    }

    if (isset($_POST['btn_editDataAdmin'])) {
        $emp_id = $_POST['emp_id'];
        $emp_fullname = $_POST['emp_fullname'];
        $emp_user = $_POST['emp_user'];

        $insert_dataEmp = $conn->query("UPDATE tbl_employee SET emp_fullname = '$emp_fullname', emp_user = '$emp_user'
        WHERE emp_id = '$emp_id'");
        if ($insert_dataEmp) {
            $_SESSION['success'] = "อัพเดตข้อมูลพนักงงานเสร็จสิ้น ✅";
            header("location: ../?page=adminList");
        }
    }

    if (isset($_POST['btn_editDataEmp'])) {
        $emp_id = $_POST['emp_id'];
        $emp_fullname = $_POST['emp_fullname'];
        $emp_user = $_POST['emp_user'];

        $insert_dataEmp = $conn->query("UPDATE tbl_employee SET emp_fullname = '$emp_fullname', emp_user = '$emp_user'
        WHERE emp_id = '$emp_id'");
        if ($insert_dataEmp) {
            $_SESSION['success'] = "อัพเดตข้อมูลพนักงงานเสร็จสิ้น ✅";
            header("location: ../?page=employeeList");
        }
    }
}
