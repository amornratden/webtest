<?php
include '../connectdb.php';
session_start();


//signin Employee data
if (isset($_POST['btn__signinEmp'])) {
  $emp_user = $_POST['emp_user'];
  $emp_password = $_POST['emp_password'];

  $select_emp = $conn->query("SELECT * FROM tbl_employee WHERE emp_user = '$emp_user' AND emp_password = '$emp_password'");
  $chkrow_emp = mysqli_num_rows($select_emp);
  if ($chkrow_emp == 1) {
    $row_emp = $select_emp->fetch_array();
    if ($row_emp['emp_administrator'] == '0') {
      $_SESSION['emp_Idlogin'] = $row_emp['emp_id'];
      header("location: ../employee");
    } elseif ($row_emp['emp_administrator'] == '1') {
      $_SESSION['emp_Idlogin'] = $row_emp['emp_id'];
      header("location: ../admin");
    }
  } else {
    $_SESSION['msg_error'] = "ไม่พบข้อมูล ชื่อผู้ใช้งานหรือรหัสผ่าน!!";
    header("location: index.php");
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">
  <title>ระบบจัดการร้านคาเฟ่ เอวาลอนส์</title>
</head>

<body>


  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('images/tu.jpg');"></div>
    <div class="contents">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-11 col-sm-11">
            <div class="mx-auto">
              <div class=" mb-4">
                <h1>ระบบจัดการร้านคาเฟ่ เอวาลอนส์ <br>วิทยาลัยอาชีวศึกษาพณิชยการเชียงราย</h1>
                <!--<p>โปรดกรอกรายละเอียดของท่านในช่องด้านล่าง เพื่อเข้าสู่ระบบ</p>-->
                <hr>
                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>

              <form action="" method="post">
                <div class="mb-2">
                  <h3><strong>เข้าสู่ระบบ</strong></h3>
                </div>

                <?php if (isset($_SESSION['msg_error'])) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex justify-content-between">
                      <div class="mt-3">
                        <strong>เกิดข้อผิดพลาด!</strong> <?= $_SESSION['msg_error'] ?>
                      </div>
                      <div class="">
                        <button type="button" class="btn btn-sm btn-outline-danger btn-sm" data-dismiss="alert" aria-label="Close">ปิดข้อความ</button>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <div class="form-group first">
                  <label for="username">ชื่อผู้ใช้</label>
                  <input type="text" name="emp_user" class="form-control" placeholder="กรอกชื่อผู้ใช้งาน" id="username" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">รหัสผ่าน</label>
                  <input type="password" name="emp_password" class="form-control" placeholder="กรอกรหัสผ่าน" id="password" required>
                </div>

                <div class="d-sm-flex mb-4 align-items-center">
                  <span class="">ลืมรหัสผ่าน? <a href="" class="text-primary">กรุณาติดต่อผู้ดูแลระบบ</a></span>
                </div>
                <div class="d-md-flex justify-content-start mb-5">
                  <input type="submit" name="btn__signinEmp" value="เข้าสู่ระบบ" class="btn btn-primary px-5">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>