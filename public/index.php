<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$controller = $_GET["controller"] ?? "home";

require_once __DIR__ . "/../app/view/include/header.php";
require_once __DIR__ . "/../app/view/include/sidebar.php";

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

} else if ($controller == "diem") {

    include __DIR__ . "/../app/controller/diemController.php";

}  else if ($controller == "monhoc") {

    include __DIR__ . "/../app/controller/monhocController.php";

} else {
    include __DIR__ . "/../app/view/home.php";

}

require_once __DIR__ . "/../app/view/include/footer.php";
?>
