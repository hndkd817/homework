<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>お問合せ内容</h1>
    <div class="confirmation">
        <table class="con-table">
            <tr>
                <th>お問合せ項目</th>
                <td><?= $items[$inq["koumoku"]] ?></td>
            </tr>
            <tr>
                <th>お問合せ内容</th>
                <td><?= $inq["comment"] ?></td>
            </tr>
            <tr>
                <th>名前</th>
                <td><?= $inq["name"] ?></td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td><?= $inq["hurigana"] ?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?= $inq["phonenumber"] ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?= $inq["email"] ?></td>
            </tr>
            <tr>
                <th>会社名又は団体名</th>
                <td><?= $inq["kaisyamei"] ?></td>
            </tr>
            <tr>
                <th>役職名・部署</th>
                <td><?= $inq["yakusyoku"] ?></td>
            </tr>
            <tr>
                <th>ご住所</th>
                <td>
                    <?php if (!empty($inq["address-number"])) { ?>
                        <?= $inq["address-number"] ?><br>
                        <?= $prefectures[$inq["prefecture"]] ?><br>
                        <?= $inq["sikutyouson"] ?><br>
                        <?= $inq["banti-biru"] ?><br>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>