<?php
include_once __DIR__ . "/../../database.php";

function getAllUser()
{
    global $conn;

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    $danhsach = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $danhsach[] = $row;
    }

    return $danhsach;
}

function getUserById($id)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE ID = '$id'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function addUser($username, $password, $role)
{
    global $conn;

    $sql = "INSERT INTO users(USERNAME, PASSWORD, ROLE)
            VALUES ('$username', '$password', '$role')";

    return mysqli_query($conn, $sql);
}

function updateUser($id, $username, $password, $role)
{
    global $conn;

    $sql = "UPDATE users
            SET USERNAME = '$username',
                PASSWORD = '$password',
                ROLE = '$role'
            WHERE ID = '$id'";

    return mysqli_query($conn, $sql);
}

function deleteUser($id)
{
    global $conn;

    $sql = "DELETE FROM users WHERE ID = '$id'";

    return mysqli_query($conn, $sql);
}
?>