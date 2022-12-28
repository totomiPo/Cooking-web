<?php
include("path.php");
include ("app/controls/topics.php");
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

      <!-- блок карусели -->
      <div class="container">
          <div class="row">
              <h2 class="slider-title">Популярные рецепты</h2>
          </div>
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="sets/img/cake.png" class="d-block w-100" alt="...">
                      <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                          <h5><a href="#">Ванильно-шоколадный кекс</a></h5>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <img src="sets/img/cinnam.png" class="d-block w-100" alt="...">
                      <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                          <h5><a href="#">Синнамон с корицей</a></h5>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <img src="sets/img/crois.png" class="d-block w-100" alt="...">
                      <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                          <h5><a href="#">Круассан классический</a></h5>
                      </div>
                  </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
      </div>

      <div class="container">
          <div class="content row">
              <div class="main-content col-md-9 col-12">
                  <h2>Последние публикации</h2>
                  <div class="post row">
                      <div class="img col-12 col-md-4">
                          <img src="sets/img/cinnam.png" alt="" class="img-thumbnail" />
                      </div>
                      <div class="post_text col-12 col-md-8">
                          <h3><a href="#">Рецепт булочки с корицей</a></h3>
                          <i class="far fa-user"> Имя автора </i>
                          <i class="far fa-calendar"> Май 12, 2022 </i>
                          <p class="preview-text">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          </p>
                      </div>
                  </div>
                  <div class="post row">
                      <div class="img col-12 col-md-4">
                          <img src="sets/img/cake.png" alt="" class="img-thumbnail" />
                      </div>
                      <div class="post_text col-12 col-md-8">
                          <h3><a href="#">Кекс без глютена</a></h3>
                          <i class="far fa-user"> Имя автора </i>
                          <i class="far fa-calendar"> Май 10, 2022 </i>
                          <p class="preview-text">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          </p>
                      </div>
                  </div>
                  <div class="post row">
                      <div class="img col-12 col-md-4">
                          <img src="sets/img/crois.png" alt="" class="img-thumbnail" />
                      </div>
                      <div class="post_text col-12 col-md-8">
                          <h3><a href="#">Классический круасан</a></h3>
                          <i class="far fa-user"> Имя автора </i>
                          <i class="far fa-calendar"> Май 10, 2022 </i>
                          <p class="preview-text">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          </p>
                      </div>
                  </div>
                  <div class="post row">
                      <div class="img col-12 col-md-4">
                          <img src="sets/img/cake.png" alt="" class="img-thumbnail" />
                      </div>
                      <div class="post_text col-12 col-md-8">
                          <h3><a href="#">Вкусный домашний пирог</a></h3>
                          <i class="far fa-user"> Имя автора </i>
                          <i class="far fa-calendar"> Май 10, 2022 </i>
                          <p class="preview-text">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="sidebar col-md-3 col-12">
                  <div class="section search">
                      <h3>Поиск</h3>
                      <form action="/" method="post">
                          <input type="text" name="search-term" class="text-input" placeholder="Поиск" />
                      </form>
                  </div>
                  <div class="section topics">
                      <h3>Категории</h3>
                      <ul>
                          <?php foreach ($topics as $key => $topic): ?>
                              <li><a href="#"><?= $topic['name']; ?></a></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
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
