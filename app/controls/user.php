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
        $err = "Не все поля заполнены!";
    // Получение длины строки в кодировке UTF8
}elseif (mb_strlen($login, 'UTF8') < 3){
        $err = "Логин должен быть более 2-х символов";
    }elseif ($pass !== $pass) {
        $err = "Пароли в обеих полях должны соответствовать!";
    }else{
        $row = selectOne('users', ['email' => $email]);
        if(!empty($row['email']) && $row['email'] === $email){
            $err = "Пользователь с такой почтой уже зарегистрирован!";
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
