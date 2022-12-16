<?php
session_start();

if (!isset($_SESSION["csrf_token"]) || !isset($_POST["csrf_token"]) ||
    $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
    exit();
}

$csrf_token = $_POST["csrf_token"];

$inq = $_POST;

$items = ["テキスト1", "テキスト2", "テキスト3"];
$prefectures = [
    "北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県", "埼玉県",
    "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県", "静岡県", "愛知県",
    "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県",
    "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"
];
$error = [];



// お問合せ項目
if (empty($inq["koumoku"]) && $inq["koumoku"] != 0) {
    $error["koumoku"]["empty"] = "項目を選択してください";
} elseif ($inq["koumoku"] >= count($items)) {
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
} elseif (!preg_match("/\A[　ァ-ヴー]+\z/u", $inq["hurigana"])) {
    $error["hurigana"]["katakana"] = "カタカナで入力してください";
}

// 電話番号
if (empty($inq["phonenumber"])) {
    $error["phonenumber"]["empty"] = "電話番号を入力してください";
} elseif (!preg_match("/^\d{10,11}$/", $inq["phonenumber"])) {
    $error["phonenumber"]["hankaku"] = "半角数字で入力してください ※ハイフン不要";
}

// メールアドレス
if (empty($inq["email"])) {
    $error["email"]["empty"] = "メールアドレスを入力してください";
} elseif (!preg_match("/^\w+([-+.]\w)*@\w+([-.]\w)*\.\w+([-.]\w)*$/", $inq["email"])) {
    $error["email"]["hankaku"] = "正しいメールアドレスを入力してください";
}

// 会社名又は団体名
if (empty($inq["kaisyamei"])) {
    $error["kaisyamei"]["empty"] = "会社名又は団体名を入力してください";
}

// 住所
if (!empty($inq["address-number"]) || !empty($inq["prefecture"])  || $inq["prefecture"] == 0 ||
    !empty($inq["sikutyouson"]) || !empty($inq["banti-biru"])) {
    // 郵便番号
    if (!empty($inq["address-number"])) {
        if (!preg_match("/^\d{7}$/", $inq["address-number"])) {
            $error["address-number"]["error"] = "正しい郵便番号を入力してください";
        }
    } else {
        $error["address-number"]["error"] = "郵便番号を記入してください";
    }

    // 都道府県
    if (!empty($inq["prefecture"]) || $inq["prefecture"] == 0) {
        if ($inq["prefecture"] >= count($prefectures) || !is_numeric($inq["prefecture"])) {
            $error["prefecture"]["error"] = "選択肢が不正です";
        }
    } else {
        $error["prefecture"]["error"] = "都道府県を選択してください";
    }

    // 市区町村
    if (empty($inq["sikutyouson"])) {
        $error["sikutyouson"]["error"] = "市区町村を入力してください";
    }

    // 番地・ビル名
    if (empty($inq["banti-biru"])) {
        $error["banti-biru"]["error"] = "番地・ビル名を入力してください";
    }
}




if (count($error) > 0) {
    include($_SERVER["DOCUMENT_ROOT"] . "/../view/indexHtml.php");
} else {
    // DB接続
    $db = new PDO("mysql:dbname=PETA_DB;host=localhost", "inquiries", "kou12345");
    $stm = $db->prepare("insert into inquiries(koumoku, comment, name, 
        hurigana, phonenumber, email, kaisyamei, yakusyooku, created_at, updated_at)
        value(?, ?, ? ,?, ?, ?, ?, ?, ?, ?)");
    $stm->execute([$inq["koumoku"], $inq["comment"], $inq["name"], $inq["hurigana"], $inq["phonenumber"],
        $inq["email"], $inq["kaisyamei"], $inq["yakusyoku"], date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
    include($_SERVER["DOCUMENT_ROOT"] . "/../view/completeHtml.php");
    unset($stm, $db);
    unset($_SESSION['csrf_token']);
}
?>