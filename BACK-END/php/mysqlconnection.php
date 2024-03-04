<?php
$connection = mysqli_connect('localhost','root','12629','телефоны');
if(!$connection)
    die("нет подключения");

// Вывод полей из таблицы "Сотрудники"
$query = "SELECT * FROM телефоны.абоненты";
$result = mysqli_query($connection, $query);

if($result) {
    echo "<h2>Абоненты</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $key => $value) {
            echo "$key: $value<br>";
        }
        echo "<hr>";
    }
} else {
    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
}

$query2 = "SELECT * FROM телефоны.абоненты WHERE адрес LIKE 'ул. Советская%' and телефон LIKE '%5%'";
$result2 = mysqli_query($connection, $query2);

if($result2) {
    echo "<h2>Абоненты  с на Советской и с пятёркой в номере</h2>";
    while ($row = mysqli_fetch_assoc($result2)) {
        foreach ($row as $key => $value) {
            echo "$key: $value<br>";
        }
        echo "<hr>";
    }
} else {
    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
}




mysqli_close($connection);
?>
