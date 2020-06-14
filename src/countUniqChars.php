<?php
function countUniqChars($str)
{
    $str = str_split($str);
    $uniq = [];
    foreach ($str as $char) {
        if (!in_array($char, $uniq) && $char !== '') {
            $uniq[] = $char;
        }
    }
    return count($uniq);
}

$text1 = 'yyab';
// echo countUniqChars($text1); // 3

$text2 = 'You know nothing Jon Snow';
// echo countUniqChars($text2); // 13

$text3 = '';
echo countUniqChars($text3); // 0