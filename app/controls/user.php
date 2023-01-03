<?php
include SITE_ROOT . "/app/database/db.php";


function auth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    // Права доступа админа
    if($_SESSION['admin']){
        header('location: ' . BASE_URL . "admin/posts/adindex.php");
    }else{
        header('location: ' . BASE_URL . "user/posts/adindex.php");
    }
}

$users = selectAll('users');
$check = false; // Статус отправлено / не отправлено
$err = [];
// Использую глобальный массив _SERVER ['REQUEST_WETHOD'], чтобы определить методб
// который использовался для запроса страницы. Запрос на регистрацию
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-reg'])){
    $admin = 0;
    $login = trim($_POST['login']); // trim() - удаление лишних пробелов
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $repass = trim($_POST['repass']);

    if($login === '' || $email === '' || $pass === '' || $repass === ''){
        $err = "Булочка, не все поля заполнены! 0_0";
    // Получение длины строки в кодировке UTF8
    }elseif (mb_strlen($login, 'UTF8') < 3){
        array_push($err, "Приожок, логин должен быть более 2-х символов!!!");
    }elseif ($pass !== $repass) {
        array_push($err, "Кексик, пароли в обеих полях должны соответствовать! :(");
    }elseif (!preg_match("#[0-9]+#", $pass) || !preg_match("#[a-zA-Z]+#", $pass)) {
        array_push($err, "Ай-ай, пароль должен состоять из 0-9, букв A-Z и a-z!");
    }else{
        $row = selectOne('users', ['email' => $email]);
        if(!empty($row['email']) && $row['email'] === $email){
            array_push($err, "О нет пользователь с такой почтой уже зарегистрирован! ><");
        }else{
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);

            $user = selectOne('users', ['id' => $id]);
            auth($user);
        }
    }
// Придя методом GET - пустые поля
}else{
    $login = '';
    $email = '';
}

// Если проискодит авторизация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-log'])){
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);

    if ($email === '' || $pass === ''){
        array_push($err, "Не все поля заполнены! :(");
    } else {
        $user = selectOne('users', ['email' => $email]);
        // Проверка наличия пользователя и корректного пароля (сравнение с хэшированным из бд)
        if($user && password_verify($pass, $user['password'])){
           auth($user);
       } else {
           array_push($err, "Не корректные данные, пирожок!");
       }
    }
}


// Создание пользователя через админку

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cruser'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $repass = trim($_POST['repass']);

    if($login === '' || $email === '' || $pass === '' || $repass === ''){
        array_push($err, "Булочка, не все поля заполнены! 0_0");
    }elseif (mb_strlen($login, 'UTF8') < 3){
        array_push($err, "Приожок, логин должен быть более 2-х символов!!!");
    }elseif ($pass !== $repass) {
        array_push($err, "Кексик, пароли в обеих полях должны соответствовать! :(");
    }elseif (!preg_match("#[0-9]+#", $pass) || !preg_match("#[a-zA-Z]+#", $pass)) {
        array_push($err, "Ай-ай, пароль должен состоять из 0-9, букв A-Z и a-z!");
    }else{
        $row = selectOne('users', ['email' => $email]);
        if(!empty($row['email']) && $row['email'] === $email){
            array_push($err, "О нет пользователь с такой почтой уже зарегистрирован! ><");
        }else{
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            if (isset($_POST['admin'])){
                $admin = 1;
            }
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);

            $user = selectOne('users', ['id' => $id]);
            auth($user);
        }
    }
}else{
    $login = '';
    $email = '';
}

// Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delid'])){
    $id = $_GET['delid'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/userindex.php');
}

// Получение данных пользователя через админку
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edid'])){
    $id = $_GET['edid'];
    $user = selectOne('users', ['id' => $id]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
}

// Измененные данных пользователя
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upduser'])){
    $id = $_POST['id'];
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);
    $repass = trim($_POST['repass']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if($login === ''){
        array_push($err, "Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($err, "Логин должен быть более 2-х символов");
    }elseif ($pass !== $repass) {
        array_push($err, "Пароли в обеих полях должны соответствовать!");
    }else{
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'username' => $login,
            'password' => $pass
        ];
        $user = update('users', $id, $user);
        header('location: ' . BASE_URL . 'admin/users/userindex.php');
    }
} else {
    $login = '';
}


?>
