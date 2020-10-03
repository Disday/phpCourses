<?php
    const strings = ['(one) ($%@#$) (value1)', 'test (^,ehu-) ) (t) (//)',
      '2383', '()', '() ('];
      // $pattern = '/^\w+@[a-zA-Z]{3,}\.[a-zA-Z]{2,5}$/';
      $pattern = '/\(.+\)/';
  print_r(preg_grep($pattern, strings));