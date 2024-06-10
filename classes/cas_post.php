<?php

class Post {

    private $error = "";

    public function create_post($userid, $data, $files) {
        if (!empty($data['post']) || !empty($files['file']['name'])) {
            $image = "";
            $has_image = 0;

            if (!empty($files['file']['name'])) {
                $folder = "uploads/" . $userid . "/";

                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }

                $image_class = new Image();
                $image = $folder . $image_class->generate_filename(15) . ".jpg";
                move_uploaded_file($files['file']['tmp_name'], $image);
                $image_class->resize_image($image, $image, 1500, 1500);
                $has_image = 1;
            }

            $post = addslashes($data['post']);
            $postid = $this->create_postid();

            $query = "INSERT INTO cas_posts (userid, postid, post, image, has_image) VALUES ('$userid', '$postid', '$post', '$image', '$has_image')";

            $DB = new Database();
            $DB->save($query);

        } else {
            $this->error .= "Please add post!<br>";
        }

        return $this->error;
    }

    public function get_posts($id) {
        $query = "SELECT * FROM cas_posts ORDER BY id DESC LIMIT 10";
        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function like_post($id, $type, $campusportal_userid) {
        if ($type == "post") {
            $DB = new Database();

            // Check if the likes entry exists in the cas_likes table
            $sql = "SELECT likes FROM cas_likes WHERE type = 'post' AND contentid = '$id' LIMIT 1";
            $result = $DB->read($sql);

            if ($result && is_array($result) && isset($result[0])) {
                $likes = json_decode($result[0]['likes'], true);
                
                if ($likes === null) {
                    $likes = [];
                }

                $user_ids = array_column($likes, "userid");

                if (!in_array($campusportal_userid, $user_ids)) {
                    $arr['userid'] = $campusportal_userid;
                    $arr['date'] = date("Y-m-d H:i:s");

                    $likes[] = $arr;

                    $likes_string = json_encode($likes);
                    $sql = "UPDATE cas_likes SET likes = '$likes_string' WHERE type = 'post' AND contentid = '$id' LIMIT 1";
                    $DB->save($sql);

                    // Update the likes count in the cas_posts table
                    $sql = "UPDATE cas_posts SET likes = likes + 1 WHERE postid = '$id' LIMIT 1";
                    $DB->save($sql);
                } else {
                    $key = array_search($campusportal_userid, $user_ids);
                    unset($likes[$key]);

                    // Reindex the array to avoid issues with json_encode
                    $likes = array_values($likes);

                    $likes_string = json_encode($likes);
                    $sql = "UPDATE cas_likes SET likes = '$likes_string' WHERE type = 'post' AND contentid = '$id' LIMIT 1";
                    $DB->save($sql);

                    // Update the likes count in the cas_posts table
                    $sql = "UPDATE cas_posts SET likes = likes - 1 WHERE postid = '$id' LIMIT 1";
                    $DB->save($sql);
                }

            } else {
                // Handle the case where there are no likes yet
                $arr['userid'] = $campusportal_userid;
                $arr['date'] = date("Y-m-d H:i:s");

                $arr2[] = $arr;

                $likes = json_encode($arr2);
                $sql = "INSERT INTO cas_likes (type, contentid, likes) VALUES ('$type', '$id', '$likes')";
                $DB->save($sql);

                // Update the likes count in the cas_posts table
                $sql = "UPDATE cas_posts SET likes = likes + 1 WHERE postid = '$id' LIMIT 1";
                $DB->save($sql);
            }
        }
    }

    public function get_data($id) {
        $query = "SELECT * FROM users WHERE userid = '$id' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);
        
        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function get_one_post($postid) {
        
        if (!is_numeric($postid)) {
            
            return false;
        }

        $query = "SELECT * FROM cas_posts WHERE postid = '$postid' LIMIT 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            
            return $result[0];
        }else{

            return false;
        }
    }

    private function create_postid() {
        $length = rand(4, 19);
        do {
            $number = "";
            for ($i = 0; $i <= $length; $i++) {
                $new_rand = rand(0, 9);
                $number.= $new_rand;
            }
            $DB = new Database();
            $query = "SELECT postid FROM cas_posts WHERE postid = '$number' LIMIT 1";
            $result = $DB->read($query);
        } while (!empty($result));

        return $number;
    }
}
?>
