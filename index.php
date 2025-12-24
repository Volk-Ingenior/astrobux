<?php include 'includes/header.php'; ?>

<?php 
$moonInfo= getMoonPhase(); 
$geomagnet = geomag() ; 
 ?>

<!--   INFOGRAF TODAY  START -->

<div class="todayinfogram">
    <div class="todayIs geomag">

        <div class="today ">
            <div class="today-lbl">
                <p>Индекс гео-магнитных возмущений</p>
            </div>
            <div class="tdate">
                <?php echo $geomagnet[0];  ?>
            </div>
        </div>
        <br>

        <div class="about-date">ГМ буря: <?php echo $geomagnet[1];  ?></div>

    </div>
    <div class="todayIs onwidth starcrow">
        <p><b>День звездных скоплнений</b></p>
        <p>Энергетический потенциал</p>
    </div>

    <div class="todayIs central onwidth moon stars">
        <p><b>Лунная фаза</b></p>
        <div class="moon_phase "><img src="imgs/moon_phases/<?php echo $moonInfo[0];  ?>.png" alt="" srcset="">
        </div>
        <br>
        <div class="phase"><b><?php echo $moonInfo[1];  ?></b></div>
        <div class="phase description"><?php echo $moonInfo[2];  ?></div>
    </div>

    <div class="todayIs central  onwidth vrtcl divego">
        <div>
            <div class="dv_scores ">8 из 10</div>
            <div class="dv_scores_descr">баллов по шкале Дивего</div>
        </div>
    </div>

    <div class="todayIs onwidth biorythm">
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
    <div class="graf_state">Память</div>
    <div class="graf_state">События</div>
</div>


<!--   SPECIAL ANNOT  END -->


<!--   CARDS ADDINGS

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

    -->



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