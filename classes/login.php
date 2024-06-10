<?php

class Login{

    private $error = "";

    public function evaluate($data){

        $username = $data['username'];
        $password = $data['password'];
        $site = $data['site'];

        $query = "select * from users where username =  '$username' AND site = '$site' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result){

            $row = $result[0];

            if($password == $row['password']){

                $_SESSION['campusportal_userid'] = $row['userid'];

            }else{

                $this->error .= "wrong password<br>";
            }

        }else{

            $this->error .= "No such user was found<br>";
        }

        return $this->error;
    }

    public function check_login($id){

        $query = "select userid from users where userid =  $id limit 1";
                                                
        $DB = new Database();
        $result = $DB->read($query);

        if($result){

            return true;
        }

        return false;

    }

}