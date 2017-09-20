<?php
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

    $categories = ["Все", "Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];

    $tasks = array(
        array(
            "title" => "Собеседование в IT компании",
            "date" => "01.06.2018",
            "category" => "Работа",
            "fulfilled" => "Нет",
        ),
        array(
            "title" => "Выполнить тестовое задание",
            "date" => "25.05.2018",
            "category" => "Работа",
            "fulfilled" => "Нет",
        ),
        array(
            "title" => "Сделать задание первого раздела",
            "date" => "21.04.2018",
            "category" => "Учеба",
            "fulfilled" => "Да",
        ),
        array(
            "title" => "Встреча с другом",
            "date" => "22.04.2018",
            "category" => "Входящие",
            "fulfilled" => "Нет",
        ),
        array(
            "title" => "Купить корм для кота",
            "date" => "Нет",
            "category" => "Домашние дела",
            "fulfilled" => "Нет",
        ),
        array(
            "title" => "Заказать пиццу",
            "date" => "Нет",
            "category" => "Домашние дела",
            "fulfilled" => "Нет",
        ));

    require_once ['functions.php'];
    require_once ['templates/layout.php'];
    renderTemplate( 'templates/layout.php', $data['content'] );
?>