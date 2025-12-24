<?php
/*Функция определения текущей даты*/ 
function getDayOfYear_simple(string $dateString): int|false {
    $timestamp = strtotime($dateString);

    if ($timestamp === false) {
        return false;
    }
    $dayOfYear_zeroBased = date('z', $timestamp);    
    return (int)$dayOfYear_zeroBased + 1;
}
/*Функция определения  дня недели*/ 

function getToday(): string{
    $timestamp = time();
    $day_number = date('N', $timestamp);
    $days_of_week = array( 1 => 'Понедельник',  2 => 'Вторник',   3 => 'Среда',   4 => 'Четверг',   5 => 'Пятница',   6 => 'Суббота',   7 => 'Воскресенье');
    return $days_of_week[$day_number];
}

function checkLastTwoDigitsMath(int $mynumber): int  {
     if ($mynumber <= 0) {
       return 5;             
                }
                else if  ($mynumber % 100 === 0) {
                        return 10; 
                    } 
                else return findDigitalRoot($mynumber);      
 }

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

function db_connect(){
    $host = 'localhost'; // Имя хоста (для локальной БД)
    $dbname = 'prophet'; // Имя вашей базы данных
    $username = 'root'; // Имя пользователя БД
    $password = '105106'; // Пароль пользователя БД (может быть пустым)

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
                
        //echo "✅ Подключение к базе данных успешно установлено!";
        return $pdo; 
        } 
        catch (PDOException $e) {
            // Обработка ошибок подключения
            die("❌ Ошибка подключения к базе данных: " . $e->getMessage()); 
             }
}


/*Функция определения фазы луны*/ 
function getMoonPhase() { 
    
   $aktualDayId = (getDayOfYear_simple('now'));      
    try {
        $pdo = db_connect();
        $stmt = $pdo->prepare("SELECT phaseId FROM moon WHERE id = ?");        
        $stmt->execute([$aktualDayId]);
        $moonPhase= $stmt->fetch(); 
     
        if ($moonPhase) {
                $Phase =  $moonPhase["phaseId"];
             } 
        else {
                echo "No data";
                $Phase=0;
                }     
            } catch (PDOException $e) {
                echo "Ошибка выполнения запроса: " . $e->getMessage();
            }            
    $pdo = null;

        switch ($Phase) {
            case 1:
                return  ["1new", "Фаза 1", "Новолуние"];
                break;
            case 2:
                return  ["2growserp", "Фаза 2", "Растущий серп"];
                break;
            case 3:
                return ["3firstquater" , "Фаза 3", "Первая четверть"];
                break;
            case 4:
                return  ["4growmoon", "Фаза 4", "Растущая луна"];
                break;     
            case 5:
                return ["5fullmoon" , "Фаза 5", "Полнолуние"];
                break;
            case 6:
                return ["6weakmoon" , "Фаза 6", "Убывающая луна"];
                break;
            case 7:
                return  ["7lastquater", "Фаза 7", "Последняя четверть"];
                break;
            case 8:
                return  ["8weakserp", "Фаза 8", "Убывающий серп"];
                break;

            default:
                return  ["No data", "No data", "No data"];
                // Код, если значение не совпало ни с одним кейсом
                break;
                }
}


function geomag()  {
      $aktualDayId = (getDayOfYear_simple('now'));      
    try {
        $pdo = db_connect();
        $stmt = $pdo->prepare("SELECT indexgeo FROM geomag WHERE id = ?");        
        $stmt->execute([$aktualDayId]);
        $indexGeo= $stmt->fetch(); 
     
        if ($indexGeo) {
                $ind =  $indexGeo["indexgeo"];
             } 
        else {
                echo "No data";
                $ind=0;
                }     
            } catch (PDOException $e) {
                echo "Ошибка выполнения запроса: " . $e->getMessage();
            }            
        $pdo = null;

 switch ($ind) {
            case 1:
                return  ["1", "Спокойно"];
                break;
            case 2:
                return ["2", "Спокойно"];
                break;
            case 3:
                return ["3", "Слабовозмущённо"];
                break;
            case 4:
                return  ["4", "Возмущённо"];
                break;     
            case 5:
                return ["5", "Слабая магнитная буря (G1)"];
                break;
            case 6:
                return ["6", "Умеренная буря (G2)"];
                break;
            case 7:
                return  ["7", "Сильная  буря (G3)"];
                break;
            case 8:
                return  ["8", "Очень сильная буря (G4)"];
                break;
            case 9:
                return  ["9", "Экстремальная буря (G5)"];
                break;

            default:
                return  ["No data", "No data"];
                // Код, если значение не совпало ни с одним кейсом
                break;
                }
}




?>