<?php
session_start();
require 'connect.php';

// Для вывода результатов - отладка
function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

// Проверка на наличие ошибок
function dbCheck($query){
    // Ошибка - массив
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение всех строк из таблицы
function selectAll($table, $params = []){
    global $pdo;

    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            // Если это не число, добаляем скобки
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    // Предварительная подготовка
    $query = $pdo->prepare($sql);
    // Отправка запроса
    $query->execute();
    // Проверка на ошибку
    dbCheck($query);
    // Возврат всех строк
    return $query->fetchAll();
}


// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;

    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
    // Возврат одной строки
    return $query->fetch();
}

// Запись в таблицу БД
function insert($table, $params){
    global $pdo;

    $i = 0;
    $coll = ''; // Столбец бд
    $mask = ''; // Значение
    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" ."$value" . "'";
        }else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
    // Возврат ID добавленной записи
    return $pdo->lastInsertId();
}

// Обновление строки в таблице
function update($table, $id, $params){
    global $pdo;

    $i = 0;
    $str = ''; // Ключ
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else {
            $str = $str .", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
}

// Удаление строки в таблице
function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id =". $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
}

// Использую JOIN, многотабличный запрос
// Посты с именем автора в админ-панель
function selectALLFromPostUsers($table1, $table2){
    global $pdo;
    // Выбрать из таблицы1 id пользователя?, затем выбрать из таблицы2 соответствующий id
    $sql = "SELECT t1.id, t1.title, t1.img, t1.content, t1.status, t1.idtopic, t1.crdate, t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.iduser = t2.id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
    return $query->fetchAll();
}

// Получнеие имени автора статьи на главную страницу
function selectALLFromPostUsersIndex($table1, $table2){
    global $pdo;

    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.iduser = u.id WHERE p.status = 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
    return $query->fetchAll();
}

function selectTopTopicIndex($table1){
    global $pdo;

    $sql = "SELECT * FROM $table1 WHERE idtopic = 8";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
    return $query->fetchAll();
}

// Поиск по заголовкам и содержимому
function searchTitleContent($text, $table1, $table2){
    global $pdo;
    // strip_tags -
    // stripcslashes -
    // htmlspecialchars -
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));

    $sql = "SELECT p.*, u.username
    FROM $table1 AS p
    JOIN $table2 AS u ON p.iduser = u.id
    WHERE p.status = 1
    AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheck($query);
    return $query->fetchAll();
}
