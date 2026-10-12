
<?php

include_once __DIR__ . "/../../database.php";

function getAllLop($keyword = "")
{
    global $conn;

    $keyword = "%" . $keyword . "%";

    $sql = "SELECT lop.*, khoa.TENKHOA
            FROM lop
            LEFT JOIN khoa ON lop.MAKHOA = khoa.MAKHOA
            WHERE lop.MALOP LIKE ?
               OR lop.TENLOP LIKE ?
            ORDER BY lop.MALOP";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $keyword, $keyword);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

function getLopById($malop)
{
    global $conn;

    $sql = "SELECT * FROM lop WHERE MALOP = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $malop);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $lop = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $lop;
}

function addLop($malop, $tenlop, $makhoa)
{
    global $conn;

    $sql = "INSERT INTO lop (MALOP, TENLOP, MAKHOA)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $malop, $tenlop, $makhoa);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function updateLop($malop, $tenlop, $makhoa)
{
    global $conn;

    $sql = "UPDATE lop
            SET TENLOP = ?, MAKHOA = ?
            WHERE MALOP = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $tenlop, $makhoa, $malop);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function deleteLop($malop)
{
    global $conn;

    $sql = "DELETE FROM lop WHERE MALOP = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $malop);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

?>
