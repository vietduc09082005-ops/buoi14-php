<?php
include_once "../app/models/khoaModel.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "index";
}

if ($action == "index") {

    $danhsach = getAllKhoa();

    include "../app/view/khoa/index.php";

} else if ($action == "add") {

    include "../app/view/khoa/add.php";

} else if ($action == "store") {

    $makhoa = $_POST["ma_khoa"];
    $tenkhoa = $_POST["ten_khoa"];
    $dienthoai = $_POST["dien_thoai"];

    addKhoa($makhoa, $tenkhoa, $dienthoai);

    header("Location: index.php?controller=khoa");
    exit;

} else if ($action == "edit") {

    $makhoa = $_GET["id"];

    $khoa = getKhoaById($makhoa);

    include "../app/view/khoa/edit.php";

} else if ($action == "update") {

    $makhoa = $_GET["id"];

    $tenkhoa = $_POST["ten_khoa"];
    $dienthoai = $_POST["dien_thoai"];

    updateKhoa($makhoa, $tenkhoa, $dienthoai);

    header("Location: index.php?controller=khoa");
    exit;

} else if ($action == "delete") {

    $makhoa = $_GET["id"];

    deleteKhoa($makhoa);

    header("Location: index.php?controller=khoa");
    exit;

} else {

    $danhsach = getAllKhoa();

    include "../app/view/khoa/index.php";
}
?>