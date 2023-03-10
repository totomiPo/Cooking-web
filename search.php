<?php
include("path.php");
include SITE_ROOT . "/app/database/db.php";
$text = $_POST['search-term'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
    $posts = searchTitleContent($_POST['search-term'], 'posts', 'users');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel = "stylesheet" href="sets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c53200d694.js" crossorigin="anonymous"></script>

    <title>Kitchen</title>
  </head>
  <body>

      <?php
      // При возникновении ошибки,продлжит выполнение скрипта
      include("app/include/header.php");
      ?>

      <div class="container">
          <div class="content row">
              <div class="main-content col-12">
                  <h2>Результаты поиска</h2>
                  <?php if (empty($posts)): ?>
                      <div class="undef">
                          <?php echo "К сожалению, ничего не удалось найти по запросу " . $text;?>
                      </div>
                  <?php else: ?>
                      <?php foreach ($posts as $post): ?>
                          <div class="post row">
                              <div class="img col-12 col-md-4">
                                  <img src="<?= BASE_URL . "sets/img/post/" . $post['img']?>" alt="<?= $post['title']?>" class="img-thumbnail" />
                              </div>
                              <div class="post_text col-12 col-md-8">
                                  <h3><a href="<?= BASE_URL. "single.php?post=" . $post['id'];?>">
                                      <?php if (strlen($post['title']) < 80){
                                          echo $post['title'];
                                      } else {
                                          $str = mb_substr($post['title'], 0, 80,'UTF-8');
                                          echo $str . "...";
                                      }?></a></h3>
                                      <i class="far fa-user"> <?= $post['username']?> </i>
                                      <i class="far fa-calendar"> <?= $post['crdate']?> </i>
                                      <p class="preview-text"><?= mb_substr($post['content'], 0, 60, 'UTF-8') . '...'?></p>
                                      <div class="topic">
                                          <p>Категория: <?php
                                          $topic = selectOne('topics', ['id' => $post['idtopic']]);
                                          echo $topic['name'];?></p>
                                      </div>
                                  </div>
                              </div>
                     <?php endforeach; ?>
                 <?php endif; ?>
              </div>
          </div>
      </div>

      <!-- Footer -->
      <?php include("app/include/footer.php"); ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
