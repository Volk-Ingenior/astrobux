<?php include 'includes/header.php'; ?>


<div class="blockinfogram">

    <div class="attentions todayIs onwidth"><b>Антропрофитея </b>- предсказание на основе антропометрии.
        Основоположником данной
        науки
        был военный врач Роберт Лемниц.</div>

    <div class="attentions">Для измерений следует использовать руку которой пишете</div>
    <div class="attentions">Все измерения в сантиметрах!</div>
    <div class="attentions">Нужен гибкий сантиметр!</div>
    <div class="attentions">Для измерений рассказывать что надо округлять значяения и по каким правилам</div>
    <div class="attentions">Надо написать инструкцию как делать замеры с картинками</div>
    <div class="attentions">Нужно указывать дату на которую делать расклад, предлагать только три ближайшие даты</div>
    <div class="attentions">Следует уточнить возраст! Должен быть старше 18</div>
    <div class="attentions">Следует описать правила и обяъяснения что делать и почему ( что можно что нельзя)</div>
    <div class="attentions">Здесь надо число на которое будет прогноз</div>
    <div class="attentions">Карта удачи - нарисовать ?</div>
    <br>


    <form action="" method="post">

        <div class="">
            <input type="number" name="yearbirth" id="digits" minlength="4" maxlength="4" min="1910" value="1984"
                step="1" required>
            <label for="yearbirth">Введите год рождения</label>
            <br>
            <input type="number" name="mainHeight" id="digits" value="170" min="30" step="1" required>
            <label for="mainHeight">Введите рост (в сантиметрах)</label>
        </div>
        <br>

        <div class="datainput">
            <div class="datainputCard">
                <div class="help_img"><img src="imgs/pic.jpg" alt="" srcset=""></div>
                <label for="">Введите длину Ладонь + Средний Палец ( в сантиметрах)</label>
                <br>
                <input type="number" name="dl_antropos" id="digits" value="19" min="7" step="1" required>
            </div>

            <div class="datainputCard">
                <div class="help_img"><img src="imgs/pic.jpg" alt="" srcset=""></div>
                <label for="sh_antropos">Введите ширину Ладонь + Большой Палец ( в сантиметрах)</label>
                <br>
                <input type="number" name="sh_antropos" id="digits" value="15" min="7" step="1" required>
            </div>

            <div class="datainputCard">
                <div class="help_img"><img src="imgs/pic.jpg" alt="" srcset=""></div>
                <label for="heri_manus_antropos">Введите длина руки (которой пишете) от локтя до среднего
                    пальца</label><br>
                <input type="number" name="heri_manus_antropos" id="digits" value="39" min="20" step="1" required>
            </div>

            <div class="datainputCard">
                <div class="help_img"><img src="imgs/pic.jpg" alt="" srcset=""></div>
                <input type="number" name="prosopo_antropos" id="digits" value="15" min="7" step="1" required>
                <label for="prosopo_antropos">Введите размер половины лица( в сантиметрах)</label>
            </div>
        </div>

        <input class="submit_btn" type="submit" value="Рассчитать">


    </form>




    <div>РЕЗУЛЬТАТ </div>

    <?php
        #Год рождения
        
        #Рост
            $rost = $_POST["mainHeight"];
        #Длина ладони + средний палец
            $armGreat= $_POST["dl_antropos"];
        #Ширина ладони + большой палец
            $armMedian = $_POST["sh_antropos"];
        #Длина руки + средний палец    
            $handFing = $_POST["heri_manus_antropos"];
         #Длина половины лица  
            $faceHalf= $_POST["prosopo_antropos"];           

           # echo "Целевой коэффициент:  ";
            $target = round( (($armGreat/$rost ) + ($armMedian/$rost) + ($handFing /$rost)+($faceHalf/$rost ))* 10000);
            #echo $target;
            echo "<br>";

            // Сначала проверяем есть ли у нас "звезды"
           # echo "индекс для запроса ";

            $idForRequest = checkLastTwoDigitsMath($target);
            echo $idForRequest; 
     
            $host = 'localhost'; // Имя хоста (для локальной БД)
            $dbname = 'prophet'; // Имя вашей базы данных
            $username = 'root'; // Имя пользователя БД
            $password = ''; // Пароль пользователя БД (может быть пустым)

            try {
                // Строка DSN (Data Source Name)
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                
                // Опции PDO (например, режим обработки ошибок и режим выборки по умолчанию)
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Бросать исключения при ошибках
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Получать результаты в виде ассоциативных массивов
                    PDO::ATTR_EMULATE_PREPARES   => false,                  // Отключение эмуляции подготовленных запросов
                ];
                // Создание объекта PDO, устанавливающего соединение
                $pdo = new PDO($dsn, $username, $password, $options);
                
                echo "✅ Подключение к базе данных успешно установлено!";
            } 
            catch (PDOException $e) {
                // Обработка ошибок подключения
                die("❌ Ошибка подключения к базе данных: " . $e->getMessage()); 
                       }
            // Дальше достаем инфу из БД

            echo "<br>";

            try {
                // 1. Подготовка запроса с плейсхолдерами (?)
                $stmt = $pdo->prepare("SELECT forecast FROM biohealth WHERE id = ?");
                
                // 2. Выполнение запроса, передавая значения для плейсхолдеров
                $stmt->execute([$idForRequest ]);
                
                // 3. Получение результата
                $forecastReq= $stmt->fetch(); // Получить одну строку
                
                if ($forecastReq) {
                // 4. Выводим результат пользователю, пусть читает
                    echo "<br>";
                    echo "Год рождения, Рост Ладонь + мредний палец, Ладонь + Большой палец, Длина руки, Размер лица";
                    echo "<br><br>";
                    echo $forecastReq["forecast"];
                } else {
                    echo "No data";
                }
                // Чтобы получить все строки:
                // $all_users = $stmt->fetchAll();
                
            } catch (PDOException $e) {
                echo "Ошибка выполнения запроса: " . $e->getMessage();
            }
    
            $pdo = null;          

            ?>





</div>



</body>

</html>