<?php 
declare(strict_types = 1); // строгая типизация
require_once "G:/OpenServer/domains/localhost/KASKO/template/header.php";

$carModel = ["Lada"=>"Лада", "Kia"=>"Киа", "BMW"=>"БМВ", "Mersedes"=>"Мерседес", "Shkoda"=>"Шкода"];
$carType = ["Model1"=>"Модель1", "Model2"=>"Модель2"];
$kppType = ["Meh"=>"Механика", "Auto"=>"Автомат"];
$engType = ["Gas"=>"Газ", "Petrol"=>"Бензин"];
$gender = ["M"=>"Мужской", "F"=>"Женский"];
$family = ["Yes"=>"В браке", "No"=>"холост/не замужем (в разводе)"];
$children = ["Yes"=>"Есть", "No"=> "Нет"];

function pre($value){
    echo "<pre>";
    print_r ($value);
    echo "</pre>";
}

function calc($value){  //создание классов и расчет стоимости
    $newCar = new Car($value);
    $newDriver = new Driver($value);
    $kasko = new Kasko($value, $newDriver, $newCar); 
    return ($kasko->getCar()->resultCar() + $kasko->getDriver()->resultDriver());  
}

function dataCheck($value){
    // pre($_POST);
        if (count($value) == 0){ // проверка поста редерект, если количество элементов в впосте =0 то перенапрявляем на страницу с формой
         header('Location: http://localhost//KASKO/php/index.php');
    }  

        if ((isset($value["dataCheck"])) == false) {   
         header('Location: http://localhost//KASKO/php/index.php');  
    } 
    $i = 0;
    $arrData = [ // массив с ключами и значениями, брать из массива
        'KASKO' => "Тип КАСКО",
        'car' => "Марка Автомобиля",
        'model' => "Модель",
        'carDate' => "Дата Выпуска",
        'kpp' => "КПП",
        'eng' => "Тип Двигателя",
        'hp' => "Обьем ЛС",
        'signal' => "Наличие сигнализации",
        'credit' => "Машина в кредит",
        'age' => "Возраст",
        'experience' => "Стаж",
        'gender' => "Пол",
        'family' => "Семейное положение",
        'children' => "Дети",
        'mileAge' => "Пробег",
        'dataReg' => "Дата постановкии на учет",
        'carPrice' => "Цена авто",
        'registration' => "Место прописки",
        'town' => "Город",
        'dateStart' => "Дата Начала",
        'dateEnd' => "Дата окончания",
        'dataCheck' => 'Согасие на проверку персоональных данных'
        ];
    foreach ($value as $key=>$val){ 
        if ($val == Null){
            echo " Не заполнено значение поля " . $arrData[$key] . "</br>";
            $i++;
            }
        }
        if ($value["KASKO"] == "old"){
            if  ($value["DateStart"] <= date("Y-m-d")){
                    echo "Неверная дата начала стразовки, выберите другую дату." . "</br>";
                    $i++;
            }
        }
        return ($i == 0);          
}       

$check = dataCheck($_POST);
if ($check == true){
    $price = Calc($_POST);
    Pre('Сумма страховки = ' . $price);
}

/**
 * @param array $_POST входящий массив даных для расчета
 * 
 */
?>
<form  action="index.php" >
<button type="submit">На главную</button>
</form>