<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Предсказатель</title>
</head>

<body>
    <div class="header">HEADER</div>
    <div class="menu">MENU</div>

    <div class="attentions">Для измерений следует использовать руку которой пишете</div>
    <div class="attentions">Для измерений рассказывать что надо округлять значяения и по каким правилам</div>
    <div class="attentions">Надо написать инструкцию как делать замеры с картинками</div>
    <div class="attentions">Нужно указывать дату на которую делать расклад, предлагать только три ближайшие даты</div>
    <div class="attentions">Следует уточнить возраст! Должен быть старше 18</div>
    <div class="attentions">Следует описать правила и обяъяснения что делать и почему ( что можно что нельзя)</div>
    <div class="attentions">Здесь надо число на которое будет прогноз</div>
    <div class="attentions">ЗКарта удачи - нарисовать ?</div>

    <div class="datainput">
        <form action="" method="post">
            <br>
            <input type="text" name="yearbirth" id="digits" minlength="4" maxlength="4" value="1984" required>Введите
            год рождения
            <br>
            <input type="number" name="mainHeight" id="" value="170">Введите рост (в сантиметрах)
            <br>
            <input type="number" name="dl_antropos" id="" value="19">Введите длину Ладонь + Средний Палец ( в
            сантиметрах)
            <br>
            <input type="number" name="sh_antropos" id="" value="15">Введите ширину Ладонь + Большой Палец ( в
            сантиметрах)
            <br>
            <input type="number" name="heri_manus_antropos" id="" value="39">Введите длина руки (которой пишете)
            от локтя
            до среднего
            пальца
            <br>
            <input type="number" name="prosopo_antropos" id="" value="15">Введите размер половины лица( в
            сантиметрах)
            <br>
            <br><br>
            <input type="submit" value="Рассчитать">
            <br>
        </form>

        <div>РЕЗУЛЬТАТ </div>

        <?php
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

            echo "Целевой коэффициент:  ";
            $target = round( (($armGreat/$rost ) + ($armMedian/$rost) + ($handFing /$rost)+($faceHalf/$rost ))* 10000);
            echo $target;
            echo "<br>";

            // Сначала проверяем есть ли у нас "звезды"

            echo "<br><br>";
            echo "индекс для запроса ";

            $idForRequest = checkLastTwoDigitsMath($target);
            echo $idForRequest; 

            function checkLastTwoDigitsMath(int $mynumber): int 
            {
            if ($mynumber <= 0) {
                return 5;             
             }
            else if  ($mynumber % 100 === 0) {
                    return 10; 
                } 
            else return findDigitalRoot($mynumber);      
            }

     
            $host = 'localhost'; // Имя хоста (для локальной БД)
            $dbname = 'prophet'; // Имя вашей базы данных
            $username = 'root'; // Имя пользователя БД
            $password = ''; // Пароль пользователя БД (может быть пустым)

            try {
                // Строка DSN (Data Source Name)
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                
                // Опции PDO (например, режим обработки ошибок и режим выборки по умолчанию)
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Бросать исключения при ошибках
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Получать результаты в виде ассоциативных массивов
                    PDO::ATTR_EMULATE_PREPARES   => false,                  // Отключение эмуляции подготовленных запросов
                ];
                
                // Создание объекта PDO, устанавливающего соединение
                $pdo = new PDO($dsn, $username, $password, $options);
                
                echo "✅ Подключение к базе данных успешно установлено!";
                
                // Дальнейшие операции с БД, например, выполнение запросов:
                // $stmt = $pdo->query('SELECT * FROM my_table');
                // while ($row = $stmt->fetch()) {
                //     print_r($row);
                // }

            } catch (PDOException $e) {
                // Обработка ошибок подключения
                die("❌ Ошибка подключения к базе данных: " . $e->getMessage());            }

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
                    echo "<br>";
                    echo $forecastReq["forecast"];
                    #echo "Пользователь: " . $user['name'] . ", Email: " . $user['email'];
                } else {
                    echo "Пользователь не найден.";
                }

                // Чтобы получить все строки:
                // $all_users = $stmt->fetchAll();
                
            } catch (PDOException $e) {
                echo "Ошибка выполнения запроса: " . $e->getMessage();
            }
            #var_dump($forecastReq);

            // По завершении работы соединение автоматически закрывается,
    
            $pdo = null;



            function findDigitalRoot(int $number): int {
                // Преобразуем число в абсолютное значение на случай отрицательных входных данных
                $currentSum = abs($number);
                // Цикл do-while для обеспечения выполнения как минимум одной итерации,
                // а затем повторения, пока результат не станет однозначным числом (< 10).
                do {
                    // Преобразуем текущую сумму в строку для итерации по цифрам
                    $numberString = (string)$currentSum;
                    $tempSum = 0;
                    // Суммируем цифры текущего числа/суммы
                    for ($i = 0; $i < strlen($numberString); $i++) {
                        // Приводим символ-цифру к целому числу и добавляем к временной сумме
                        $tempSum += (int)$numberString[$i];
                    }
                    // Обновляем текущую сумму для следующей итерации цикла (если потребуется)
                    $currentSum = $tempSum;

                } while ($currentSum >= 10); // Повторяем, если сумма всё ещё не однозначное число

                return $currentSum;
            }





            ?>



    </div>














</body>

</html>