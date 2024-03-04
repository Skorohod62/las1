<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : 'Не указано';
    $email = isset($_POST['email']) ? $_POST['email'] : 'Не указано';
    $password = isset($_POST['password']) ? $_POST['password'] : 'Не указано';



    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Пароль: " . htmlspecialchars($password) . "<br>";
} else {
    echo "Форма не была отправлена!";
}
?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = 59;
    $b = 7;

    $data = sprintf("частное: %s \nпроизведение: %d", $a / $b, $b * $a);
    file_put_contents('fio.txt', $data);

    exit;
} else {
    echo "Форма не была отправлена!";
}
?>



