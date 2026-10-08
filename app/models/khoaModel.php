<?php
include_once __DIR__ . "/../../database.php";

function getAllKhoa()
{
    global $conn;

    $sql = "SELECT * FROM khoa";
    $result = mysqli_query($conn, $sql);

    $danhsach = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $danhsach[] = $row;
    }

    return $danhsach;
}

function getKhoaById($makhoa)
{
    global $conn;

    $sql = "SELECT * FROM khoa WHERE MAKHOA = '$makhoa'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function addKhoa($makhoa, $tenkhoa, $dienthoai)
{
    global $conn;

    $sql = "INSERT INTO khoa(MAKHOA, TENKHOA, DIENTHOAI)
            VALUES ('$makhoa', '$tenkhoa', '$dienthoai')";

    return mysqli_query($conn, $sql);
}

function updateKhoa($makhoa, $tenkhoa, $dienthoai)
{
    global $conn;

    $sql = "UPDATE khoa
            SET TENKHOA = '$tenkhoa',
                DIENTHOAI = '$dienthoai'
            WHERE MAKHOA = '$makhoa'";

    return mysqli_query($conn, $sql);
}

function deleteKhoa($makhoa)
{
    global $conn;

    $sql = "DELETE FROM khoa WHERE MAKHOA = '$makhoa'";

    return mysqli_query($conn, $sql);
}
?>