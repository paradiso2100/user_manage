<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>

<body>
    <?php if (isset($_POST) && isset($errorMessage)) : ?>
        <div>
            <p style="color: #ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></p>
        </div>
    <?php endif ?>
    <form action="/user_manage/service/LoginService.php" method="post">
        <div>
            <p>User ID</p>
            <input type="text" name="userId" size="30" maxlength="30" value="<?php if (isset($_POST["userId"])) echo htmlspecialchars($_POST["userId"]) ?>">
        </div>
        <div style="margin-bottom: 30px;">
            <p>Password</p>
            <input type="text" name="password" size="30" maxlength="30" value="<?php if (isset($_POST["password"])) echo htmlspecialchars($_POST["password"]) ?>">
        </div>
        <button type="submit" name="login">ログイン</button>
        <button type="submit" name="register">会員登録</button>
    </form>
</body>

</html>