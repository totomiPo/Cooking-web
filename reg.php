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

      <!-- Форма регистрации -->
      <div class="container reg_form">
          <form class="row justify-content-md-center" method="post" action="reg.php">
              <h2>Регистрация</h2>
              <!-- Вывод ошибки -->
              <div class="err mb-3 col-12 col-md-4">
                  <p><?=$err?></p>
              </div>
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <label for="formGroupExampleInput" class="form-label">Логин</label>
                  <input type="text" name="login" value="<?= $login ?>" class="form-control" id="formGroupExampleInput" placeholder="totomiPo">
              </div>
              <!-- принудительный перенос на следующую строку -->
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" name="email"  value="<?= $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="totomiPo@mail.com">
                  <div id="emailHelp" class="form-text">К вам не придет спам-рассылка</div>
              </div>
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <label for="exampleInputPassword1" class="form-label">Пароль</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
              </div>
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <label for="exampleInputPassword2" class="form-label">Подтвердите пароль</label>
                  <input type="password" name="repass" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
              </div>
              <div class="w-100"></div>
              <div class="mb-3 col-12 col-md-4">
                  <button type="submit" name="btn" class="btn btn-success">Зарегестрироваться</button>
                  <p class="sign">Уже есть аккаунт?<a href="log.html"> Авторизируйтесь!</a></p>
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
