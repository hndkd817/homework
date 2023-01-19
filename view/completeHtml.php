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
                <td><?= htmlentities($items[$inq["koumoku"]], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>お問合せ内容</th>
                <td><?= htmlentities($inq["comment"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>名前</th>
                <td><?= htmlentities($inq["name"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td><?= htmlentities($inq["hurigana"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?= htmlentities($inq["phonenumber"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?= htmlentities($inq["email"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>会社名又は団体名</th>
                <td><?= htmlentities($inq["kaisyamei"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>役職名・部署</th>
                <td><?= htmlentities($inq["yakusyoku"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
            </tr>
            <tr>
                <th>ご住所</th>
                <td>
                    <?php if (!empty($inq["address-number"])) { ?>
                        <?= htmlentities($inq["address-number"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?><br>
                        <?= htmlentities($prefectures[$inq["prefecture"]], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?><br>
                        <?= htmlentities($inq["sikutyouson"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?><br>
                        <?= htmlentities($inq["banti-biru"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?><br>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>