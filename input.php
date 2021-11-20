<?php
 if (isset($_POST['encode'])){
        $selected2 = 'checked';
        $original = mb_strtolower(str_replace(" ", "", $_POST['original_text'])); //Сразу удаляем все пробелы из строки
        $key = resize_key($original, mb_strtolower($_POST['key_text']));
        $modify = shift_encode($original, $key, $dic2);             
    }
elseif (isset($_POST['decode'])){ 
        $selected2 = 'checked';
        $original = mb_strtolower(str_replace(" ", "", $_POST['original_text']));
        $key = resize_key($original, mb_strtolower($_POST['key_text']));
        $modify = shift_decode($original, $key, $dic2);
    }
?>