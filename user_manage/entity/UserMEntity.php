<?php

class UserMEntity {
	private $userId;
	private $password;

	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
}
?>