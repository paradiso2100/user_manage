<?php
require_once 'BaseDao.php';

class UserDao extends BaseDao
{

    //会員検索
    public function findUserByUserId($userId = null)
    {

        $stmt = $this->pdo->prepare("SELECT user_id, password FROM user_m WHERE user_id = ?");
        $stmt->execute(array($userId));
        return $stmt;
    }

    //会員登録
    public function insertUser($userMEntity)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user_m VALUES(?,?)");
        $stmt->execute(
            array(
                $userMEntity->getUserId(), password_hash($userMEntity->getPassword(), PASSWORD_DEFAULT)
            )
        );
    }

    //会員一覧取得
    public function selectUserAll()
    {

        return $stmt = $this->pdo->query("SELECT user_id FROM user_m");
    }

    //会員削除
    public function deleteUserByUserId($userId)
    {

        $stmt = $this->pdo->prepare("DELETE FROM user_m WHERE user_id = ?");
        $stmt->execute(array($userId));
        return $stmt;
    }
}
