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

?>