<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Ключевые слова">
    <link rel="stylesheet" href="style.css">
    <title>карточка 2</title>
</head>
<body>

<?php
    $connection = mysqli_connect('localhost','root','12629','kartwo')
?>


<form action="submit.php" method="POST">
    <div>
        <input type="email" id="email" name="email" required placeholder="Введите ваш email адрес">
    </div>
    <div>
        <input type="password" id="password" name="password" required placeholder="Ваш сложный пароль">
    </div>
    <div>
        <input type="text" id="fullName" name="fullName" required placeholder="Имя пользователя">
    </div>

    <div>
        <button type="submit">Зарегистрироваться</button>
    </div>
</form>

</body>
</html>