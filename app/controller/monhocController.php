
<?php

include_once __DIR__ . "/../models/monhocModel.php";

$action = $_GET["action"] ?? "index";

if ($action == "index") {

    $keyword = trim($_GET["keyword"] ?? "");
    $danhsach = getAllMonHoc($keyword);

    if (!$danhsach) {
        die("Lỗi lấy danh sách môn học: " . mysqli_error($conn));
    }

    include __DIR__ . "/../view/monhoc/index.php";

} elseif ($action == "add") {

    include __DIR__ . "/../view/monhoc/add.php";

} elseif ($action == "store") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=monhoc");
        exit;
    }

    $mamh = trim($_POST["MAMH"] ?? "");
    $tenmh = trim($_POST["TENMH"] ?? "");

    if ($mamh === "" || $tenmh === "") {
        die("Vui lòng nhập đầy đủ mã môn học và tên môn học.");
    }

    if (!addMonHoc($mamh, $tenmh)) {
        die("Thêm môn học thất bại. Hãy kiểm tra mã môn học có bị trùng không.");
    }

    header("Location: index.php?controller=monhoc");
    exit;

} elseif ($action == "edit") {

    $mamh = $_GET["mamh"] ?? "";
    $monhoc = getMonHocById($mamh);

    if (!$monhoc) {
        die("Không tìm thấy môn học.");
    }

    include __DIR__ . "/../view/monhoc/edit.php";

} elseif ($action == "update") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=monhoc");
        exit;
    }

    $mamh = trim($_GET["mamh"] ?? "");
    $tenmh = trim($_POST["TENMH"] ?? "");

    if ($mamh === "" || $tenmh === "") {
        die("Thông tin môn học không hợp lệ.");
    }

    if (!updateMonHoc($mamh, $tenmh)) {
        die("Cập nhật môn học thất bại.");
    }

    header("Location: index.php?controller=monhoc");
    exit;

} elseif ($action == "delete") {

    $mamh = $_GET["mamh"] ?? "";

    if ($mamh === "") {
        die("Thiếu mã môn học.");
    }

    if (!deleteMonHoc($mamh)) {
        die("Xóa môn học thất bại. Môn học có thể đang được sử dụng trong bảng điểm.");
    }

    header("Location: index.php?controller=monhoc");
    exit;

} else {

    header("Location: index.php?controller=monhoc");
    exit;
}

?>
