<?php
include_once __DIR__ . "/../../database.php";

function getAllDiem()
{
    global $conn;

    $sql = "SELECT diem.*, sinhvien.HOTEN, monhoc.TENMH
            FROM diem, sinhvien, monhoc
            WHERE diem.MASV = sinhvien.MASV
            AND diem.MAMH = monhoc.MAMH";

    $result = mysqli_query($conn, $sql);

    return $result;
}

function getDiemById($masv, $mamh)
{
    global $conn;

    $sql = "SELECT * FROM diem 
            WHERE MASV = '$masv' 
            AND MAMH = '$mamh'";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function addDiem($masv, $mamh, $diemcc, $diemgk, $diemck)
{
    global $conn;

    $sql = "INSERT INTO diem(MASV, MAMH, DIEMCC, DIEMGK, DIEMCK)
            VALUES ('$masv', '$mamh', '$diemcc', '$diemgk', '$diemck')";

    return mysqli_query($conn, $sql);
}

function updateDiem($masv, $mamh, $diemcc, $diemgk, $diemck)
{
    global $conn;

    $sql = "UPDATE diem
            SET DIEMCC = '$diemcc',
                DIEMGK = '$diemgk',
                DIEMCK = '$diemck'
            WHERE MASV = '$masv'
            AND MAMH = '$mamh'";

    return mysqli_query($conn, $sql);
}

function deleteDiem($masv, $mamh)
{
    global $conn;

    $sql = "DELETE FROM diem 
            WHERE MASV = '$masv'
            AND MAMH = '$mamh'";

    return mysqli_query($conn, $sql);
}
?>