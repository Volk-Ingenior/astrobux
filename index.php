<?php
function getDayOfYear_simple(string $dateString): int|false {
    $timestamp = strtotime($dateString);

    if ($timestamp === false) {
        return false;
    }
    $dayOfYear_zeroBased = date('z', $timestamp);
    
    return (int)$dayOfYear_zeroBased + 1;
}
$currentDay_simple = getDayOfYear_simple('now');
?>


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
            <b> <?php
                $timestamp = time();
                $day_number = date('N', $timestamp);
                $days_of_week = array( 1 => 'Понедельник',  2 => 'Вторник',   3 => 'Среда',   4 => 'Четверг',   5 => 'Пятница',   6 => 'Суббота',   7 => 'Воскресенье');
                $today = $days_of_week[$day_number];
                echo  $today ;
                ?>
            </b> |
            <b><?php echo $currentDay_simple; ?>-й день года</b>
        </div>
    </div>


    <!--   MENU  START  -->
    <div class="menu">

        <a href="http://#">
            <div class="navi">Главная</div>
        </a>
        <a href="antorpom.php">
            <div class="navi">Антрокул</div>
        </a>
        <a href="http://#">
            <div class="navi">Диемма</div>
        </a>

        <a href="http://#">
            <div class="navi">Item 4</div>
        </a>
        <a href="http://#">
            <div class="navi">Эрдеска</div>
        </a>


    </div>
    <!--   MENU  END  -->

    <!--   INFOGRAF TODAY  START -->

    <div class="todayinfogram">
        <div class="todayIs">

            <div class="today">
                <div class="today-lbl">
                    <p>Индекс гео-магнитных возмущений</p>
                </div>
                <div class="tdate">
                    5
                </div>
            </div>
            <br>

            <div class="about-date">ГМ буря: Умеренно</div>


        </div>
        <div class="todayIs onwidth">
            <p><b>День звездных скоплнений</b></p>
            <p>Энергетический потенциал</p>
        </div>

        <div class="todayIs central onwidth">
            <p><b>Лунная фаза</b></p>
            <div class="moon_phase "></div>
            <br>
            <div class="phase"><b>Фаза 4</b></div>
            <div class="phase description">Красивая полная луна</div>
        </div>

        <div class="todayIs central  onwidth vrtcl">
            <div>
                <div class="dv_scores ">8 из 10</div>
                <div class="dv_scores_descr">баллов по шкале Дивего</div>
            </div>
        </div>

        <div class="todayIs onwidth">
            <h4>Биоритмический вектор</h4>
            <div class="phisic">Физический: <b>45%</b></div>
            <div class="emotion">Эмоциональный: <b>25%</b></div>
            <div class="intellect">Интеллектуальный: <b>15%</b></div>
        </div>
        <div class="todayIs onwidth">
            <h3>Характеристика дня</h3>
            <p>
                Сложный день для чувствительных людей. Слабый тонус, плохие сны, тупое состояние.
                Сегодня можно простыть или повредить ногу. Может укусить собака.
                Надо сегодня пить побольше воды и опасаться мелких животных.
                Вегетерианцам сегодня лучше вернуться к мясу.

            </p>
            <p><b>Благоприятный день для рожденных в числах:</b> 5, 11, 18, 20</p>
            <p><b>Неблагоприятный день для рожденных в числах:</b> 1, 3, 7, 29</p>
        </div>
    </div>
    <br>
    <!--   INFOGRAF TODAY  END -->

    <!-- SPECIAL ANNOT START -->
    <div class="todayinfogram">
        <div class="graf_state">Сон</div>
        <div class="graf_state">Отношения</div>
        <div class="graf_state">Питание</div>
        <div class="graf_state">Опасности</div>
        <div class="graf_state">Окружение</div>
        <div class="graf_state">Тонус</div>
        <div class="graf_state">Восприятие</div>
    </div>


    <!--   SPECIAL ANNOT  END -->

    <div class="cards">

        <div class="cardbody">
            <a href="antorpom.php">
                <div class="cardinfo">SAMА KARTOCHKA</div>
            </a>
        </div>

        <div class="cardbody">
            <a href="#">
                <div class="cardinfo">SAMА KARTOCHKA</div>
            </a>
        </div>

        <div class="cardbody">
            <a href="#">
                <div class="cardinfo">SAMА KARTOCHKA</div>
            </a>
        </div>

    </div>





    <!-- START FOOTER -->
    <footer>
        <div class="footer">
            Footer

            Шкала Дивего

        </div>

    </footer>




    <!-- END FOOTER -->


















</body>

</html>