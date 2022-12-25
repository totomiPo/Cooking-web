<?php

include ("app/database/db.php");

$check = false; // Статус отправлено / не отправлено
$err = '';
// Использую глобальный массив _SERVER ['REQUEST_WETHOD'], чтобы определить методб
// который использовался для запроса страницы
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn'])){
    $admin = 0;
    $login = trim($_POST['login']); // trim() - удаление лишних пробелов
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $repass = trim($_POST['repass']);

    if($login === '' || $email === '' || $pass === '' || $repass === ''){
        $err = "Булочка, не все поля заполнены! 0_0";
    // Получение длины строки в кодировке UTF8
    }elseif (mb_strlen($login, 'UTF8') < 3){
        $err = "Приожок, логин должен быть более 2-х символов!!!";
    }elseif ($pass !== $repass) {
        $err = "Кексик, пароли в обеих полях должны соответствовать! :(";
    }elseif (!preg_match("#[0-9]+#", $pass) || !preg_match("#[a-zA-Z]+#", $pass)) {
        $err = "Ай-ай, пароль должен состоять из 0-9, букв A-Z и a-z!";
    }else{
        $row = selectOne('users', ['email' => $email]);
        if(!empty($row['email']) && $row['email'] === $email){
            $err = "О боже пользователь с такой почтой уже зарегистрирован! ><";
        }else{
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
        }
    }
// Придя методом GET - пустые поля
}else{
    $login = '';
    $email = '';
}

 ?>
