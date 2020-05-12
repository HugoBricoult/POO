<?php
class Voiture {
    private $registrationNumber = 0;
    private $dateOfCirculation = '1970/1/1';
    private $mileage = 0;
    private $model = "";
    private $mark = "";
    private $color = "";
    private $weight = 0;
    private $reserved = "";
    private $utility = "";
    private $country = "";
    private $wear = "";
    private $age = 0;
    private $imageLink = "";

    function __construct($regNumber,$dateCir,$mileage,$model,$mark,$color,$weight){
        $this->registrationNumber = $regNumber;
        $this->dateOfCirculation = $dateCir;
        $this->mileage = $mileage;
        $this->model = $model;
        $this->mark = $mark;
        $this->color = $color;
        $this->weight = $weight;
        update();
    }

    private function update(){
        $this->$reserved = ($this->$mark == "Audi") ? "reserved" : "free";
        $this->$utility = ($this->$weight > 3.5) ? "utilitaire" : "commercial";
        $countr = substr($this->$registrationNumber,0,2);
        switch($countr){
            case "BE" :
                $this->$country = "Belgium";
            break;
            case "FR" :
                $this->$country = "France";
            break;
            case "DE" :
                $this->$country = "Germany";
            break;
            default :
            $this->$country = "Unknow";
            break;
        }
        if($this->$mileage < 100000){
            $this->$wear = "low";
        }elseif($this->$mileage < 200000){
            $this->$wear = "middle";
        }else{
            $this->$wear = "high";
        }
    }

    public function setMileage($mileage){
        $this->mileage = $mileage;
        update();
    }

    public function rouler(){
        $this->mileage = $this->mileage + 100000;
        update();
    }

    public function display(){
        return "
        <table>
            <th>
                <td>Image</td>
                <td>Model</td>
                <td>Mark</td>
                <td>Mileage</td>
                <td>Color</td>
            </th>
            <tr>
                <td>".$this->imageLink."</td>
                <td>".$this->model."</td>
                <td>".$this->mark."</td>
                <td>".$this->mileage."</td>
                <td>".$this->color."</td>
            </tr>
        </table>
        ";
    }
}