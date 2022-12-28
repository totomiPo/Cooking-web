<?php
include SITE_ROOT . "/app/database/db.php";

$err = '';
$title = '';
$content = '';
$topic = '';
$img = '';

$topics = selectAll('topics');

// Создание поста
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addpost'])){
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    if($title === '' || $content === '' || $topic === ''){
        $err = "Булочка, не все поля заполнены! 0_0";
    }elseif (mb_strlen($title, 'UTF8') < 8){
        $err = "Приожок, название статьи должено быть более 8-и символов!!!";
    }else{
        $post = [
            'iduser' => $_SESSION['id'],
            'title' => $title,
            'img' => $_POST['imagename'],
            'content' => $content,
            'status' => 1,
            'idtopic' => $topic
        ];
        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: ' . BASE_URL . 'admin/posts/adindex.php');
    }
}else{
    $title = '';
    $content = '';
}

//$id = '';
//$name = '';
//$discr = '';
//// Редактирование
//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
//    $id = $_GET['id'];
//    $topic = selectOne('topics', ['id' => $id]);
//
//    $id = $topic['id'];
//    $name = $topic['name'];
//    $discr = $topic['discr'];
//}
//
//// Измененные данные
//if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toped'])){
//    $name = trim($_POST['name']);
//    $discr = trim($_POST['discr']);
//
//    if($name === '' || $discr === ''){
//        $err = "Булочка, не все поля заполнены! 0_0";
//    }elseif (mb_strlen($name, 'UTF8') < 3){
//        $err = "Приожок, категория должена быть более 2-х символов!!!";
//    }else{
//        $topic = [
//            'name' => $name,
//            'discr' => $discr
//        ];
//        $id = $_POST['id'];
//        $topic = update('topics', $id, $topic);
//        header('location: ' . BASE_URL . 'admin/topic/topindex.php');
//    }
//}
//
//// Удаление категории
//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delid'])){
//    $id = $_GET['delid'];
//    delete('topics', $id);
//    header('location: ' . BASE_URL . 'admin/topic/topindex.php');
//}
?>
