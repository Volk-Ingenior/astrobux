<?php include 'core.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Предсказатель</title>
</head>

<body>
    <div class="header">
        <div class="slogan">augurium</div>
        <div class="date_t">Сегодня: </div>
        <div class="small_slogan"><b> <?php   echo date("d.m.Y");  ?> </b> |
            <b> <?php   echo  (getToday());  ?> </b> |
            <b><?php  echo (getDayOfYear_simple('now')); ?>-й день года</b>
        </div>
    </div>

    <!--   MENU  START  -->
    <div class="menu">
        <a href="index.php">
            <div class="navi">Главная</div>
        </a>
        <a href="antorpom.php">
            <div class="navi">Антропрофитея</div>
        </a>
        <a href="horoscopes.php">
            <div class="navi">Гороскопы</div>
        </a>
        <a href="http://#">
            <div class="navi">Зодиак</div>
        </a>
        <a href="http://#">
            <div class="navi">Диемма</div>
        </a>

    </div>
    <!--   MENU  END  -->