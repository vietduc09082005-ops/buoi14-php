
<?php

include_once __DIR__ . "/../models/diemModel.php";

$action = $_GET["action"] ?? "index";

if ($action == "index") {

    $danhsach = getAllDiem();

    if (!$danhsach) {
        die("Lỗi lấy danh sách điểm: " . mysqli_error($conn));
    }

    include __DIR__ . "/../view/diem/index.php";

} elseif ($action == "add") {

    include __DIR__ . "/../view/diem/add.php";

} elseif ($action == "store") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=diem");
        exit;
    }

    $masv = trim($_POST["MASV"] ?? "");
    $mamh = trim($_POST["MAMH"] ?? "");
    $diemcc = $_POST["DIEMCC"] ?? "";
    $diemgk = $_POST["DIEMGK"] ?? "";
    $diemck = $_POST["DIEMCK"] ?? "";

    foreach ([$diemcc, $diemgk, $diemck] as $d) {
        if ($d === "" || !is_numeric($d) || (float)$d < 0 || (float)$d > 10) {
            die("Vui lòng nhập đủ 3 loại điểm trong khoảng từ 0 đến 10.");
        }
    }

    if (!addDiem($masv, $mamh, $diemcc, $diemgk, $diemck)) {
        die("Thêm điểm thất bại. Có thể sinh viên hoặc môn học không tồn tại, hoặc điểm đã có.");
    }

    header("Location: index.php?controller=diem");
    exit;

} elseif ($action == "edit") {

    $masv = $_GET["masv"] ?? "";
    $mamh = $_GET["mamh"] ?? "";

    $diem = getDiemById($masv, $mamh);

    if (!$diem) {
        die("Không tìm thấy điểm cần sửa.");
    }

    include __DIR__ . "/../view/diem/edit.php";

} elseif ($action == "update") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=diem");
        exit;
    }

    $masv = $_GET["masv"] ?? "";
    $mamh = $_GET["mamh"] ?? "";
    $diemcc = $_POST["DIEMCC"] ?? "";
    $diemgk = $_POST["DIEMGK"] ?? "";
    $diemck = $_POST["DIEMCK"] ?? "";

    foreach ([$diemcc, $diemgk, $diemck] as $d) {
        if ($d === "" || !is_numeric($d) || (float)$d < 0 || (float)$d > 10) {
            die("Thông tin không hợp lệ. Mỗi loại điểm phải từ 0 đến 10.");
        }
    }

    if (!updateDiem($masv, $mamh, $diemcc, $diemgk, $diemck)) {
        die("Cập nhật điểm thất bại: " . mysqli_error($conn));
    }

    header("Location: index.php?controller=diem");
    exit;

} elseif ($action == "delete") {

    $masv = $_GET["masv"] ?? "";
    $mamh = $_GET["mamh"] ?? "";

    if (!deleteDiem($masv, $mamh)) {
        die("Xóa điểm thất bại: " . mysqli_error($conn));
    }

    header("Location: index.php?controller=diem");
    exit;

} else {

    header("Location: index.php?controller=diem");
    exit;
}

?>
