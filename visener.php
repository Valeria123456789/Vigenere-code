<?php
    $dic2 = array(0 => 'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    
    function resize_key($text, $key){   //Растягиваем ключ до длины сообщения
        $len1 = strlen($text);
        $len2 = strlen($key);
        $result = '';
        $count_words = floor($len1/$len2); //Сколько полных слов нужно
        $count_letters = ($len1 % $len2);  //Сколько отдельных букв нужно
        for ($i = 0; $i < $count_words; $i++){ 
            $result .= $key;
        }
        $result .= substr($key, 0, $count_letters);
        return $result;
    }
    
    function shift_encode($text, $key, $mas){
        $result = '';
        for ($i = 0; $i < strlen($text); $i++){
            for ($j = 0; $j < count($mas); $j++){
                if ($key[$i] == $mas[$j]){
                    $shift = $j;
                break;
                }
            }
            for ($j = 0; $j < count($mas); $j++){
                if ($text[$i] == $mas[$j]){
                    $letter = $j;
                break;
                }
            }
            $total = $letter + $shift;
            if ($total > count($mas)){
                $total = $total - (count($mas) - 1);
            }
            $result .= $mas[$total];
        }
        return $result;
    }
    
    function shift_decode($text, $key, $mas){
        $result = '';
        for ($i = 0; $i < strlen($text); $i++){
            for ($j = 0; $j < count($mas); $j++){
                if ($key[$i] == $mas[$j]){
                    $shift = $j;
                break;
                }
            }
            for ($j = 0; $j < count($mas); $j++){
                if ($text[$i] == $mas[$j]){
                    $letter = $j;
                break;
                }
            }
            $total = $letter - $shift;
            if ($total < 0){
                $total = (count($mas) - 1) - abs($total);
            }
            $result .= $mas[$total];
        }
        return $result;
    }