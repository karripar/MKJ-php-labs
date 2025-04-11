<?php
namespace MediaProject;

require_once __DIR__ ."/User.class.php";
use MediaProject\User;

class UserDBOps {

    private \PDO $DBH;

    public function __construct($DBH) {
        $this->DBH = $DBH;
    }
    public function login(): User | null {
        $sql = 'SELECT * FROM Users WHERE username = :username';

        $data = ['username' => $_POST['username']];
       
        $stmt = $this->DBH->prepare($sql);
        $stmt->execute($data);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            return new User($user);
        } else {
            return null;
        }
    }
}