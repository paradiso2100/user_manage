<?php
require_once '../utils/DbConnect.php';

class BaseDao {
    protected $pdo;

    public function __construct() {
        $this->pdo = DbConnect::getDbConnection();
    }
}