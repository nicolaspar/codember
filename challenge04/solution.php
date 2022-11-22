<?php

$from = 11098;
$to = 98123;
$results = [];
foreach(range($from, $to) as $password) {
    if(substr_count($password, 5) >= 2 ) {
        $numbers = str_split($password);
        for ($i = 1; $i < count($numbers); ++$i) {
            if($numbers[$i-1]>$numbers[$i]) {
                continue 2;
            }
        }
        $results[] = $password;
    }
}

echo 'submit '.count($results).'-'.$results[55];