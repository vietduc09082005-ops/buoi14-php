<?php
include_once __DIR__ . "/../../database.php";

function getAllMonHoc()
{
    global $conn;

    $sql = "SELECT * FROM monhoc";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function getMonHocById($mamh)
{
    global $conn;

    $sql = "SELECT * FROM monhoc WHERE MAMH = '$mamh'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function addMonHoc($mamh, $tenmh, $sotinchi)
{
    global $conn;

    $sql = "INSERT INTO monhoc(MAMH, TENMH, SOTINCHI)
            VALUES ('$mamh', '$tenmh', '$sotinchi')";

    return mysqli_query($conn, $sql);
}

function updateMonHoc($mamh, $tenmh, $sotinchi)
{
    global $conn;

    $sql = "UPDATE monhoc
            SET TENMH = '$tenmh',
                SOTINCHI = '$sotinchi'
            WHERE MAMH = '$mamh'";

    return mysqli_query($conn, $sql);
}

function deleteMonHoc($mamh)
{
    global $conn;

    $sql = "DELETE FROM monhoc WHERE MAMH = '$mamh'";

    return mysqli_query($conn, $sql);
}
?>