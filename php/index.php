<?php require_once "G:/OpenServer/domains/localhost/KASKO/template/header.php";
// 1 набор данных форма в разметке
// метод отправки post bkb get
// новая стразовка или продление
// новая данные марка автомобиля, модель, год, КПП, тип двигателя, обьем ЛС, есть ли сигналка, в кредит ли машина
// новая водитель возраст, стаж, пол, семейное состояние, дети?, пробег, дата постановки машины на учет гибддд, стоимость автомобиля, место прописки, город, период страхования, инфо по персональным данным
?>
<?php

$carModel = ["Lada"=>"Лада", "Kia"=>"Киа", "BMW"=>"БМВ", "Mersedes"=>"Мерседес", "Shkoda"=>"Шкода"];
$carType = ["Model1"=>"Модель1", "Model2"=>"Модель2"];
$kppType = ["Meh"=>"Механика", "Auto"=>"Автомат"];
$engType = ["Gas"=>"Газ", "Petrol"=>"Бензин"];
$gender = ["M"=>"Мужской", "F"=>"Женский"];
$family = ["Yes"=>"В браке", "No"=>"холост/не замужем (в разводе)"];
$children = ["Yes"=>"Есть", "No"=> "Нет"];


?>
<style>
.Form{
    border: 5px solid green;
    padding: 20px;
}    
.Background{
    background-color: pink;
}
.Line{
    margin-bottom: 40px;
}
.Line-short{
    margin-bottom: 5px;
}
.Colon{
    display: grid;
    grid-template-columns: 200px 300px;
}
</style>
<form class="Form Background" action="index2.php" method="POST"> <!-- куда мы будем отправлять результаты с формы -->
    <fieldset class="Line"> 
        <legend> Тип КАСКО </legend>
        <input id="KASKOTypeNew" type="radio" checked name="KASKO" value="new"> <!--  -->
        <label for="KASKOTypeNew">Новая КАСКО</label> <!--  -->
        <label>
            <input type="radio" name="KASKO" value="old">
            Продлить КАСКО
        </label>   
    </fieldset>

    <fieldset class="Line">
        <legend>Данные автомобиля</legend>
        <div class="Line-short Colon"> 
            <label for="carSelect" >Марка автомобиля:</label> 
            <select id="carSelect" name="car" > 
                <option disabled selected value="None">Выберите модель</option> 
                <?php foreach ( $carModel as $key => $val ):?>
                    <option  value="<?=$val?>"><?=$val?></option>  
                <?endforeach;?>
            </select>

        </div>

        <div class="Line-short Colon"> 
            <label for="carModelSelect" >Модель:</label> 
            <select id="carModelSelect" name="model">
            <option disabled selected value="None">Выберите модель</option> 
               <? foreach ( $carType as $key => $val ):?>
                    <option value="<?=$key?>"><?=$val?></option>
                <?endforeach;?>
            </select>
        </div>

        <div class="Line-short">
            <label class="Colon">
                Дата выпуска: 
                <input type="date" name="carDate"> 
            </label>  
        </div>

        <div class="Line-short Colon">
            <label for="kppSelect">КПП:</label>
            <select name="kpp" id="kppSelect">
            <option disabled selected value="None">Выберите тип КПП</option>
            <? foreach ( $kppType as $key => $val ):?>
                <option value="<?=$val?>"><?=$val?></option>
                <?endforeach;?>
            </select>
        </div>

        <div class="Line-short Colon">
            <label for="engSelect">Тип двигателя:</label>
            <select name="eng" id="engSelect">
            <option disabled selected value="None">Выберите тип дигателя</option>
            <? foreach ($engType as $key => $val ):?>   
            <option value="<?=$val?>"><?=$val?></option>
            <?endforeach;?>
            </select>
        </div>

        <div class="Line-short">
            <label class="Colon">
            Обьем ЛС 
            <input type="text" placeholder="Л.С." name="hp">
            </label>
        </div>  
    </fieldset>

    <fieldset class="Line">
        <legend>Дополнительные опции:</legend>
        <div class="Line-short">
           <span>Наличие сигнализации:</span> 

            <label for="signalRadioYes">Есть</label>
            <input id="signalRadioYes" type="radio" checked name="signal" value="yes">

            <label for="signalRadioNo">Нет</label>
            <input id="signalRadioNo" type="radio" name="signal" value="no">
        </div>

        <div>
            <span>Машина в кредит?</span>
            
            <label for="creditYes">Да</label>
            <input id="creditYes" type="radio" checked name="credit" value="yes">

            <label for="creditNo">Нет</label>
            <input id="creditNo" type="radio" name="credit" value="no">
        </div>
    </fieldset>

    <fieldset class="Line">
        <div class="Line-short Colon">
           <legend>Данные водителя:</legend>   
        </div> 

        <div class="Line-short">
            <label class="Colon"> 
                Возраст: 
                <input type="text" name="age">
            </label>
        </div>

        <div class="Line-short">
            <label class="Colon">  
                Стаж: 
                <input type="text" name="experience">
            </label>
        </div>
        
        <div class="Line-short Colon">
            <label for="genderSelect">Пол:</label>
                <select name="gender" id="genderSelect"> 
                <option disabled selected value="None">Укажите пол</option>
                   <?php foreach ($gender as $val):?>
                   <option value="<?=$val?>"><?=$val?></option>
                   <?endforeach;?>
            </select> 
        </div>

        <div class="Line-short Colon">
            <label for="family">Семейное положение:</label>
                <select name="family" id="family"> 
                <option disabled selected value="None">Укажите семейное положение</option>
                    <?php foreach ($family as $val): ?>
                    <option value="<?=$val?>"><?=$val?></option>
                    <? endforeach; ?>
                </select> 
        </div>

        <div class="Line-short Colon">
            <label for="children">Дети:</label>
                <select name="children" id="children"> 
                <option disabled selected value="None">Есть ли у вас дети?</option>
                    <?php foreach ($children as $val): ?>
                    <option value="<?=$val?>"><?=$val?></option>
                    <? endforeach; ?>
            </select> 
        </div>

        <div class="Line-short">
            <label class="Colon"> 
                Пробег: 
                <input type="text" name="mileAge">
            </label>
        </div>

        <div class="Line-short">
            <label class="Colon">  
                Дата постановки на учет: 
                <input type="date" name="dataReg">
            </label>
        </div>

        <div class="Line-short">
            <label class="Colon">  
                Цена авто: 
                <input type="text" name="carPrice">
            </label>
        </div>

        <div class="Line-short">
            <label class="Colon">  
                Место прописки: 
                <input type="text" name="registration">
            </label>
        </div>

        <div class="Line-short">
            <label class="Colon">  
                Город: 
                <input type="text" name="town">
            </label>
        </div>
        
        <div class="Line-short">
           <legend>Период страхования:</legend>
            <label > Дата начала: 
                <input type="date" name="dateStart">
            </label>
            <label > Дата окончания: 
                <input type="date" name="dateEnd">
            </label>
        </div>

        <div>
            <label >Согласие на проверку персональных данных:</label>
            <input  type="radio" name="dataCheck" >
        </div>
    </fieldset>

    <button type="Submit">Отправить</button>

</form>

































<?php require_once "G:/OpenServer/domains/localhost/KASKO/template/footer.php"; ?>