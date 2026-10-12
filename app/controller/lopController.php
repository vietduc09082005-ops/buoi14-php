
<?php

include_once __DIR__ . "/../models/lopModel.php";

$action = $_GET["action"] ?? "index";

if ($action == "index") {

    $keyword = trim($_GET["keyword"] ?? "");
    $danhsach = getAllLop($keyword);

    if (!$danhsach) {
        die("Lỗi lấy danh sách lớp: " . mysqli_error($conn));
    }

    include __DIR__ . "/../view/lop/index.php";

} elseif ($action == "add") {

    include __DIR__ . "/../view/lop/add.php";

} elseif ($action == "store") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=lop");
        exit;
    }

    $malop = trim($_POST["MALOP"] ?? "");
    $tenlop = trim($_POST["TENLOP"] ?? "");
    $makhoa = trim($_POST["MAKHOA"] ?? "");

    if ($malop === "" || $tenlop === "" || $makhoa === "") {
        die("Vui lòng nhập đầy đủ thông tin lớp.");
    }

    if (!addLop($malop, $tenlop, $makhoa)) {
        die("Thêm lớp thất bại. Hãy kiểm tra mã lớp và mã khoa.");
    }

    header("Location: index.php?controller=lop");
    exit;

} elseif ($action == "edit") {

    $malop = $_GET["malop"] ?? "";
    $lop = getLopById($malop);

    if (!$lop) {
        die("Không tìm thấy lớp cần sửa.");
    }

    include __DIR__ . "/../view/lop/edit.php";

} elseif ($action == "update") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=lop");
        exit;
    }

    $malop = trim($_GET["malop"] ?? "");
    $tenlop = trim($_POST["TENLOP"] ?? "");
    $makhoa = trim($_POST["MAKHOA"] ?? "");

    if ($malop === "" || $tenlop === "" || $makhoa === "") {
        die("Vui lòng nhập đầy đủ thông tin lớp.");
    }

    if (!updateLop($malop, $tenlop, $makhoa)) {
        die("Cập nhật lớp thất bại. Hãy kiểm tra lại dữ liệu.");
    }

    header("Location: index.php?controller=lop");
    exit;

} elseif ($action == "delete") {

    $malop = $_GET["malop"] ?? "";

    if ($malop === "") {
        die("Thiếu mã lớp.");
    }

    if (!deleteLop($malop)) {
        die("Xóa lớp thất bại. Có thể lớp vẫn đang có sinh viên.");
    }

    header("Location: index.php?controller=lop");
    exit;

} else {

    header("Location: index.php?controller=lop");
    exit;
}

?>
