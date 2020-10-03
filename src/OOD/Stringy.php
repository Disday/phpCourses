<?php
require __DIR__ . '/../../vendor/autoload.php';

use Stringy\Stringy as S;
function getQuestions($text){
  $explodedToArray =  S::create($text)->lines();
      $filtred = array_filter($explodedToArray, function($char){
        return $char->endsWith('?');
      });

  return implode("\n", $filtred);
}

$text = <<<HEREDOC
lala\r\nr
ehu?
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
HEREDOC;

$result = getQuestions($text); // "ehu?\none two?"
echo $result;
// echo $result, '\n';
// print_r($result);
// ehu?
// one two?