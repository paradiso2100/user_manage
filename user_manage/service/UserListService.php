<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/user_manage/dao/UserDao.php";

// 全ユーザーを取得
$userDao = new UserDao();
$stmt = $userDao->selectUserAll();

include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/UserList.php");
?>