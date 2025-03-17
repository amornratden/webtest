<?php
include '../../connectdb.php';
session_start();

if (isset($_SESSION['emp_Idlogin'])) {
	$emp_id = $_SESSION['emp_Idlogin'];
	$select_empId = $conn->query("SELECT * FROM tbl_employee WHERE emp_id = '$emp_id'");
	$row_empId = $select_empId->fetch_array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'include/head.php'; ?>
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<?php include 'include/logo.php'; ?>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<?php include 'include/navbar.php'; ?>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php include 'include/sidebar.php'; ?>
		<!-- End Sidebar -->

		<?php
		if (isset($_GET['page']) && $_GET['page'] == "homepage") {
			require_once 'page/homepage.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "editData") {
			require_once 'page/editData.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "editPassword") {
			require_once 'page/editPassword.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "adminList") {
			require_once 'page/adminList.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "employeeList") {
			require_once 'page/employeeList.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "ordersList") {
			require_once 'page/ordersList.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "ordersCancleList") {
			require_once 'page/ordersCancleList.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "ordersSummary") {
			require_once 'page/ordersSummary.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "productsList") {
			require_once 'page/productsList.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "productsSize") {
			require_once 'page/productsSize.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "productsCate") {
			require_once 'page/productsCate.php';
		} elseif (isset($_GET['page']) && $_GET['page'] == "studentClass") {
			require_once 'page/studentClass.php';
		} else {
			require_once 'page/homepage.php';
		}
		?>

		<!-- Custom template | don't include it in your project! -->
		<?php include 'include/setting.php'; ?>
		<!-- End Custom template -->
	</div>

	<!-- Script SRC -->
	<?php include 'include/script.php'; ?>
</body>

</html>