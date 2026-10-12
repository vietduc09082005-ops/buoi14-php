<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Xác định trang cần mở
$controller = $_GET["controller"] ?? "home";

// Nạp phần đầu trang và sidebar chung
require_once __DIR__ . "/../app/view/include/header.php";
require_once __DIR__ . "/../app/view/include/sidebar.php";

// Điều hướng đến nội dung tương ứng
if ($controller == "sinhvien") {

    include __DIR__ . "/../app/controller/sinhvienController.php";

} else if ($controller == "khoa") {

    include __DIR__ . "/../app/controller/khoaController.php";

} else if ($controller == "lop") {

    include __DIR__ . "/../app/controller/lopController.php";

} else if ($controller == "user") {

    include __DIR__ . "/../app/controller/userController.php";

} else if ($controller == "chuyencan") {

    include __DIR__ . "/../app/controller/chuyencanController.php";

} else {

    echo "<h2>Trang chủ</h2>";
    echo "<p>Chào mừng đến với website quản lý sinh viên.</p>";

}

// Nạp phần cuối trang
require_once __DIR__ . "/../app/view/include/footer.php";
?>
