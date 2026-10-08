
<?php
include_once __DIR__ . "/../../database.php";

function getAllChuyenCan()
{
    global $conn;

    $sql = "SELECT chuyencan.*, sinhvien.HOTEN, monhoc.TENMH
            FROM chuyencan, sinhvien, monhoc
            WHERE chuyencan.MASV = sinhvien.MASV
            AND chuyencan.MAMH = monhoc.MAMH";

    $result = mysqli_query($conn, $sql);

    return $result;
}

function getChuyenCanById($id)
{
    global $conn;

    $sql = "SELECT * FROM chuyencan WHERE ID = '$id'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function addChuyenCan($masv, $mamh, $ngay, $trangthai)
{
    global $conn;

    $sql = "INSERT INTO chuyencan(MASV, MAMH, NGAY, TRANGTHAI)
            VALUES ('$masv', '$mamh', '$ngay', '$trangthai')";

    return mysqli_query($conn, $sql);
}

function updateChuyenCan($id, $masv, $mamh, $ngay, $trangthai)
{
    global $conn;

    $sql = "UPDATE chuyencan
            SET MASV = '$masv',
                MAMH = '$mamh',
                NGAY = '$ngay',
                TRANGTHAI = '$trangthai'
            WHERE ID = '$id'";

    return mysqli_query($conn, $sql);
}

function deleteChuyenCan($id)
{
    global $conn;

    $sql = "DELETE FROM chuyencan WHERE ID = '$id'";

    return mysqli_query($conn, $sql);
}
?>