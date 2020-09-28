<?php

$str = 'Something to bear in mind is that regex is actually a declarative programming language like prolog : your regex is a set of rules which the regex interpreter tries to match against a string.   During this matching, the interpreter will assume certain things, and continue assuming them until it comes up against a failure to match, which then causes it to backtrack.  Regex assumes "greedy matching" unless explicitly told not to, which can cause a lot of backtracking.  A general rule of thumb is that the more backtracking, the slower the matching process';
$pattern = "/in[dg]/";
print_r(preg_filter($pattern, 'HERE', $str));

