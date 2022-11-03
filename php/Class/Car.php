<?php
class Car extends Base {
    
    private $carMark;
    private $carModel;
    private $carYear;
    private string $kpp;
    private string $engType;
    private int $hp;
    private bool $signal;
    private bool $credit;
    private int $carPrice;
    protected int $index=3000;
   
    function __construct($value){   
        
        $this->carModel = $value["model"];
        $this->carMark = $value["car"];
        $this->carYear = $value["carDate"]; 
        $this->carYear = substr($this->carYear, 0, -6);
        $this->kpp = $value["kpp"];
        $this->engType = $value["eng"];
        $this->hp = $value["hp"];
        $this->signal = $value["signal"];
        $this->credit = $value["credit"];
        $this->carPrice = $value["carPrice"];
        $this->name = 'car'; 
    }
  
    public function yearIndex (){
        $a= Date ('Y');
        if (($a - $this->carYear) < 5){
            $yearIndex = 1;
            }
            elseif (($a - $this->carYear) < 10){
                $yearIndex = 1.3;
            }
            else{
                $yearIndex = 1.5;
            }
            
        return $yearIndex;
    }

    public function kppIndex (){
        if ( $this->kpp == 'meh'){
            $kppIndex = 2;
            }
            else {
            $kppIndex = 1.5;
            } 
        return $kppIndex;
    }

    public function engIndex (){
        if ($this->engType == 'gas' ){
            $engIndex = 1.7;
            }
            else {
            $engIndex = 1.3;
            } 
          return $engIndex;
    }

    public function hpIndex (){
        if ($this->hp <= 50){
            $hpIndex = 1;
            }
            elseif ($this->hp <= 100){
                $hpIndex = 1.3;
            }
            else{
                $hpIndex = 1.5;
            }
        return $hpIndex;
    }

    public function signalIndex (){
        if ($this->signal == true){
                $signalIndex = 1;
            }
            else{
                $signalIndex = 1.5;
            }
        return $signalIndex;
    }

    public function creditIndex (){
        if ($this->credit == true){
                $creditIndex = 2;
            }
            else{
                $creditIndex = 1.5;
            }
        return $creditIndex;
    }
        
    public function resultCar (){
        return $this->index * $this->yearIndex() * $this->kppIndex() * $this->engIndex() * $this->hpIndex() * $this->signalIndex() * $this->creditIndex();
    }
   
}