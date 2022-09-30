<?php

require '../model/Auth.php';

class validateUser extends Login {
    
    private mixed $email;
    private mixed $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    // check all input fields
    private function emptyInputs() {
        $result;

        if(empty($this->email) && empty($this->password)) {
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

        if(empty($this->email)) {
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


    //check email
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

    // check if user exists
    private function checkUserExists() {
        $result;

        if(!$this->checkUser($this->email, $this->password)) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    // check all errors
    public function loginUser() {

        if($this->emptyInputs() == true) {
            print 'Empty fields!'; 
         }
         else if($this->emptyEmail() == true) {
            print 'Empty email!';
        }
        else if($this->emptyPassword() == true) {
            print 'Empty password!';
        }
        else if($this->checkEmail() == true) {
            print 'Invalid email!';
        }
        else if($this->checkUserExists() == true) {
            print 'User does not exist!';
        }
        else {

            //submit data to db
            $this->logUser($this->email, $this->password);

        }
    }


}