<?php
include_once __DIR__ . "/../../database.php";

function getAllChuyenCan()
{
    global $conn;

    $sql = "SELECT chuyencan.*, sinhvien.HOTEN, monhoc.TENMH
            FROM chuyencan
            INNER JOIN sinhvien ON chuyencan.MASV = sinhvien.MASV
            INNER JOIN monhoc ON chuyencan.MAMH = monhoc.MAMH";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Lỗi lấy danh sách chuyên cần: " . mysqli_error($conn));
    }

    return $result;
}

function getChuyenCanById($id)
{
    global $conn;

    $sql = "SELECT * FROM chuyencan WHERE ID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Lỗi truy vấn chuyên cần: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $chuyencan = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $chuyencan ?: null;
}

function addChuyenCan($masv, $mamh, $ngay, $trangthai)
{
    global $conn;

    $sql = "INSERT INTO chuyencan (MASV, MAMH, NGAY, TRANGTHAI)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssi",
        $masv,
        $mamh,
        $ngay,
        $trangthai
    );

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function updateChuyenCan($id, $masv, $mamh, $ngay, $trangthai)
{
    global $conn;

    $sql = "UPDATE chuyencan
            SET MASV = ?, MAMH = ?, NGAY = ?, TRANGTHAI = ?
            WHERE ID = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssii",
        $masv,
        $mamh,
        $ngay,
        $trangthai,
        $id
    );

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function deleteChuyenCan($id)
{
    global $conn;

    $sql = "DELETE FROM chuyencan WHERE ID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}
?>
