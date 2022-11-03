<?php
class Driver extends Base {
    
    private int $age;
    private int $experience;
    private string $gender;
    private string $family;
    private string $Cchildren;
    private int $mileAge;
    private $dataReg;
    private string $registration;
    private string $town;
    protected int $index = 2000;
    
    function __construct(array $value){        
        
        $this->age = $value["age"];
        $this->experience = $value["experience"];
        $this->gender = $value["gender"];
        $this->family = $value["family"];  
        $this->children = $value["children"];
        $this->mileAge = $value["mileAge"];
        $this->dataReg = $value["dataReg"];
        $this->registration = $value["registration"];
        $this->town = $value["town"];
        $this->Name = 'Driver';

    }

    public function ageIndex(){
        if ($this->age <= 20){
            $ageIndex = 1.2;
        }
        elseif($this->age<=30){
            $ageIndex = 1.3;
        }
        elseif($this->age<=45){
            $ageIndex = 1.5;
        }
        else{
            $ageIndex = 2;
        }
        return $ageIndex;
    }

    public function experienceIndex(){
        if ($this->experience<=1){
                $experienceIndex = 2;
                }
            elseif($this->experience<=5){
                $experienceIndex = 1.5;
            }
            elseif($this->experience<=15){
                $experienceIndex = 1.3;
            }
            else{
                $experienceIndex = 1.2;
            }
        return $experienceIndex;
    }

    public function genderIndex(){
        if ($this->gender == 'male'){
            $genderInde = 1.4;
        }
        else {
            $genderInde = 1.2;
        } 
        return $genderInde;
    }
       
    public function childrenIndex(){
        if ($this->children == 'Есть' ){
            $childrenIndex = 1.1;
            } 
            else {
                $childrenIndex = 1.5;
            } 
            return $childrenIndex;
    }

    public function mileAgeIndex(){
        switch ($this->mileAge){
            case $this->mileAge <= 10000:
                $mileAgeIndex = 1.1;
                break;
            case $this->mileAge <= 30000:
                $mileAgeIndex = 1.3;
                break;
            case $this->mileAge <= 50000:
                $mileAgeIndex = 1.5;
                break;
            case $this->mileAge <= 100000:
                $mileAgeIndex = 2;
                break;
            default : 
                $mileAgeIndex = 3;
                break;
            }   
        return $mileAgeIndex;
    }

    public function resultDriver(){
        return $this->index * $this->ageIndex() * $this->experienceIndex() * $this->genderIndex() * $this->childrenIndex() * $this->mileAgeIndex();
    }
}