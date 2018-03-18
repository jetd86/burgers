<?php
header("Content-Type: text/html; charset=utf-8");
include ('/var/www/burgers.advecto.ru/dbconnect.php');

$sql = "SELECT id, name, email, phone, allOrdersUser FROM users";
$data = $mysqli->query($sql);
$Users = $data->fetch_all();


$ordersSql = "SELECT * FROM orders";
$dataOrder = $mysqli->query($ordersSql);
$orders = $dataOrder->fetch_all();


function getUserUnicOrderNumber()
{
    include ('dbconnect.php');
    $sql = "SELECT id FROM orders";
    $sqlResult = $mysqli->query($sql);
    $orderID = $sqlResult->fetch_all();
    $id = count($orderID) - 1;
    return $result = $orderID[$id][0];
}

$orderNumber = getUserUnicOrderNumber();
?>
<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.min.css">
    <title>Document</title>
</head>
<body>
<section>
    <div class="seredina">
        <h2>Список всех пользователей</h2>
        <table class="table_blur">
            <tbody>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Телефон</th>
                <th>Все заказы пользователя</th>
            </tr>
            <?php
            echo count($Users);
            foreach ($Users as $v) {
                echo '<tr>';
                for ($i = 0; $i < count($Users)-1; $i++) {
                    echo '<td> ' . $v[$i] . '</td>';
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</section>
<br>
<section>
    <div class="seredina">
        <h2>Список всех заказов</h2>
        <p>Все сделанные заказы с учетом удаленных <?php echo $orderNumber;?></p>
        <p>Прибыль со всех бургеров: <?php echo $orderNumber * 500;?>р.</p>
        <table class="table_blur">
            <tbody>
            <tr>
                <th>id</th>
                <th>userId</th>
                <th>burgerName</th>
                <th>Улица</th>
                <th>Дом</th>
                <th>Корпус</th>
                <th>Квартира</th>
                <th>Этаж</th>
                <th>Комментарии</th>
                <th>Нужна сдача</th>
                <th>Оплата картой</th>
                <th>Звонок оператора</th>
                <th>Дата заказа</th>

            </tr>
            <?php
            foreach ($orders as $v) {
                echo '<tr>';
                for ($i = 0; $i < 13; $i++) {
                    echo '<td> ' . $v[$i] . '</td>';
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>

</section>

</body>
</html>






