<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-style.css">
    <link rel="stylesheet" href="styles/table-style.css">
    <link rel="stylesheet" href="styles/footer-style.css">
    <title>Персонал</title>
</head>
<body>
<header>
    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="list_of_vehicles.php">Модели автомобилей</a>
        <div class="dropdown">
            <button class="dropbtn">Автомобили в наличии</button>
            <div class="dropdown-content">
                <a href="for_sale_cars.php">Все</a>
                <a href="for_sale_cars.php?country=RUSSIA">СССР/Россия</a>
                <a href="for_sale_cars.php?country=UK">Великобритания</a>
                <a href="for_sale_cars.php?country=USA">США</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Обслуживание</button>
            <div class="dropdown-content">
                <a href="serviced_cars.php">Обслуживаемые автомобили</a>
                <a href="service_staff.php">Персонал</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">ЗИП</button>
            <div class="dropdown-content">
                <a href="repair_parts.php">Запасные части</a>
                <a href="supplies.php">Расходные материалы</a>
                <a href="suppliers_and_producers.php">Поставщики</a>
                <!--<a href="order.php">Сделать заказ</a>-->
            </div>
        </div>
    </div>
</header>

<style>
    .features {
        width: 1000px;
    }
</style>
<div id="table" class="table">
    <h1>Персонал, занимающийся обслуживанием автомобилей:</h1>


    <?php
    $dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=...")
    or die('Не удалось соединиться: ' . pg_last_error());


    $previous_query = 0;
    $query = 'SELECT * FROM SERVICE_STAFF';

    $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

    // Вывод результатов в HTML
    $block_counter = 1;
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<div class='table-block'>\n";
        echo "\t<div class='table-content'>\n";
        echo "<table>\n";
        echo "\t<tr>\n";

        foreach ($line as $col_value) {
            //echo "\t\t<td>$col_value</td>\n";
            //echo "\t\t$line[0]\n";
            //echo "\t\t$col_value\n";
            if ($block_counter == 1) {
                echo "\t<td class='car-id'>\n";
                echo "\t\t$col_value\n";
                echo "\t</td>\n";
                $block_counter++;
            } elseif ($block_counter == 2) {
                echo "\t<td class='car-model'>\n";
                echo "<h1>\t\t$col_value\n</h1>";
                $block_counter++;
            } elseif ($block_counter == 3) {
                echo "<h1>\t\t$col_value\n</h1>";
                echo "\t</td>\n";
                $block_counter++;
            } elseif ($block_counter == 4) {
                echo "\t<td class='features'>\n";
                echo "Номер рабочего места: \t\t$col_value\n";
                echo "<br>";
                $block_counter++;
            } elseif ($block_counter == 5) {
                echo "Тип сервисной операции: \t\t$col_value\n";
                echo "<br>";
                echo "\t</td>\n";
                $block_counter++;
            } else {
                echo "\t\t$col_value\n";
                $block_counter++;
            }
        }
        //echo "\t</tr>\n";
        echo "\t</tr>\n";
        echo "</table>\n";
        echo "\t</div>\n";
        echo "\t</div>\n";
        $block_counter = 1;
    }
    //echo "</table>\n";

    pg_free_result($result);

    pg_close($dbconn);
    $previous_query = 0;
    $block_counter = 1;
    ?>

</div>






<footer class="general-footer">
    <div class="footer-content">
        ИСиБД Ноговицын М.П., P33112
    </div>
</footer>
</body>
</html>

