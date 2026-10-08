<?php
if (isset($_GET["controller"])) {
    $controller = $_GET["controller"];
} else {
    $controller = "home";
}

if ($controller == "sinhvien") {
    include "../app/controller/sinhvienController.php";

} else if ($controller == "khoa") {
    include "../app/controller/khoaController.php";

} else if ($controller == "lop") {
    include "../app/controller/lopController.php";

} else if ($controller == "user") {
    include "../app/controller/userController.php";

} else {
    require_once "../app/view/include/header.php";
    require_once "../app/view/include/sidebar.php";

    echo "<h2>Trang chủ</h2>";
    echo "<p>Chào mừng đến với website quản lý sinh viên.</p>";

    require_once "../app/view/include/footer.php";
}
?>