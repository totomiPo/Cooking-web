<?php include("path.php");
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

      <?php include("app/include/header.php"); ?>

      <div class="container">
          <div class="content row">
              <div class="main-content col-md-9 col-12">
                  <h2>Наши булочные в Санкт-Петербурге</h2>

                  <div id="map" class="map">
                      <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU"></script>
                  </div>

              </div>
              <div class="sidebar col-md-3 col-12">
                  <div class="section search">
                      <h3>Поиск</h3>
                      <form action="search.php" method="post">
                          <input type="text" name="search-term" class="text-input" placeholder="Поиск" />
                      </form>
                  </div>
                  <div class="section topics">
                      <h3>Категории</h3>
                      <ul>
                          <?php foreach ($topics as $key => $topic): ?>
                              <?php if ($topic['name'] !== 'Top topics'): ?>
                                  <li><a href="<?= BASE_URL. "category.php?id=" . $topic['id']; ?>"><?= $topic['name']; ?></a></li>
                              <?php endif; ?>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>

      <!-- Footer -->
      <?php include("app/include/footer.php"); ?>

      <script src="sets/js/scriptmap.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
