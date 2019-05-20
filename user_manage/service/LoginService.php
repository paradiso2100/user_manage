<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/user_manage/utils/Validation.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/user_manage/dao/UserDao.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/user_manage/entity/UserMEntity.php";

if (isInvalidValidation($_POST)) {
	include("Login.php");
	exit;
}

// ログインボタンが押された場合
if (isset($_POST["login"])) {
	
	try {
	
		// ユーザーIDでユーザーMを検索
		$userDao = new UserDao();
		$stmt = $userDao->findUserByUserId($_POST["userId"]);
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// パスワードが不一致だとログイン画面へ
			if (!password_verify($_POST["password"], $row["password"])) {
				$errorMessage = 'ユーザーIDもしくはパスワードに誤りがあります。';
				include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/Login.php");
				exit();
			}
		} else {
			$errorMessage = '登録されていません。';
			include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/Login.php");
			exit();
		}
		
		//会員一覧画面へリダイレクト
		session_regenerate_id(true);
		header("Location: ../service/UserListService.php");
		exit();
	} catch (Exception $e) {
		echo $e->getMessage();
		$errorMessage = $e->getMessage();
		include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/Login.php");
		exit();
	}
} else if(isset($_POST["register"])) {
	
	try {
		// User ID使用チェック
		$userDao = new UserDao();
		$stmt = $userDao->findUserByUserId($_POST["userId"]);
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$errorMessage = '入力されたUser IDはすでに使用されています';
			include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/Login.php");
			exit();
		}
		
		// 新規登録
		$userMEntity = new UserMEntity();
		$userMEntity->setUserId($_POST["userId"]);
		$userMEntity->setPassword($_POST["password"]);
		$userDao->insertUser($userMEntity);

		//会員一覧画面へリダイレクト
		session_regenerate_id(true);
		header("Location: ../service/UserListService.php");
		exit();
	} catch (Exception $e) {
		echo $e->getMessage();
		$errorMessage = $e->getMessage();
		include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/Login.php");
		exit();
	}
} else {
	$errorMessage = 'ボタンを押してください';
	include($_SERVER["DOCUMENT_ROOT"]."/user_manage/view/Login.php");
	exit();
}