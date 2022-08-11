<?php
    $items = ["テキスト1", "テキスト2", "テキスト3"];
    $prefectures = ["北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県", "埼玉県",
        "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県", "静岡県", "愛知県",
        "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県",
        "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"
    ];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問合せフォーム</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>お問合せフォーム</h1>
    <div class="inquiries">
        <form method="POST" action="complete.php">
            <table class="form-table">
                <tr>
                    <th>お問合せ項目 <span>必須</span></th>
                    <td>
                        <?php foreach ($items as $item): ?>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="koumoku" value="テキスト1">
                                    <?php echo $item; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <th>お問合せ内容 <span>必須</span></th>
                    <td>
                        <textarea name="comment" cols="40" rows="10" placeholder="お問合せ内容を入力してください"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>名前 <span>必須</span></th>
                    <td>
                        <input type="text" name="name" style="width: 200px; height: 20px" placeholder="例：山田　太郎">
                    </td>
                </tr>
                <tr>
                    <th>フリガナ <span>必須</span></th>
                    <td>
                        <input type="text" name="hurigana" style="width: 200px; height: 20px" placeholder="例：ヤマダ　タロウ">
                    </td>
                </tr>
                <tr>
                    <th>電話番号（半角） <span>必須</span></th>
                    <td>
                        <input type="text" name="phonenumber" style="width: 200px; height: 20px" placeholder="例：00000000000（ハイフン不要）">
                        <?php if (isset($error["phonenumber"])): ?>
                            <div class="error">
                                <?php echo "電話番号を入力してください"; ?>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス（半角） <span>必須</span></th>
                    <td>
                        <input type="email" name="email" style="width: 200px; height: 20px" placeholder="例：example＠co.jp">
                    </td>
                </tr>
                <tr>
                    <th>会社名又は団体名　<span>必須</span></th>
                    <td>
                        <input type="text" name="kaisyamei" style="width: 200px; height: 20px" placeholder="例：○○会社">
                    </td>
                </tr>
                <tr>
                    <th>役職名・部署名</th>
                    <td><input type="text" name="yakusyoku" style="width: 200px; height: 20px" placeholder="例：部長・営業"></td>
                </tr>
                <tr>
                    <th>ご住所</th>
                    <td>
                        <div class="address-number">
                            郵便番号<br>
                            <input type="text" name="address-number" style="width: 200px; height: 20px" placeholder="例：0000000（ハイフン不要）">
                            <br>
                        </div>
                        <div class="prefecture">
                            都道府県<br>
                            <select name="prefecture" size="1">
                                <option value="-----">-----</option>
                           <?php foreach ($prefectures as $prefecture): ?>
                                    <option value="<?php echo $prefecture; ?>"><?php echo $prefecture; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="sikutyouson">
                            市区町村<br>
                            <input type="text" name="sikutyouson" style="width: 200px; height: 20px" placeholder="例：〇〇市△△区□□">
                        </div>
                        <div class="banti-biru">
                            番地・ビル名<br>
                            <input type="text" name="banti-biru" style="width: 200px; height: 20px" placeholder="0-0-00 〇〇〇〇ビル">
                        </div>
                    </td>
                </tr>
            </table>
            <div class="btn">
                <input type="submit" class="sub">
            </div>
        </form>
    </div>
</body>
</html>