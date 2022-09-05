<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>お問合せ内容</h1>
    <div class="confirmation">
        <table class="con-table">
            <tr>
                <th>お問合せ項目</th>
                <td><?php echo $items[$inq["koumoku"]]; ?></td>
            </tr>
            <tr>
                <th>お問合せ内容</th>
                <td><?php echo $inq["comment"]; ?></td>
            </tr>
            <tr>
                <th>名前</th>
                <td><?php echo $inq["name"]; ?></td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td><?php echo $inq["hurigana"]; ?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?php echo $inq["phonenumber"]; ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?php echo $inq["email"]; ?></td>
            </tr>
            <tr>
                <th>会社名又は団体名</th>
                <td><?php echo $inq["kaisyamei"];?></td>
            </tr>
            <tr>
                <th>役職名・部署</th>
                <td><?php echo $inq["yakusyoku"]; ?></td>
            </tr>
            <tr>
                <th>ご住所</th>
                <td>
                    <?php echo $inq["address-number"]; ?><br>
                    <?php echo $inq["prefecture"]; ?><br>
                    <?php echo $inq["sikutyouson"]; ?><br>
                    <?php echo $inq["banti-biru"]; ?><br>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>