
<?php

include_once __DIR__ . "/../../database.php";

function getAllMonHoc($keyword = "")
{
    global $conn;

    $keyword = "%" . $keyword . "%";

    $sql = "SELECT * FROM monhoc
            WHERE MAMH LIKE ? OR TENMH LIKE ?
            ORDER BY MAMH";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $keyword, $keyword);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

function getMonHocById($mamh)
{
    global $conn;

    $sql = "SELECT * FROM monhoc WHERE MAMH = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $mamh);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $monhoc = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $monhoc;
}

function addMonHoc($mamh, $tenmh)
{
    global $conn;

    $sql = "INSERT INTO monhoc (MAMH, TENMH) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $mamh, $tenmh);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function updateMonHoc($mamh, $tenmh)
{
    global $conn;

    $sql = "UPDATE monhoc SET TENMH = ? WHERE MAMH = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $tenmh, $mamh);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function deleteMonHoc($mamh)
{
    global $conn;

    $sql = "DELETE FROM monhoc WHERE MAMH = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $mamh);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

?>
