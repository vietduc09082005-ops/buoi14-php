<?php
include_once "../app/models/sinhvienModel.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "index";
}

if ($action == "index") {

    $danhsach = getAllSinhVien();

    include "../app/view/sinhvien/index.php";

} else if ($action == "add") {

    $danhsach_lop = getAllLop();

    include "../app/view/sinhvien/add.php";

} else if ($action == "store") {

    $masv = $_POST["ma_sv"];
    $hoten = $_POST["ho_ten"];
    $ngaysinh = $_POST["ngay_sinh"];
    $gioitinh = $_POST["gioi_tinh"];
    $malop = $_POST["malop"];
    $diachi = $_POST["dia_chi"];

    addSinhVien($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop);

    header("Location: index.php?controller=sinhvien");
    exit;

} else if ($action == "edit") {

    $masv = $_GET["id"];

    $sv = getSinhVienById($masv);
    $danhsach_lop = getAllLop();

    include "../app/view/sinhvien/edit.php";

} else if ($action == "update") {

    $masv = $_GET["id"];

    $hoten = $_POST["ho_ten"];
    $ngaysinh = $_POST["ngay_sinh"];
    $gioitinh = $_POST["gioi_tinh"];
    $malop = $_POST["malop"];
    $diachi = $_POST["dia_chi"];

    updateSinhVien($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop);

    header("Location: index.php?controller=sinhvien");
    exit;

} else if ($action == "delete") {

    $masv = $_GET["id"];

    deleteSinhVien($masv);

    header("Location: index.php?controller=sinhvien");
    exit;

} else if ($action == "detail") {

    $masv = $_GET["id"];

    $sv = getSinhVienDetail($masv);

    include "../app/view/sinhvien/detail.php";

} else {

    $danhsach = getAllSinhVien();

    include "../app/view/sinhvien/index.php";
}
?>