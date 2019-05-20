<?php
// 入力チェック
function isInvalidValidation($param)
{
    if (empty($param["userId"])) {
        $_SESSION["errorMessage"] = 'ユーザーIDを入力してください';
        return true;
    } else if (empty($param["password"])) {
        $_SESSION["errorMessage"] = 'パスワードを入力してください';
        return true;
    }
}
?>