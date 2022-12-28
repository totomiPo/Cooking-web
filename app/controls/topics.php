<?php
include SITE_ROOT . "/app/database/db.php";

$err = [];
$topics = selectAll('topics');
// Создание категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topcr'])){
    $name = trim($_POST['name']);
    $discr = trim($_POST['discr']);

    if($name === '' || $discr === ''){
        array_push($err, "Булочка, не все поля заполнены! 0_0");
    }elseif (mb_strlen($name, 'UTF8') < 3){
        array_push($err, "Приожок, категория должена быть более 2-х символов!!!");
    }else{
        $row = selectOne('topics', ['name' => $name]);
        if(!empty($row['name']) && $row['name'] === $name){
            array_push($err, "Такая категория существует!");
        }else{
            $topic = [
                'name' => $name,
                'discr' => $discr
            ];
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/topic/topindex.php');
        }
    }
}else{
    $name = '';
    $discr = '';
}

$id = '';
$name = '';
$discr = '';
// Редактирование
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);

    $id = $topic['id'];
    $name = $topic['name'];
    $discr = $topic['discr'];
}

// Измененные данные
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toped'])){
    $name = trim($_POST['name']);
    $discr = trim($_POST['discr']);

    if($name === '' || $discr === ''){
        array_push($err, "Булочка, не все поля заполнены! 0_0");
    }elseif (mb_strlen($name, 'UTF8') < 3){
        array_push($err, "Приожок, категория должена быть более 2-х символов!!!");
    }else{
        $topic = [
            'name' => $name,
            'discr' => $discr
        ];
        $id = $_POST['id'];
        $topic = update('topics', $id, $topic);
        header('location: ' . BASE_URL . 'admin/topic/topindex.php');
    }
}

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delid'])){
    $id = $_GET['delid'];
    delete('topics', $id);
    header('location: ' . BASE_URL . 'admin/topic/topindex.php');
}
?>
