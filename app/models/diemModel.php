
<?php

include_once __DIR__ . "/../../database.php";

function getAllDiem()
{
    global $conn;

    $sql = "SELECT diem.*, sinhvien.HOTEN, monhoc.TENMH
            FROM diem
            INNER JOIN sinhvien ON diem.MASV = sinhvien.MASV
            INNER JOIN monhoc ON diem.MAMH = monhoc.MAMH";

    return mysqli_query($conn, $sql);
}

function getDiemById($masv, $mamh)
{
    global $conn;

    $sql = "SELECT * FROM diem WHERE MASV = ? AND MAMH = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $masv, $mamh);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $data;
}

function addDiem($masv, $mamh, $diemcc, $diemgk, $diemck)
{
    global $conn;

    $sql = "INSERT INTO diem (MASV, MAMH, DIEMCC, DIEMGK, DIEMCK)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssddd", $masv, $mamh, $diemcc, $diemgk, $diemck);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function updateDiem($masv, $mamh, $diemcc, $diemgk, $diemck)
{
    global $conn;

    $sql = "UPDATE diem
            SET DIEMCC = ?, DIEMGK = ?, DIEMCK = ?
            WHERE MASV = ? AND MAMH = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "dddss", $diemcc, $diemgk, $diemck, $masv, $mamh);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function deleteDiem($masv, $mamh)
{
    global $conn;

    $sql = "DELETE FROM diem WHERE MASV = ? AND MAMH = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $masv, $mamh);
    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

?>
