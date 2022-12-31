<?php
include_once SITE_ROOT . "/app/database/db.php";

$commentsForAdm = selectAll('comments');

$email = '';
$comment = '';
$err = [];
$status = 0; // Не опубликован
$comments = [];

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){
    $page = $_GET['post'];
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);

    if($email === '' || $comment === ''){
        array_push($err,"Булочка, не все поля заполнены! 0_0");
    }elseif (mb_strlen($comment, 'UTF8') < 50){
        array_push($err,"Приожок, комментарий должен быть более 50-и символов!!!");
    }else{
        // Определить, есть ли пользователь с такой почтой
        // Запретить комментирование не для пользователей
        $user = selectAll('users', ['email' => $email]);
        if (empty($user)){
            $status = 0;
        } else {
            $status = 1;
        }

        $comment = [
            'email' => $email,
            'comment' => $comment,
            'status' => $status,
            'page' => $page
        ];
        //tt($comment);
        $comment = insert('comments', $comment);
        $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
    }
}else{
    $email = '';
    $comment = '';
    

}

// Удаление комментария
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('comments', $id);
    header('location: ' . BASE_URL . 'admin/comments/comindex.php');
}

// Статус опубликовать или снять с публикации
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('comments', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'admin/comments/comindex.php');
    exit();
}


// АПДЕЙТ СТАТЬИ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $oneComment = selectOne('comments', ['id' => $_GET['id']]);
    $id =  $oneComment['id'];
    $email =  $oneComment['email'];
    $text1 = $oneComment['comment'];
    $pub = $oneComment['status'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_comment'])){
    $id =  $_POST['id'];
    $text = trim($_POST['content']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if($text === ''){
        array_push($err, "Комментарий не имеет содержимого текста");
    }elseif (mb_strlen($text, 'UTF8') < 50){
        array_push($err, "Количество символов внутри комментария меньше 50");
    }else{
        $com = [
            'comment' => $text,
            'status' => $publish
        ];

        $comment = update('comments', $id, $com);
        header('location: ' . BASE_URL . 'admin/comments/comindex.php');
    }
}

 ?>
