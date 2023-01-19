<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>ログイン</h1>
    <?php if (isset($e)) { ?>
        <div class="error">usernameもしくはpasswordが不正です</div>
    <?php } ?>
    <form name="login" action="admin.php" method="POST">
        <div class="user">username:</div><input type="text" name="user"><br>
        <div class="pass">password:</div><input type="password" name="pass"><br>
        <input type="submit" name="btn">
    </form>
</body>
</html>