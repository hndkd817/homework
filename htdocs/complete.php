<?php
    session_start();

if (!isset($_SESSION["csrf_token"]) || !isset($_POST["csrf_token"]) || 
    $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
        exit();
    }

    $inq = $_POST;

    $items = ["テキスト1", "テキスト2", "テキスト3"];
    $error = [];

    if ($inq["koumoku"] >= count($items)) {
        $error["koumoku"] = "お問合せ項目は不正です";
    }


    if (count($error) > 0) {
        include($_SERVER["DOCUMENT_ROOT"] . "../view/indexHtml.php");
    }
    else {
        include($_SERVER["DOCUMENT_ROOT"] . "/view/completeHtml.php");
    }
?>