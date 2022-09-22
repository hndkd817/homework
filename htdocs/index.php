<?php
session_start();
session_regenerate_id(true);
$csrf_token = bin2hex(random_bytes(16));
$_SESSION = array();
$_SESSION['csrf_token'] = $csrf_token;

$items = ["テキスト1", "テキスト2", "テキスト3"];

$prefectures = ["北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県", "埼玉県",
    "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県", "静岡県", "愛知県",
    "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県",
    "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"
];

$inq = ["koumoku" => "", "comment" => "", "name" => "", "hurigana" => "",
    "phonenumber" => "", "email" => "", "kaisyamei" => "", "yakusyoku" => "",
    "address-number" => "", "prefecture" => "", "sikutyouson" => "",
    "banti-biru" => ""
];

include($_SERVER["DOCUMENT_ROOT"] . "/../view/indexHtml.php");
?>
