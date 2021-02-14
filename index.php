<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-style.css">
    <link rel="stylesheet" href="styles/slide-style.css">
    <link rel="stylesheet" href="styles/footer-style.css">
    <title>Главная</title>
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
<main>
    <h1>Информационная система салона ретро-автомобилей</h1>
    <script src="scripts/slide-script.js"></script>
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="index-car1.svg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="index-car2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="index-car3.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="index-car4.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
    </div>

    <script>
        showSlides(1);
    </script>
    <br>

</main>
<footer class="general-footer">
    <div class="footer-content">
        ИСиБД Ноговицын М.П., P33112
    </div>
</footer>
</body>
</html>