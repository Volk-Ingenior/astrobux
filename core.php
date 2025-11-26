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



?>