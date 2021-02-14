<!DOCTYPE html>
<html lang="en">
<head>
    <title>Добавить обслуживаемый автомобиль</title>
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
<a class="edit-button" href="serviced_cars.php">Назад</a>
<br>
<br>
<div class="add-form">
    <h2> Добавление обслуживаемого автомобиля: </h2>
    <form name="add" method="get" action="add_serviced_car.php">
        <p><br>
            <label for="car_id">Введите ИД обслуживания добавляемого автомобиля: </label>
            <input name="car_id" id="car_id" type="number" size="40">
        </p>
        <p><br>
            <label for="vin">Введите VIN-номер добавляемого автомобиля: </label>
            <input name="vin" id="vin" type="text" size="60">
        </p>
        <p><br>
            <label for="year_of_production">Введите год выпуска добавляемого автомобиля: </label>
            <input name="year_of_production" id="year_of_production" type="text" size="60">
        </p>
        <p><br>
            <label for="mileage">Введите пробег добавляемого автомобиля: </label>
            <input name="mileage" id="mileage" type="number" size="40">
        </p>
        <p><br>
            <label for="type_of_service">Введите тип выполняемой сервисной операции: </label>
            <input name="type_of_service" id="type_of_service" type="text" size="100">
        </p>
        <p><br>
            <label for="abstr_car_id">Введите внутренний номер модели автомобиля: </label>
            <input name="abstr_car_id" id="abstr_car_id" type="number" size="30">
        </p>
        <p><br>
            <label for="service_price">Введите стоимость обслуживания: </label>
            <input name="service_price" id="service_price" type="number" size="40">
            <br>
        </p>
        <p><input type="submit" value="Добавить"></p>
    </form>




    <?php
    $dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=...")
    or die('Не удалось соединиться: ' . pg_last_error());



    if (!empty($_GET['car_id'])) {
        $query = 'INSERT INTO SERVICED_CARS VALUES(';
        $query = $query.$_GET['car_id'].',';
        $query = $query.'NOW(),';
        $query = $query.'NULL,';
        $query = $query.'\''.$_GET['vin'].'\',';
        $query = $query.$_GET['year_of_production'].',';
        $query = $query.$_GET['mileage'].',';
        $query = $query.'\''.$_GET['type_of_service'].'\',';
        $query = $query.$_GET['service_price'].',';
        $query = $query.'TRUE'.',';
        $query = $query.$_GET['abstr_car_id'].')';
        //$query = $query.')';
        $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

        pg_free_result($result);
    }


    pg_close($dbconn);


    ?>

</div>
</body>
</html>