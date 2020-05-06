<?php
class Validator{
    public function validateText($text){
        if(preg_match('/[^A-Za-z- ]/',$text) || $text == ''){
            return false;
        }
        return true;
    }   

    public function validateInteger($number){
        if(preg_match('/[^0-9]/',$number) || $number == ''){
            return false;
        }
        return true;
    }

    public function validateEmail($email){
        if( !preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
            return false;
        }	
        return true;
    }

    public function validateFloat($float){
        if(preg_match('/[^0-9,.]/',$float) || $float == ''){
            return false;
        }
        return true;
    }

    public function validateImage($image,$extentionArray,$sizeInMB,$maxwidth,$maxheight){
        $fileinfo = @getimagesize($image['tmp_name']);
        $width = $fileinfo[0];
        $height = $fileinfo[1];
        //file Empty?
        if(! file_exists($image['tmp_name'])){
            return false;
        }
        //file extention
        if(! in_array(pathinfo($image['name'], PATHINFO_EXTENSION),$extentionArray)){
            return false;
        }
        //file size
        if($image['size'] > ($sizeInMB*1000000)){
            return false;
        }
        //file dimention
        if($width > $maxwidth || $height > $maxheight){
            return false;
        }
        //Everythings ok
        return true;
    }
}