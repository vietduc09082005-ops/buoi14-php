<?php
include_once "../app/models/userModel.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "index";
}

if ($action == "index") {

    $danhsach = getAllUser();

    include "../app/view/user/index.php";

} else if ($action == "add") {

    include "../app/view/user/add.php";

} else if ($action == "store") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    addUser($username, $password, $role);

    header("Location: index.php?controller=user");
    exit;

} else if ($action == "edit") {

    $id = $_GET["id"];

    $user = getUserById($id);

    include "../app/view/user/edit.php";

} else if ($action == "update") {

    $id = $_GET["id"];

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    updateUser($id, $username, $password, $role);

    header("Location: index.php?controller=user");
    exit;

} else if ($action == "delete") {

    $id = $_GET["id"];

    deleteUser($id);

    header("Location: index.php?controller=user");
    exit;

} else {

    $danhsach = getAllUser();

    include "../app/view/user/index.php";
}
?>