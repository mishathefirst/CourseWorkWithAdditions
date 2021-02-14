<!DOCTYPE html>
<html lang="en">
<head>
    <title>Добавить модель автомобиля в список</title>
</head>
<body>
<style>
    .edit-button {
        overflow: hidden;
        background-color: #333;
        font-family: Arial;
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 8px 12px;
        text-decoration: none;
        margin-left: 20px;
        margin-top: 10px;
    }
    .add-form {
        margin-left: 20px;
        margin-top 30px;
    }
</style>
<a class="edit-button" href="list_of_vehicles.php">Назад</a>
<br>
<br>
<div class="add-form">
<h2> Добавление автомобиля: </h2>
<form name="add" method="get" action="add_to_list_of_vehicles.php">
    <p><br>
        <label for="car_id">Введите ИД добавляемого автомобиля: </label>
            <input name="car_id" id="car_id" type="number" size="40">
    </p>
    <p><br>
        <label for="brand">Введите бренд добавляемого автомобиля: </label>
        <input name="brand" id="brand" type="text" size="60">
    </p>
    <p><br>
        <label for="model">Введите модель добавляемого автомобиля: </label>
        <input name="model" id="model" type="text" size="60">
    </p>
    <p><br>
        <label for="production_started">Введите год начала производства добавляемого автомобиля: </label>
        <input name="production_started" id="production_started" type="number" size="40">
    </p>
    <p><br>
        <label for="production_finished">Введите год окончания производства добавляемого автомобиля: </label>
        <input name="production_finished" id="production_finished" type="number" size="40">
    </p>
    <p><br>
        <label for="number_of_cars_produced">Введите тираж добавляемого автомобиля: </label>
        <input name="number_of_cars_produced" id="number_of_cars_produced" type="number" size="40">
    </p>
    <p><br>
        <label for="country_of_production">Введите страну производства добавляемого автомобиля: </label>
        <input name="country_of_production" id="country_of_production" type="text" size="40">
    </p>
    <p><br>
        <label for="foreign_demand_index">Введите индекс востребованности добавляемого автомобиля на иностранных рынках (от 1 до 5): </label>
        <input name="foreign_demand_index" id="foreign_demand_index" type="number" size="40">
    </p>
    <p><br>
        <label for="engine_power">Введите мощность двигателя добавляемого автомобиля: </label>
        <input name="engine_power" id="engine_power" type="number" size="40">
    </p>
    <p><br>
        <label for="transmission_type">Введите тип трансмиссии добавляемого автомобиля (в формате A3): </label>
        <input name="transmission_type" id="transmission_type" type="text" size="40">
    </p>
    <p><input type="submit" value="Добавить"></p>
</form>




<?php
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=...")
or die('Не удалось соединиться: ' . pg_last_error());


if (!empty($_GET['car_id'])) {
    $query = 'INSERT INTO ABSTR_CARS VALUES(';
    $query = $query.$_GET['car_id'].',';
    $query = $query.'\''.$_GET['brand'].'\',';
    $query = $query.'\''.$_GET['model'].'\',';
    $query = $query.$_GET['production_started'].',';
    $query = $query.$_GET['production_finished'].',';
    $query = $query.$_GET['number_of_cars_produced'].',';
    $query = $query.'\''.$_GET['country_of_production'].'\',';
    $query = $query.$_GET['foreign_demand_index'].',';
    $query = $query.$_GET['engine_power'].',';
    $query = $query.'\''.$_GET['transmission_type'].'\')';
    //$query = $query.')';
    $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

    pg_free_result($result);
}


pg_close($dbconn);


?>

</div>
</body>
</html>