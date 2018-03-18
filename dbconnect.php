<?php
$mysqli = new mysqli('localhost', 'burgers', '', 'burgers'); //устанавливаем соединение
mysqli_query("SET NAMES 'UTF-8'");
if (mysqli_connect_errno()) { //проверк на ошибку
    printf('Ошибка соединения: ', mysqli_connect_errno());
    exit();
}
?>
