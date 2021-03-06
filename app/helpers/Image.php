<?php

namespace App\Helpers;

class Image
{

    protected $errors;

    public function upload($name)
    {
        $errors = [];
        $file_name = $_FILES[$name]['name'];
        $file_size = $_FILES[$name]['size'];
        $file_tmp = $_FILES[$name]['tmp_name'];
        $file_type = $_FILES[$name]['type'];
        $file_ext = explode('.', $_FILES[$name]['name']);
        $file_ext = end($file_ext);
        $file_ext = strtolower($file_ext);
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }
        $this->errors = $errors;
        $file_name = uniqid() . '' . rand(0, 99999) . '.' . $file_ext;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, IMG_PATH . '' . $file_name);
            return $file_name;
        } else {
            return false;
        }
    }

    public function getError()
    {
        return $this->errors;
    }
}
