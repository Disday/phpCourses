<?php
function buildDefinitionList($defs)
{
  if (empty($defs)){
    return '';
  }
  $result = array_map(function ($elem) use ($defs) {
    return "<dt>{$elem[0]}</dt><dd>{$elem[1]}</dd>";
  }, $defs);
  return '<dl>' . implode('', $result) . '</dl>';
}


$definitions = [
  ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
  ['Бобр', 'Животное из отряда грызунов'],
];
print_r(buildDefinitionList($definitions));
// => '<dl><dt>Блямба</dt><dd>Выпуклость, утолщение на поверхности чего-либо</dd><dt>Бобр</dt><dd>Животное из отряда грызунов</dd></dl>';
