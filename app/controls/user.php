<?php

include ("app/database/db.php");

if(isset($_POST['login'])){
    $admin =  '0';
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    // Ассоциативный массив
    $post = [
        'admin' => $admin,
        'username' => $login,
        'email' => $email,
        'password' => $pass
    ];

    // Получаем ID записи
    $id = insert('users', $post);
    $last_row = selectOne('users', ['id' => $id]);

    tt($last_row);

}

 ?>
