<?php
include_once "../app/models/lopModel.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "index";
}

if ($action == "index") {

    $danhsach = getAllLop();

    include "../app/view/lop/index.php";

} else if ($action == "add") {

    $danhsach_khoa = getAllKhoa();

    include "../app/view/lop/add.php";

} else if ($action == "store") {

    $malop = $_POST["ma_lop"];
    $tenlop = $_POST["ten_lop"];
    $makhoa = $_POST["ma_khoa"];

    addLop($malop, $tenlop, $makhoa);

    header("Location: index.php?controller=lop");
    exit;

} else if ($action == "edit") {

    $malop = $_GET["id"];

    $lop = getLopById($malop);
    $danhsach_khoa = getAllKhoa();

    include "../app/view/lop/edit.php";

} else if ($action == "update") {

    $malop = $_GET["id"];

    $tenlop = $_POST["ten_lop"];
    $makhoa = $_POST["ma_khoa"];

    updateLop($malop, $tenlop, $makhoa);

    header("Location: index.php?controller=lop");
    exit;

} else if ($action == "delete") {

    $malop = $_GET["id"];

    deleteLop($malop);

    header("Location: index.php?controller=lop");
    exit;

} else {

    $danhsach = getAllLop();

    include "../app/view/lop/index.php";
}
?>