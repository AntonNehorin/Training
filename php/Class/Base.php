<?php
Class Base {
    protected $name = 'Base';

    public function printName (){
        pre('Cейчас работает класс ' . $this->name);
    }
 
}
