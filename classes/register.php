<?php

class Register {

    private $error = "";

    public function evaluate($data) {

        foreach ($data as $key => $value) {
            if (empty($value)) {
                $this->error = $this->error . $key . " is empty!<br>";
            }
        }

        if ($this->emailExists($data['email'])) {
            $this->error .= "Email already exists!<br>";
        }

        if ($this->error == "") {
            $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    private function emailExists($email) {
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            return true;
        }
        return false;
    }

    public function create_user($data) {
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];  // Assuming the password is passed and hashed correctly
        $site = $data['site'];
        $contact_number = $data['contact_number'];
        $department = $data['department'];

        $userid = $this->create_userid();

        $query = "INSERT INTO users (userid, username, email, password, site, contact_number, department, date) 
                  VALUES ('$userid', '$username', '$email', '$password', '$site', '$contact_number', '$department', NOW())";

        $DB = new Database();
        $DB->save($query);
    }

    private function create_userid() {
        $length = rand(4, 19);
        $number = "";

        for ($i = 0; $i < $length; $i++) {
            $new_rand = rand(0, 9);
            $number = $number . $new_rand;
        }

        return $number;
    }
}

?>
