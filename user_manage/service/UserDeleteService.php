<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/user_manage/dao/UserDao.php";

if (isset($_POST["del_user"])) {

	try {
    //ユーザー削除
    $userDao = new UserDao();
    $stmt = $userDao->deleteUserByUserId($_POST["del_user"]);

    $stmt = $userDao->selectUserAll();
    include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/UserList.php");
    
	} catch (Exception $e) {
		echo $e->getMessage();
		$errorMessage = $e->getMessage();
        include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/UserList.php");
		exit();
	}
}
?>