<?php

$dr = 'mysql';
$host = 'curs';
$db_name = 'curs';
$dbus = 'root';
$dbps = '';
$charset = 'utf8';
// Режим сообщения об ошибках => Выбрасывает ошибку
$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]; // удаление дублирования в асоцциативном массиве

try{
    // Создание экземпляра класса
    $pdo = new PDO(
        "$dr:host=$host;dbname=$db_name; charset=$charset",
        $dbus, $dbps, $opt
    );

// Ошибка вызванная в PDO, реакция на выброшенное исключение
}catch (PDOEception $i){
    die("Ошибка подключения к базе данных");
}

 ?>
