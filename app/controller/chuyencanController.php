<?php

include_once __DIR__ . "/../models/chuyencanModel.php";

$action = $_GET["action"] ?? "index";

if ($action == "index") {

    $danhsach = getAllChuyenCan();

    include __DIR__ . "/../view/chuyencan/index.php";

} else if ($action == "add") {

    include __DIR__ . "/../view/chuyencan/add.php";

} else if ($action == "store") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=chuyencan");
        exit;
    }

    $masv = trim($_POST["MASV"] ?? "");
    $mamh = trim($_POST["MAMH"] ?? "");
    $ngay = $_POST["NGAY"] ?? "";
    $trangthai = $_POST["TRANGTHAI"] ?? "";

    if (
        $masv === "" ||
        $mamh === "" ||
        $ngay === "" ||
        !in_array((string)$trangthai, ["0", "1"], true)
    ) {
        die("Vui lòng nhập đầy đủ thông tin hợp lệ.");
    }

    if (!addChuyenCan($masv, $mamh, $ngay, (int)$trangthai)) {
        die("Thêm chuyên cần thất bại. Hãy kiểm tra dữ liệu và khóa ngoại.");
    }

    header("Location: index.php?controller=chuyencan");
    exit;

} else if ($action == "edit") {

    $id = $_GET["id"] ?? "";

    if (!ctype_digit((string)$id) || (int)$id < 1) {
        die("ID chuyên cần không hợp lệ.");
    }

    $chuyencan = getChuyenCanById((int)$id);

    if (!$chuyencan) {
        die(
            "Không tìm thấy chuyên cần có ID: "
            . htmlspecialchars((string)$id)
            . '. <a href="index.php?controller=chuyencan">Quay lại danh sách</a>'
        );
    }

    include __DIR__ . "/../view/chuyencan/edit.php";

} else if ($action == "update") {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: index.php?controller=chuyencan");
        exit;
    }

    $id = $_GET["id"] ?? "";

    if (!ctype_digit((string)$id) || (int)$id < 1) {
        die("ID chuyên cần không hợp lệ.");
    }

    $masv = trim($_POST["MASV"] ?? "");
    $mamh = trim($_POST["MAMH"] ?? "");
    $ngay = $_POST["NGAY"] ?? "";
    $trangthai = $_POST["TRANGTHAI"] ?? "";

    if (
        $masv === "" ||
        $mamh === "" ||
        $ngay === "" ||
        !in_array((string)$trangthai, ["0", "1"], true)
    ) {
        die("Vui lòng nhập đầy đủ thông tin hợp lệ.");
    }

    if (!updateChuyenCan(
        (int)$id,
        $masv,
        $mamh,
        $ngay,
        (int)$trangthai
    )) {
        die("Cập nhật thất bại. Hãy kiểm tra dữ liệu và khóa ngoại.");
    }

    header("Location: index.php?controller=chuyencan");
    exit;

} else if ($action == "delete") {

    $id = $_GET["id"] ?? "";

    if (!ctype_digit((string)$id) || (int)$id < 1) {
        die("ID chuyên cần không hợp lệ.");
    }

    if (!deleteChuyenCan((int)$id)) {
        die("Xóa chuyên cần thất bại.");
    }

    header("Location: index.php?controller=chuyencan");
    exit;

} else {

    header("Location: index.php?controller=chuyencan");
    exit;
}
?>
