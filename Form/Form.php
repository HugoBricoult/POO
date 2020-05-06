<?php
class Form{
    private $data;

    public function __construct($data = array()){
        $this->data = $data;
    }

    private function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null ; 
    }

    private function getSelected($index,$value){
        if(isset($this->data[$index])){
            if($this->data[$index] == $value){
                return 'selected="selected"';
            }else{
                return "";
            }
        }else{
            return "";
        }
    }

    private function getRadioChecked($index,$value){
        if(isset($this->data[$index])){
            if($this->data[$index] == $value){
                return 'checked';
            }else{
                return "";
            }
        }else{
            return "";
        }
    }

    private function getCheckboxChecked($index,$value){
        if(isset($this->data[$index])){
            if(in_array($value,$this->data[$index])){
                return 'checked';
            }else{
                return "";
            }
        }else{
            return "";
        }
    }

    public function formOpen($action,$method,$class){
        return '<form action="'.$action.'" method="'.$method.'" class="'.$class.'">';
    }

    public function inputText($name){
        return '<input type="text" name="'.$name.'" value="'.$this->getValue($name).'">';
    }

    public function inputNumber($name){
        return '<input type="Number" name="'.$name.'" value="'.$this->getValue($name).'">';
    }

    public function inputSelect($name,$options){
        $rep = "";
        $rep .= '<select name="'.$name.'">';
        foreach($options as $i => $value){
            $rep .= '<option '.$this->getSelected($name,$value).'>'.$value.'</option>';
        }
        $rep .= '</select>';
        return $rep;
    }

    public function inputTextArea($name){
        return '<textarea name="'.$name.'" >'.$this->getValue($name).'</textarea>';
    }

    public function inputRadio($name,$options){
        $rep = "";
        foreach($options as $i => $value){
            $rep .= '<label for="'.$name.'">'.$value.'</label>';
            $rep .= '<input type="radio" name="'.$name.'" id="'.$value.'" value="'.$value.'" '.$this->getRadioChecked($name,$value).'>';
        }
        return $rep;
    }

    public function inputCheckbox($name,$options){
        $rep = "";
        foreach($options as $i => $value){
            $rep .= '<label for="'.$value.'">'.$value.'</label>';
            $rep .= '<input type="checkbox" name="'.$name.'[]" id="'.$value.'" value="'.$i.'" '.$this->getCheckboxChecked($name,strval($i)).'>';
        }
        return $rep;
    }

    public function submit(){
        return '<button type="submit">Envoyer</button>'; 
    }

    public function labelInput($name,$input){
        return '<label>'.$name.$input.'</label>';
    }

    public function formClose(){
        return '</form>';
    }
}