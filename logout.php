<?php
session_start();
include ("path.php");

// Удаление данных сессии
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);

header('location: ' . BASE_URL);

 ?>
