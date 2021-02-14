<!DOCTYPE html>
<html lang="en">
<head>
    <title>Удалить автомобиль из списка</title>
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
<a class="edit-button" href="for_sale_cars.php">Назад</a>
<br>
<br>
<div class="delete-form">
    <h2> Удаление автомобиля: </h2>
    <form name="car_id" method="get" action="delete_from_for_sale_cars.php">
        <p><b>Введите ИД удаляемого автомобиля:</b><br>
            <input name="car_id" type="number" size="40">
        </p>
        <p><input type="submit" value="Удалить"></p>
    </form>
    <?php
    $dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=...")
    or die('Не удалось соединиться: ' . pg_last_error());


    if (!empty($_GET['car_id'])) {
        $query = 'DELETE FROM FOR_SALE_CARS ';
        $query = $query.'WHERE CAR_ID=' . $_GET['car_id'];
        $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

        pg_free_result($result);
    }


    pg_close($dbconn);

    ?>


</div>
</body>
</html>

