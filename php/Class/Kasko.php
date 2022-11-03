<?php
Class Kasko extends Base {
    private $kasko; // public для возможности изменения вне класса пр $car1->$carmodel privat и protected Для работы внутри класса
    private $dateStart;
    private $dateEnd;
    private $dataCheck;
    protected Car $Car; // обьект (Класс)
    protected Driver $Driver;

    function __construct(array $value, Driver $Driver, Car $Car){  
  
        $this->kasko = $value["KASKO"];
        $this->dateStart = $value["dateStart"];
        $this->dateEnd = $value["dateEnd"];
        $this->dataCheck = $value["dataCheck"];
        $this->Driver = $Driver;
        $this->Car = $Car;
        $this->Name = 'Kasko';
    }

    public function getCar(){
        return $this->Car;
    }

    public function getDriver(){
        return $this->Driver;
    }
}