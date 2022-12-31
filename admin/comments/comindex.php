<?php
include ("../../path.php");
include ("../../app/controls/comments.php");

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../sets/css/adstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Kitchen</title>
</head>
<body>

<?php include("../../app/include/adheader.php"); ?>

<div class="container">
    <div class="row">
        <?php include ("../../app/include/adsidebar.php"); ?>
        <div class="posts col-9">
            <div class="button row">
                <a href="creat.php" class="col-3 btn btn-success">Add</a>
                <span class="col-1"></span>
                <a href="userindex.php" class="col-3 btn btn-warning">Manage</a>
            </div>
            <div class="row title">
                <h2>Управление комментариями</h2>
                <div class="id col-1">ID</div>
                <div class="title col-3">Title</div>
                <div class="author col-2">Author</div>
                <div class="red col-2">Change</div>
                <div class="del col-2">Delete</div>
                <div class="status col-2">Разработка</div>
            </div>
            <?php foreach ($commentsAd as $key => $comm): ?>
                <div class="row post">
                    <div class="id col-1"><?=$comm['id'];?></div>
                    <div class="title col-3"><?=mb_substr($comm['comment'], 0, 20, 'UTF-8') . "...";?></div>
                    <div class="author col-2"><?=mb_substr($comm['email'], 0, 10, 'UTF-8') . "...";?></div>
                    <div class="red col-2"><a href="edit.php?id=<?=$comm['id']?>">Edit</a></div>
                    <div class="del col-2"><a href="edit.php?delid=<?=$comm['id']?>">Delete</a></div>
                    <?php if ($comm['status']): ?>
                        <div class="status col-2"><a href="edit.php?publish=0&pubid=<?=$comm['id']?>">Draft</a></div>
                    <?php else: ?>
                        <div class="status col-2"><a href="edit.php?publish=1&pubid=<?=$comm['id']?>">Publish</a></div>
                    <?php endif; ?>
                </div>
           <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>
