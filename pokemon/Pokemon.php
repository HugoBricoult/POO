<?php
class Pokemon{
    private $health = 0;
    private $name = "";
    private $level = 0;
    private $linkImage = "";
    private $attack1Name = "";
    private $attack2Name = "";
    private $attack1Damamge = 0;
    private $attack2Dammage = 0;
    private $attack1Type = [];
    private $attack2Type = [];
    private $weakness = "";
    private $resistance = "";
    private $retreat = 0;

    function __construct($health,$name){
        $this->health = $health;
        $this->name = $name;
        //... etc
    }

    public function getDammage($dammage,$type){
        if($type == 3){
            $this->health = $this->health - ($dammage/2);
        }else{
            $this->health = $this->health - $dammage;
        }
    }

    public function getAttack1Dammage(){
        return $this->attack1Damamge();
    }
    //getter and setter ... etc
}