<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'burgers'); //устанавливаем соединение
if (mysqli_connect_errno()) { //проверк на ошибку
    printf('Ошибка соединения: ', mysqli_connect_errno());
    exit();
}

$rqs = $_REQUEST;
global  $email, $name;
$email = $rqs['email'];
$name = $rqs['name'];
$phone = $rqs['phone'];

//достаем пользователя и его ид
$sql = "SELECT email, id FROM users WHERE email = '$email'";
$registrationCheck = $mysqli->query($sql);
$id = $registrationCheck->fetch_all();

//проверяем зарегистрирован ли пользователь
if ($registrationCheck->num_rows === 0) {
    //записываем в базу пользователя
    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $mysqli->query($sql); // выполняем запрос

    //читаем из базы имя пользователя соответствующее email
    $sql = "SELECT name FROM users WHERE email = '$email'";
    $result = $mysqli->query($sql);
    $data = $result->fetch_all();

    //достаем почту и ИД пользователя из таблицы users для дальнейшего использования.
    $sql = "SELECT email, id FROM users WHERE email = '$email'";
    $registrationCheck = $mysqli->query($sql);
    $id = $registrationCheck->fetch_all();


    $registrationEnd = 'Вы успешно зарегистрировались ' . $name;

} else {
    $sql = "SELECT name FROM users WHERE email = '$email'";
    $result = $mysqli->query($sql);
    $data = $result->fetch_all();
    $_SESSION = ['email' => $email, 'regName' => $data[0][0]];
    $signIn = 'Здравствуйте ' . $data[0][0] . '. Вы успешно авторизовались.';


}

echo $id[0][1];
//записываем данные в сессию
$_SESSION = [
    'id' => $id[0][1],
    'email' => $email,
    'regName' => $data[0][0],
    'street' => $_POST['street'],
    'home' => $_POST['home'],
    'korpus' => $_POST['part'],
    'flat' => $_POST['appt'],
    'floor' => $_POST['floor'],
    'comment' => $_POST['comment'],
    'shortchange' => $_POST['shortchange'],
    'cardPay' => $_POST['cardpay'],
    'callback' => $_POST['callback']
];
?>

    <div style="display:block; margin:0 auto; width: 500px; text-align: center;">
<?php if (isset($registrationEnd)) { ?>
    <div>
        <h1><?php echo $registrationEnd ?></h1>
        <br>
        <p>Чтобы заказать бургер перейдите по <a href="/#makeOrderTopButton"> ссылке</a></p>
    </div>
<?php } else {?>
    <div>
        <h1><?php echo $signIn ?></h1>
        <br>
        <p>Чтобы заказать еще бургер перейдите по <a href="/#makeOrderTopButton"> ссылке</a></p>
    </div>
       <?php }
       ?>
    </div>