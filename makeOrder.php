<?php
session_start();
include ('/var/www/burgers.advecto.ru/dbconnect.php');

$_POST[] = ['burgerName' => ' Dark Beef Burger 500р '];
global $id;
$id = $_SESSION['id'];

$email = $_SESSION['email'];
$burgerName = 'Dark Beef Burger 500р 1шт';
$home = $_SESSION['home'];
$street= $_SESSION['street'];
$korpus = $_SESSION['korpus'];
$flat = $_SESSION['flat'];
$floor = $_SESSION['floor'];
$comments = $_SESSION['comment'];
$shortchange = $_SESSION['shortchange'];
$cardPay = $_SESSION['cardPay'];
$callback = $_SESSION['callback'];

//записываем заказ в базу данных
if (!empty($_SESSION)) {
    $sqlOrder = "INSERT INTO orders (userID, 
    burgerName, 
    street, house, 
    korpus, flat, 
    stock, comments, 
    shortChangeNeed, 
    cardPay,operatorCall) VALUES ('$id',
    '$burgerName',
    '$street','$home',
    '$korpus', '$flat',
    '$floor','$comments',
    '$shortchange','$cardPay','$callback')";
    $mysqli->query($sqlOrder);
    $makeOrder = 'Вы заказали ' . $burgerName;
} else {
    $userIsNotRegistred = 'Вам нужно зарегистрироваться, прежде чем сделать заказ.';
}

//получаем кол-во заказов сделанных пользователем с одинаковым email
    $sql = "SELECT * FROM orders WHERE userID = '$id'";
    $sqlResult = $mysqli->query($sql);
    $showOrders = $sqlResult->fetch_all();
    $allUserOrders = count($showOrders); //все заказы пользователя


//получаем количество всех заказов, ID из базы данных AUTO_INCREMENT
function getUserUnicOrderNumber()
{
    include ('/var/www/burgers.advecto.ru/dbconnect.php');

    $sql = "SELECT id FROM orders";
    $sqlResult = $mysqli->query($sql);
    $orderID = $sqlResult->fetch_all();
    $id = count($orderID) - 1;
    return $result = $orderID[$id][0];
}

$orderNumber = getUserUnicOrderNumber();



//добавляем в таблицу users в поле allOrdersUser все заказы пользователя.
$sql = "UPDATE `users` SET `allOrdersUser` = '$allUserOrders' WHERE `users`.`id` = $id;";
$mysqli->query($sql);


//сохраняем заказ пользователя в файл.
//сделал по быстрому, можно и лучше, но времени мало, нужно изучать ООП
$orderFullData = 'Номер заказа '. $orderNumber . '; ' . ' ' . $burgerName . '; ' .' Адрес доставки: ' .$street .$home . $flat . $floor. '; Комментарии: ' . $comments . ' Оплата картой: ' . $callback;
file_put_contents('orders/userorder' . $orderNumber.'.txt', $orderFullData); //записываем в файл


?>




<?php if (isset($makeOrder)) { ?>
    <div style="display:block; margin:0 auto; text-align: center;">
    <div>
        <h1><?php echo $makeOrder ?></h1>
        <h2>Заказ №<?php echo $orderNumber; ?></h2>
        <p>Поздравляем вы сделали заказ. Мы уже начали его готовить</p>
        <?php
        if ($allUserOrders === 1){
            $message = ' это ваш первый заказ';
        } else {
            $message = ' это уже: ' . $allUserOrders;
        }
            ?>
        <p> <?php echo $_SESSION['regName'] . $message . ' заказ.'?></p>
        <p><a href="/#makeOrderTopButton">заказать еще бургеров</a></p>
    </div>
<?php } else { ?>
    <div>
        <h1><?php echo $userIsNotRegistred ?></h1>
        <p>Зарегистрироватсья можно <a href="/#registration"> здесь</a></p>
    </div>
    </div>

<?php }


$ordersSql = "SELECT * FROM orders WHERE userID='$id'";
$dataOrder = $mysqli->query($ordersSql);
$orders = $dataOrder->fetch_all();

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
        <h2>Все заказы сделанные вами</h2>
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
