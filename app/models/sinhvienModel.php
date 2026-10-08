<?php
include_once __DIR__ . "/../../database.php";

function getAllSinhVien()
{
    global $conn;

    $sql = "SELECT sinhvien.*, lop.TENLOP
            FROM sinhvien, lop
            WHERE sinhvien.MALOP = lop.MALOP";

    $result = mysqli_query($conn, $sql);

    $danhsach = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $danhsach[] = $row;
    }

    return $danhsach;
}

function getSinhVienById($masv)
{
    global $conn;

    $sql = "SELECT * FROM sinhvien WHERE MASV = '$masv'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function getSinhVienDetail($masv)
{
    global $conn;

    $sql = "SELECT sinhvien.*, lop.TENLOP
            FROM sinhvien, lop
            WHERE sinhvien.MALOP = lop.MALOP
            AND sinhvien.MASV = '$masv'";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function getAllLop()
{
    global $conn;

    $sql = "SELECT * FROM lop";
    $result = mysqli_query($conn, $sql);

    $danhsach_lop = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $danhsach_lop[] = $row;
    }

    return $danhsach_lop;
}

function addSinhVien($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop)
{
    global $conn;

    $sql = "INSERT INTO sinhvien(MASV, HOTEN, NGAYSINH, GIOITINH, DIACHI, MALOP)
            VALUES ('$masv', '$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$malop')";

    return mysqli_query($conn, $sql);
}

function updateSinhVien($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop)
{
    global $conn;

    $sql = "UPDATE sinhvien
            SET HOTEN = '$hoten',
                NGAYSINH = '$ngaysinh',
                GIOITINH = '$gioitinh',
                DIACHI = '$diachi',
                MALOP = '$malop'
            WHERE MASV = '$masv'";

    return mysqli_query($conn, $sql);
}

function deleteSinhVien($masv)
{
    global $conn;

    $sql = "DELETE FROM sinhvien WHERE MASV = '$masv'";

    return mysqli_query($conn, $sql);
}
?>