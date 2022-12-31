<?php
//include SITE_ROOT . "/app/database/db.php";

$commentsAd = selectAll('comments');

$page = $_GET['post'];
$email = '';
$comment = '';
$err = [];
$status = 0; // Не опубликован
$comments = [];

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){
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
    $comments = selectAll('comments', ['page' => $page, 'status' => 1]);

}

 ?>
