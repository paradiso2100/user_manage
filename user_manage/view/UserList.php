<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>会員一覧</title>
</head>

<body>

    <?php if (isset($errorMessage)) : ?>
        <div>
            <p style="color: #ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></p>
        </div>
    <?php endif ?>
    <form action="/user_manage/service/UserDeleteService.php" method="post">
        <?php foreach($stmt as $row): ?>
            <div>
                <span>User ID:　<?php echo $row["user_id"] ?></span>
                <button type="submit" name="del_user" value="<?php echo $row['user_id'] ?>">削除</button>
            </div>
        <?php endforeach ?>
    </form>
</body>

</html>