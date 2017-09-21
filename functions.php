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

    function countTasksByCategory($category, $tasks) {
        $num = 0;
        foreach ( $tasks as $task )
            if ($task['category'] == $category) {
                $num++;
            }
        if ($category == "Все") {
            $num++;
        }
        return $num;
    }
?>