<?php
    class user{

        private $username;
        private $password;
        private $cPassword;

        public $errors = [
            "username" => "",
            "password" => "",
            "cPassword" => "",
            "validationMessage" => ""
        ];

        public function hasError(){
            foreach($this -> errors as $key => $value){
                if(!empty($value)){
                    return true;
                }
            }
            return false;
        }


        public function setUsername($username){
            if(empty($username)){
                $this -> errors["username"] = "Please write a username";
            }
            else if(!preg_match("%^[a-zA-Z ]{3,}$%", $username)){
                $this -> errors["username"] = "Please write a valid username";
                $this -> username = $username;
            }else{
                $this -> username = $username;
            }
        }

        public function setPassword($password){
            if(empty($password)){
                $this -> errors["password"] = "Please wite a password";
            }else if(!preg_match("%^[a-zA-Z ]{8,}$%", $password)){
                $this -> errors["password"] = "Please write a valid passwword with min 8 characters";
            }else{
                $this -> password = $password;
            }
        }

        public function setCpassword($cPassword){
            if(empty($cPassword)){
                $this -> errors["cPassword"] = "Please confirm your password";
            }else if($cPassword != $this -> getPassword()){
                $this -> errors["cPassword"] = "Password and Confirm Password do not match!";
            }
            else{
                $this -> cPassword = $cPassword;
            }
        }

        public function getUsername(){
            return $this -> username;
        }

        public function getPassword(){
            return $this -> password;
        }

        public function getCpassword(){
            return $this -> cPassword;
        }
    }

?>