<?php
require_once 'functions.php';
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');
$days = rand(-3, 3);
$task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
$current_ts = strtotime('now midnight'); // текущая метка времени

// запишите сюда дату выполнения задачи в формате дд.мм.гггг
$date_deadline = date("d.m.Y", $task_deadline_ts);

// в эту переменную запишите кол-во дней до даты задачи
define("SECONDS_IN_DAY", 60*60*24);
$days_until_deadline = ($task_deadline_ts - $current_ts)/SECONDS_IN_DAY;

// Задание с массивами

$categories = [
    0 =>"Все",
    1 => "Входящие",
    2 => "Учеба",
    3 => "Работа",
    4 => "Домашние дела",
    5 => "Авто"
];

$categoryKey = isset( $_GET[ 'category' ] ) ? $_GET[ 'category' ] : null;

$tasks = array(
    array(
        "title" => "Собеседование в IT компании",
        "date" => "01.06.2018",
        "category" => 3,
        "fulfilled" => "Нет",
    ),
    array(
        "title" => "Выполнить тестовое задание",
        "date" => "25.05.2018",
        "category" => 3,
        "fulfilled" => "Нет",
    ),
    array(
        "title" => "Сделать задание первого раздела",
        "date" => "21.04.2018",
        "category" => 2,
        "fulfilled" => "Да",
    ),
    array(
        "title" => "Встреча с другом",
        "date" => "22.04.2018",
        "category" => 1,
        "fulfilled" => "Нет",
    ),
    array(
        "title" => "Купить корм для кота",
        "date" => "Нет",
        "category" => 4,
        "fulfilled" => "Нет",
    ),
    array(
        "title" => "Заказать пиццу",
        "date" => "Нет",
        "category" => 4,
        "fulfilled" => "Нет",
    ));

$filteredTasks = $tasks;
if ( $categoryKey !== null )
{
    if ( ! isset( $categories[ $categoryKey ] ) )
    {
        header( 'HTTP/1.1 404 Not Found' );
        die( 'Категория не найдена' );
    }
    $filteredTasks = filterTasksByCategory( $categoryKey, $tasks );
}

$content = renderTemplate( 'templates/main.php', array('show_complete_tasks' => $show_complete_tasks, 'tasks' => $filteredTasks, 'categories' => $categories) );
echo renderTemplate( 'templates/layout.php', array(
        'title' => 'Дела в порядке',
        'categories' => $categories,
        'tasks' => $tasks,
        'content' => $content,
        'categoryKey' => $categoryKey
    )
);