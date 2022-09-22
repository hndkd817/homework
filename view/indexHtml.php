<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問合せフォーム</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <h1>お問合せフォーム</h1>
    <div class="inquiries">
        <form method="POST" action="/./complete.php">
            <table class="form-table">
                <tr>
                    <th>お問合せ項目 <span>必須</span></th>
                    <td>
                        <?php if (isset($error["koumoku"]["empty"])) { ?>
                            <div style="color: red;"><?= $error["koumoku"]["empty"] ?></div>
                        <?php } ?>
                        <?php if (isset($error["koumoku"]["over"])) { ?>
                            <div style="color: red;"><?= $error["koumoku"]["over"] ?></div>
                        <?php } ?>
                        <input type="radio" name="koumoku" value="" checked style="display:none" >
                        <?php for ($i = 0; $i < count($items); $i++){ ?>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="koumoku" value="<?= $i ?>"
                                        <?= $inq["koumoku"] == $i ? "checked" : "" ?>>
                                    <?= $items[$i] ?>
                                </label>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>お問合せ内容 <span>必須</span></th>
                    <td>
                        <?php if (isset($error["comment"]["empty"])) { ?>
                            <div style="color: red;"><?= $error["comment"]["empty"] ?></div>
                        <?php } ?>
                        <textarea name="comment" cols="40" rows="10"><?= $inq["comment"] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>名前 <span>必須</span></th>
                    <td>
                        <?php if (isset($error["name"]["empty"])) { ?>
                            <div style="color: red;"><?= $error["name"]["empty"] ?></div>
                        <?php } ?>
                        <input type="text" name="name" style="width: 200px; height: 20px" value="<?= $inq["name"] ?>">
                        <p>(例：山田　太郎)</p>
                    </td>
                </tr>
                <tr>
                    <th>フリガナ <span>必須</span></th>
                    <td>
                        <?php if (isset($error["hurigana"]["empty"])) { ?>
                            <div style="color: red;"><?= $error["hurigana"]["empty"] ?></div>
                        <?php } ?>
                        <?php if (isset($error["hurigana"]["katakana"])) { ?>
                            <div style="color: red;"><?= $error["hurigana"]["katakana"] ?></div>
                        <?php } ?>
                        <input type="text" name="hurigana" style="width: 200px; height: 20px" value="<?= $inq["hurigana"] ?>">
                        <p>(例：ヤマダ　タロウ)</p>
                    </td>
                </tr>
                <tr>
                    <th>電話番号（半角） <span>必須</span></th>
                    <td>
                        <?php if (isset($error["phonenumber"]["empty"])) { ?>
                            <div style="color: red;"><?= $error["phonenumber"]["empty"] ?></div>
                        <?php } ?>
                        <?php if (isset($error["phonenumber"]["hankaku"])) { ?>
                            <div style="color: red;"><?= $error["phonenumber"]["hankaku"] ?></div>
                        <?php } ?>
                        <input type="text" name="phonenumber" style="width: 200px; height: 20px" value="<?= $inq["phonenumber"] ?>">
                        <p>（例：00000000000 ※ハイフン不要）</p>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス（半角） <span>必須</span></th>
                    <td>
                        <?php if (isset($error["email"]["empty"])) { ?>
                            <div style="color: red;"><?= $error["email"]["empty"] ?></div>
                        <?php } ?>
                        <?php if (isset($error["email"]["hankaku"])) { ?>
                            <div style="color: red;"><?= $error["email"]["hankaku"] ?></div>
                        <?php } ?>
                        <input type="email" name="email" style="width: 200px; height: 20px" value="<?= $inq["email"] ?>">
                        <p>(例：example＠co.jp)</p>
                    </td>
                </tr>
                <tr>
                    <th>会社名又は団体名　<span>必須</span></th>
                    <td>
                        <?php if (isset($error["kaisyamei"]["empty"])) { ?>
                            <div style="color: red;"><?= $error["kaisyamei"]["empty"] ?></div>
                        <?php } ?>
                        <input type="text" name="kaisyamei" style="width: 200px; height: 20px" value="<?= $inq["kaisyamei"] ?>">
                        <p>(例：○○会社)</p>
                    </td>
                </tr>
                <tr>
                    <th>役職名・部署名</th>
                    <td>
                        <input type="text" name="yakusyoku" style="width: 200px; height: 20px" value="<?= $inq["yakusyoku"] ?>">
                        <p>(例：部長・営業)</p>
                    </td>
                </tr>
                <tr>
                    <th>ご住所</th>
                    <td>
                        <div class="address-number">
                            <div style="margin-top: 1em;">郵便番号</div>
                            <?php if (isset($error["address-number"]["error"])) { ?>
                                <div style="color: red;"><?= $error["address-number"]["error"] ?></div>
                            <?php } ?>
                            <input type="text" name="address-number" style="width: 200px; height: 20px" value="<?= $inq["address-number"] ?>">
                            <p>(例：0000000 ※ハイフン不要)</p>
                        </div>
                        <div class="prefecture">
                            <div style="margin-top: 1em;">都道府県</div>
                            <?php if (isset($error["prefecture"]["error"])) { ?>
                                <div style="color: red;"><?= $error["prefecture"]["error"] ?></div>
                            <?php } ?>
                            <select name="prefecture" size="1">
                                <option value="">-----</option>
                                <?php for ($i=0; $i<count($prefectures); $i++) { ?>
                                    <option value="<?= $i ?>" <?= $inq["prefecture"] == $i ? "selected" : "" ?>>
                                        <?= $prefectures[$i] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="sikutyouson">
                            <div style="margin-top: 1em;">市区町村</div>
                            <?php if (isset($error["sikutyouson"]["error"])) { ?>
                                <div style="color: red;"><?= $error["sikutyouson"]["error"] ?></div>
                            <?php } ?>
                            <input type="text" name="sikutyouson" style="width: 200px; height: 20px" value="<?= $inq["sikutyouson"] ?>">
                            <p>(例：〇〇市△△区□□)</p>
                        </div>
                        <div class="banti-biru">
                        <div style="margin-top: 1em;">番地・ビル名</div>
                            <?php if (isset($error["banti-biru"]["error"])) { ?>
                                <div style="color: red;"><?= $error["banti-biru"]["error"] ?></div>
                            <?php } ?>
                            <input type="text" name="banti-biru" style="width: 200px; height: 20px" value="<?= $inq["banti-biru"] ?>">
                            <p>(0-0-00 〇〇〇〇ビル)</p>
                        </div>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" > 
            <div class="btn">
                <input type="submit" class="sub">
            </div>
        </form>
    </div>
</body>
</html>