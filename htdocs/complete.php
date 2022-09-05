<?php
    session_start();

if (!isset($_SESSION["csrf_token"]) || !isset($_POST["csrf_token"]) || 
    $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
        exit();
    }

    $inq = $_POST;

    $items = ["テキスト1", "テキスト2", "テキスト3"];
    $error = [];



    // お問合せ項目
    if (!isset($inq["koumoku"])) {
        $error["koumoku"]["empty"] = "項目を選択してください";
    }
    elseif ($inq["koumoku"] >= count($items) || !is_numeric($inq["koumoku"])) {
        $error["koumoku"]["over"] = "お問合せ項目は不正です";
    }

    // お問合せ内容
    if (empty($inq["comment"])) {
        $error["comment"]["empty"] = "お問合せ内容を入力してください";
    }

    // 名前
    if (empty($inq["name"])) {
        $error["name"]["empty"] = "名前を入力してください";
    }

    // フリガナ
    if (empty($inq["hurigana"])) {
        $error["hurigana"]["empty"] = "フリガナを入力してください";
    } 
    elseif (!preg_match("/\A[　ァ-ヴー]+\z/u", $inq["hurigana"])) {
        $error["hurigana"]["katakana"] = "カタカナで入力してください";
    }

    // 電話番号
    if (empty($inq["phonenumber"])) {
        $error["phonenumber"]["empty"] = "電話番号を入力してください";
    }
    elseif (!preg_match("/\d{10,11}/", $inq["phonenumber"])) {
        $error["phonenumber"]["hankaku"] = "半角数字で入力してください ※ハイフン不要";
    }

    // メールアドレス
    if (empty($inq["email"])) {
        $error["email"]["empty"] = "メールアドレスを入力してください";
    }
    elseif (!preg_match("/\w+([-+.]\w)*@\w+([-.]\w)*\.\w+([-.]\w)*/", $inq["email"])) {
        $error["email"]["hankaku"] = "正しいメールアドレスを入力してください";
    }

    // 会社名又は団体名
    if (empty($inq["kaisyamei"])) {
        $error["kaisyamei"]["empty"] = "会社名又は団体名を入力してください";
    }

    // 郵便番号
    if (!empty($inq["address-number"])) {
        if (!preg_match("/\d{7}/", $inq["address-number"]) || !is_numeric($inq["address-number"])) {
            $error["address-number"]["hankaku"] = "正しい郵便番号を入力してください";
        }
    }



    if (count($error) > 0) {
        include($_SERVER["DOCUMENT_ROOT"] . "/./index.php");
    }
    else {
        include($_SERVER["DOCUMENT_ROOT"] . "/../view/completeHtml.php");
    }
?>