<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/UsersDao.php";

class UsersService extends BaseService { 

    protected $dao;

    public function __construct() {
        $this->dao = $dao;
    }

    public function getByEmail($email) { 
        return $this->dao->getByEmail($email);
    }

    public function getAllUsers() {
        return $this->dao->getAllUsers();
    }

    public function addUser(first_name, $last_name, $email, $password_hash, $role, $status) {
        return $this->dao->addUser([first_name, $last_name, $email, $password_hash, $role, $status]);
    }




}