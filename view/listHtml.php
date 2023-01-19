<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <h1>データベースリスト</h1>
    <div class="dblist">
        <table class="list">
            <tr>
                <th>お問合せ項目</th>
                <th>お問合せ内容</th>
                <th>名前</th>
                <th>フリガナ</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>会社名又は団体名</th>
                <th>役職名・部署</th>
                <th>作成日</th>
                <th>更新日</th>
            </tr>
            <?php foreach ($stm as $datas) { ?>
                <tr>
                    <td><?= htmlentities($datas["koumoku"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["comment"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["name"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["hurigana"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["phonenumber"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["email"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["kaisyamei"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["yakusyooku"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["created_at"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                    <td><?= htmlentities($datas["updated_at"], ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401, "UTF-8") ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>