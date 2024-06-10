<?php

class Image {

    public function generate_filename($length) {
        $array = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $text = "";
        for ($x = 0; $x < $length; $x++) {
            $random = rand(0, 61);
            $text.= $array[$random];
        }
        return $text;
    }

    public function resize_image($original_file_name, $resized_file_name, $max_width, $max_height) {
        if (file_exists($original_file_name)) {
            $original_image = imagecreatefromjpeg($original_file_name);
            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);

            if ($original_height > $original_width) {
                $ratio = $max_width / $original_width;
                $new_width = $max_width;
                $new_height = $original_height * $ratio;
            } else {
                $ratio = $max_height / $original_height;
                $new_height = $max_height;
                $new_width = $original_width * $ratio;
            }
        }

        if ($max_width!= $max_height) {
            if ($max_height > $max_width) {
                if ($max_height > $new_height) {
                    $adjusment = ($max_height / $new_height);
                } else {
                    $adjusment = ($new_height / $max_height);
                }
                $new_width = $new_width * $adjusment;
                $new_height = $new_height * $adjusment;
            } else {
                if ($max_width > $new_width) {
                    $adjusment = ($max_width / $new_width);
                } else {
                    $adjusment = ($new_width / $max_width);
                }
                $new_width = $new_width * $adjusment;
                $new_height = $new_height * $adjusment;
            }
        }

        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
        imagedestroy($original_image);
        imagejpeg($new_image, $resized_file_name, 90);
        imagedestroy($new_image);
    }

    public function get_thumb_post($filename) {
        $thumbnail = $filename. "_post_thumb.jpg";
        if (file_exists($thumbnail)) {
            return $thumbnail;
        }
        $this->resize_image($filename, $thumbnail, 600, 600);
        if (file_exists($thumbnail)) {
            return $thumbnail;
        } else {
            return $filename;
        }
    }

    public function crop_image($original_file_name, $resized_file_name, $max_width, $max_height) {
        if (file_exists($original_file_name)) {
            $original_image = imagecreatefromjpeg($original_file_name);
            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);

            $new_width = $max_width;
            $new_height = $max_height;

            $x = ($original_width - $new_width) / 2;
            $y = ($original_height - $new_height) / 2;

            $new_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($new_image, $original_image, 0, 0, $x, $y, $new_width, $new_height, $new_width, $new_height);
            imagedestroy($original_image);
            imagejpeg($new_image, $resized_file_name, 90);
            imagedestroy($new_image);
        }
    }
}