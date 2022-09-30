<?php

require '../model/Auth.php';

class signUp extends Register {

    private string $username;
    private mixed $email;
    private mixed $password;

    public function __construct($name, $email, $password) {
        $this->username = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // check if inputs are empty
    private function emptyInputs() {
        $result;

        if(empty($this->username) && empty($this->email) && empty($this->password)) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }


    // check empty name
    private function emptyName() {
        $result;

        if(empty($this->username)) {
            $result = true;
            
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check empty email
    private function emptyEmail() {
        $result;

        if(empty($this->email)){
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check empty password
    private function emptyPassword() {
        $result;

        if(empty($this->password)) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check username does not have special chars
    private function checkName() {
        $result;

        $checkName = !(preg_match("/^[a-zA-Z]*$/", $this->username));

        if($checkName) {
           $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check email
    private function checkEmail() {
        $result;

        $checkEmail = !(filter_var($this->email, FILTER_VALIDATE_EMAIL));

        if($checkEmail) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check password length
    private function shortPassLength() {
        $result;

        if(strlen($this->password) < 6) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    private function checkUser() {
        $result; 

        if($this->checkUserExists($this->username, $this->email, $this->password)) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }


    // check all errors
    public function signUser() {

        if($this->emptyInputs() == true) {
           print 'Empty fields!'; 
        }
        else if($this->emptyName() == true) {
            print 'Empty username!';
        }
        else if($this->emptyEmail() == true) {
            print 'Empty email!';
        }
        else if($this->emptyPassword() == true) {
            print 'Empty password!';
        }
        else if($this->checkName() == true) {
            print 'Invalid username!';
        }
        else if($this->checkEmail() == true) {
            print 'Invalid email!';
        }
        else if($this->shortPassLength() == true) {
            print 'Password too short!';
        }
        else if($this->checkUser() == true) {
            print 'User already exists!';
        }
        else {

            //submit data to db
            $this->setUser($this->username, $this->email, $this->password);

        }
    }

}