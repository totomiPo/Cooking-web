<?php
include SITE_ROOT . "/app/database/db.php";
// Если сессия обнулилась, возврат к форме входа
if (!$_SESSION){
    header('location: ' . BASE_URL . 'log.php');
}

$err = [];
$title = '';
$content = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postAdmin = selectALLFromPostUsers('posts', 'users');

// Создание поста
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addpost'])){

    if (!empty($_FILES['img']['name'])){
        // уникальная картинка для каждой записи
        $imgname = time() . $_FILES['img']['name'];
        $imgtype = $_FILES['img']['type'];
        $tmpf = $_FILES['img']['tmp_name'];
        $destin = ROOT_PATH . "\sets\img\post\\" . $imgname;

        if (strpos($imgtype, 'image') === false){
            array_push($err, "Файл не является изображением");
        } else {
            // Перемещение загруженного файла в указанное место
            $res = move_uploaded_file($tmpf, $destin);
            if($res){
                $_POST['img'] = $imgname;
            } else {
                array_push($err,"Ошибка загрузки изображения");
            }
        }
    } else {
        array_push($err,"Ошибка получения картинки!");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    // Проверка на чекбоксе
    $publish = trim($_POST['publish']) !== null ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($err,"Булочка, не все поля заполнены! 0_0");
    }elseif (mb_strlen($title, 'UTF8') < 8){
        array_push($err,"Приожок, название статьи должено быть более 8-и символов!!!");
    }else{
        $post = [
            'iduser' => $_SESSION['id'],
            'title' => $title,
            'img' => $_POST['img'],
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

?>
