<?php
function renderTemplate($path, $data) {
    if (!file_exists( $path )) {
        return '';
    }
    ob_start ();
    extract( $data ); //далее у меня доступна переменная $content;
    require $path; //$content также доступен внутри $path - файла шаблона
    return ob_get_clean(); //вернули строчку с шаблоном
}

function countTasksByCategory($categoryKey, $tasks) {
    $num = 0;
    foreach ( $tasks as $task )
    {
        if ( $categoryKey == 0 )
        {
            $num++;
            continue;
        }

        if ( $task[ 'category' ] == $categoryKey )
        {
            $num++;
        }
    }

    return $num;
}

/**
 * @param int $categoryKey
 * @param array $tasks
 * @return array
 */
function filterTasksByCategory( $categoryKey, $tasks )
{
    if ( $categoryKey == 0 )
    {
        return $tasks;
    }

    $result = [];

    foreach ( $tasks as $task )
    {
        if ( $task['category'] == $categoryKey )
        {
            $result[] = $task;
        }
    }

    return $result;
}
?>