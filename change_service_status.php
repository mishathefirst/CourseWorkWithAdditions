<!DOCTYPE html>
<html lang="en">
<head>
    <title>Изменить статус обслуживания автомобиля</title>
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
    .delete-form {
        margin-left: 20px;
        margin-top 30px;
    }
</style>
<a class="edit-button" href="serviced_cars.php">Назад</a>
<br>
<br>
<div class="delete-form">
    <h2> Изменение статуса обслуживания автомобиля: </h2>
    <form name="car_id" method="get" action="change_service_status.php">
        <p><b>Введите ИД автомобиля:</b><br>
            <input name="car_id" type="number" size="40">
        </p>
        <p>
            <select id="status" name="status">
                <option value="unset">Закончить обслуживание</option>
                <option value="set">Начать/Возобновить обслуживание</option>
            </select>
        </p>
        <p><input type="submit" value="Изменить"></p>
    </form>
    <?php

    if (!empty($_GET['car_id'])) {

        if ($_GET['status'] == 'unset') {
            $dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=...")
            or die('Не удалось соединиться: ' . pg_last_error());


            $query = 'UPDATE SERVICED_CARS SET IS_SERVICED=false WHERE SERVICED_CAR_ID='.$_GET['car_id'];
            $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
            pg_free_result($result);



            $query = 'UPDATE SERVICED_CARS SET END_OF_SERVICE=NOW()  WHERE SERVICED_CAR_ID='.$_GET['car_id'];

            $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
            pg_free_result($result);
            pg_close($dbconn);
        } else {
            //$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=12032001")
            //or die('Не удалось соединиться: ' . pg_last_error());

            $dbconn = pg_connect("host=localhost port=19755 dbname=studs user=s265085 password=ble545")
            or die('Не удалось соединиться: ' . pg_last_error());



            $query = 'UPDATE SERVICED_CARS SET IS_SERVICED=true WHERE SERVICED_CAR_ID='.$_GET['car_id'];
            $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
            pg_free_result($result);



            $query = 'UPDATE SERVICED_CARS SET START_OF_SERVICE=NOW()  WHERE SERVICED_CAR_ID='.$_GET['car_id'];

            $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
            pg_free_result($result);


            $query = 'UPDATE SERVICED_CARS SET END_OF_SERVICE=NULL WHERE SERVICED_CAR_ID='.$_GET['car_id'];

            $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
            pg_free_result($result);


            pg_close($dbconn);

        }
    }
    ?>


</div>
</body>
</html>