<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-style.css">
    <link rel="stylesheet" href="styles/filter-style.css">
    <link rel="stylesheet" href="styles/table-style.css">
    <link rel="stylesheet" href="styles/edit-buttons-style.css">
    <link rel="stylesheet" href="styles/footer-style.css">
    <title>Автомобили в наличии</title>
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


<a class="edit-button" href="add_to_for_sale_cars.php">Добавить автомобиль</a>
<a class="edit-button" href="delete_from_for_sale_cars.php">Удалить автомобиль</a>
<br>
<br>
<br>
<div id="table" class="table">
    <h1>Автомобили в наличии:</h1>


    <?php
    $dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=...")
    or die('Не удалось соединиться: ' . pg_last_error());


    $previous_query = 0;
    $query = 'SELECT * FROM FOR_SALE_CARS INNER JOIN ABSTR_CARS USING (ABSTR_CAR_ID)';
    if (!(empty($_GET['country']) and empty($_GET['min_power']))) {
        $query = $query.' WHERE ';
        if (!empty($_GET['country'])){
            $query = $query.'ABSTR_CARS.COUNTRY_OF_PRODUCTION=\''.$_GET['country'].'\'';
            $previous_query = 1;
        }
        if ((!empty($_GET['min_power'])) and $previous_query == 0){
            $query = $query.'ABSTR_CARS.ENGINE_POWER >= \''.$_GET['min_power'].'\'';
            $previous_query = 1;
        } elseif (!empty($_GET['min_power'])) {
            $query = $query.' AND ABSTR_CARS.ENGINE_POWER >= \''.$_GET['min_power'].'\'';
        }
    }
    $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

    // Вывод результатов в HTML
    //echo "<table>\n";
    $block_counter = 1;
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<div class='table-block'>\n";
        echo "\t<div class='table-content'>\n";
        echo "<table>\n";
        echo "\t<tr>\n";
        foreach ($line as $col_value) {

            if ($block_counter == 2) {
                echo "\t<td class='car-id'>\n";
                echo "\t\t$col_value\n";
                echo "\t</td>\n";
                $block_counter++;
            } elseif ($block_counter == 11) {
                echo "\t<td align='left' class='car-model'>\n";
                echo "<h1>\t\t$col_value\n</h1>";
                $block_counter++;
            } elseif ($block_counter == 12) {
                echo "<h1>\t\t$col_value\n</h1>";
                echo "\t</td>\n";
                $block_counter++;
            } elseif ($block_counter == 3) {
                echo "\t<td class='features'>\n";
                echo "Год выпуска: \t\t$col_value\n";
                echo "<br>";
                $block_counter++;
            } elseif ($block_counter == 4) {
                echo "VIN номер: \t\t$col_value\n";
                echo "<br>";
                $block_counter++;
            } elseif ($block_counter == 5) {
                if ($col_value == 'Left'){
                    echo "Расположение руля: Левый";
                } else {
                    echo "Расположение руля: Правый";
                }
                echo "<br>";
                $block_counter++;
            } elseif ($block_counter == 6) {
                echo "Пробег: \t\t$col_value\n";
                echo "\t</td>\n";
                $block_counter++;
            } elseif ($block_counter == 8) {
                echo "\t<td class='features'>\n";
                echo "Цена: \t\t$col_value\n";
                echo "<br>";
                $block_counter++;
            } elseif ($block_counter == 9) {
                if ($col_value == 't'){
                    echo "Продано";
                } else {
                    echo "Не продано";
                }
                echo "<br>";
                $block_counter++;
            } elseif ($block_counter == 10) {
                echo "Продано: \t\t$col_value\n";
                echo "<br>";
                $block_counter++;
            } else {
                $block_counter++;
            }
        }
        echo "\t</tr>\n";
        echo "</table>\n";
        echo "\t</div>\n";
        echo "\t</div>\n";
        $block_counter = 1;
    }

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

