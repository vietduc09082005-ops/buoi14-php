<?php
include_once __DIR__ . "/../../database.php";

function getAllLop()
{
    global $conn;

    $sql = "SELECT lop.*, khoa.TENKHOA
            FROM lop, khoa
            WHERE lop.MAKHOA = khoa.MAKHOA";

    $result = mysqli_query($conn, $sql);

    $danhsach = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $danhsach[] = $row;
    }

    return $danhsach;
}

function getLopById($malop)
{
    global $conn;

    $sql = "SELECT * FROM lop WHERE MALOP = '$malop'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function getAllKhoa()
{
    global $conn;

    $sql = "SELECT * FROM khoa";
    $result = mysqli_query($conn, $sql);

    $danhsach_khoa = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $danhsach_khoa[] = $row;
    }

    return $danhsach_khoa;
}

function addLop($malop, $tenlop, $makhoa)
{
    global $conn;

    $sql = "INSERT INTO lop(MALOP, TENLOP, MAKHOA)
            VALUES ('$malop', '$tenlop', '$makhoa')";

    return mysqli_query($conn, $sql);
}

function updateLop($malop, $tenlop, $makhoa)
{
    global $conn;

    $sql = "UPDATE lop
            SET TENLOP = '$tenlop',
                MAKHOA = '$makhoa'
            WHERE MALOP = '$malop'";

    return mysqli_query($conn, $sql);
}

function deleteLop($malop)
{
    global $conn;

    $sql = "DELETE FROM lop WHERE MALOP = '$malop'";

    return mysqli_query($conn, $sql);
}
?>