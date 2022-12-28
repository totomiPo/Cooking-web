<?php
include ("path.php");
include ("app/controls/user.php");
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
      <div class="container reg_form">
          <form class="row justify-content-md-center" method="post" action="log.php">
              <h2>Вход</h2>
              <div class="err col-12">
                <?php include ("app/help/err.php"); ?>
              </div>
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <label for="formGroupExampleInput" class="form-label">E-mail</label>
                  <input type="email" name="email"  value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="totomiPo@mail.com">
              </div>
              <!-- принудительный перенос на следующую строку -->
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <label for="exampleInputPassword1" class="form-label">Пароль</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
              </div>
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <button type="submit" name="btn-log" class="btn btn-success">Войти</button>
                  <p class="sign">Ещё нет аккаунта??<a href="reg.php">Зарегестрируйтесь!</a></p>
              </div>
          </form>
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
