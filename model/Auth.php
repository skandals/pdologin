<?php

require '../config/Database.php';

class Register extends Database {

    // check if user exists
    protected function checkUserExists($username, $email, $password) {
        $stmt = null;
        $resultCheck;

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");

        $stmt->execute([$email]);

        if($stmt->rowCount() > 0) {
            $resultCheck = true;
        }else {
            $resultCheck = false;
        }

        return $resultCheck;
    }

    protected function setUser($username, $email, $password) {
        $stmt = null;

        // hash password
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->connect()->prepare("INSERT INTO users(name, email, password) VALUES(?, ?, ?)");

        $stmt->execute([$username, $email, $hashedPass]);

        print 'Registered successfully!';

    }

}


class Login extends Database {

    // check if user exists
    protected function checkUser($email, $password) {
        $stmt = null;
        $resultCheck;

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");

        $stmt->execute([$email]);

        if($stmt->rowCount() > 0) {
            $resultCheck = true;
        }else {
            $resultCheck = false;
        }

        return $resultCheck;
    }
        
    protected function logUser($email, $password) {
        $stmt = null;

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // check if password matches
        $unHashedPass = password_verify($password, $user['password']);

        if($unHashedPass) {

            print 'Login successful!';

        }else {
            print 'Wrong password. Try again.';
        }

    }
    
}