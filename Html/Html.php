<?php
class Html{
    public function doctype(){
        return "<!DOCTYPE html>";
    }
    public function htmlOpen($lang){
        return '<html lang="'.$lang.'">';
    }
    public function headOpen(){
        return '<head>';
    }
    public function title($title){
        return '<title>'.$title.'</title>';
    }
    public function metaDesc($descriptionContent){
        return '<meta name="description" content="'.$descriptionContent.'">';
    }
    public function metaCharset($charset){
        return  '<meta charset="'.$charset.'">';
    }
    public function linkCss($cssFileTarget){
        return '<link rel="stylesheet" href="'.$cssFileTarget.'">';
    }
    public function headClose(){
        return '</head>';
    }
    public function bodyOpen(){
        return '<body>';
    }
    public function imgLink($imgTarget,$alt){
        return '<img src="'.$imgTarget.'" alt="'.$alt.'">';
    }
    public function aLink($link,$namelink){
        return '<a href="'.$link.'">'.$namelink.'</a>';
    }
    public function bodyClose(){
        return '</body>';
    }
    public function scriptJs($jsFileTarget){
        return '<script src="'.$jsFileTarget.'"></script>';
    }
    public function htmlClose(){
        return '</html>';
    }
}