<?php
session_start();
session_regenerate_id(true);
$csrf_token = bin2hex(random_bytes(16));
$_SESSION = array();
$_SESSION["csrf_token"] = $csrf_token;

// $user, $pass登録されていない
if (!isset($_POST["user"]) || !isset($_POST["pass"])) {
    include($_SERVER["DOCUMENT_ROOT"] . "/../view/loginHtml.php");
}
else {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    try {
        $db = new PDO("mysql:dbname=PETA_DB;host=localhost", $user, $pass);
        $stm = $db->prepare("select * from inquiries");
        $stm->execute();
        include($_SERVER["DOCUMENT_ROOT"] . "/../view/listHtml.php");
        unset($stm, $db);
    }
    catch (Exception $e) {
        include($_SERVER["DOCUMENT_ROOT"] . "/../view/loginHtml.php");
    }
}