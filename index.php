<?php
$users = [
  ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
  ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
  ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
  ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
];
$users =[];
function getSortedNames($arr){
  // $res = [];
  foreach ($arr as ['name' => $name]) {
    $res[] = $name;
  }
  if (!empty($res)){
    sort($res);
  }
  return $res;
}
print_r(getSortedNames($users));
// print_r(getSortedNames($users));
