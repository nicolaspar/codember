<?php

$input = file_get_contents('https://codember.dev/users.txt');

$key = '

';
$users = explode($key, $input);

$user_data = [
    0 => 'usr:',
    1 => 'eme:',
    2 => 'psw:',
    3 => 'age:',
    4 => 'loc:',
    5 => 'fll:',
];

$good = [];
$wrong = [];
$last_user = '';
foreach ($users as $user) {
    foreach ($user_data as $k => $data) {
        $pattern = '/(' . $data . ')\s*(?:"([^"]*)"|(\S+))/';
        $result = [];
        if (!preg_match_all($pattern, $user, $result)) {
            $wrong[] = $user;
            continue 2;
        }
    }
    $good[] = $user;
}
//last_user
foreach ($user_data as $k => $data) {
    $pattern = '/(' . $data . ')\s*(?:"([^"]*)"|(\S+))/';
    $result = [];
    if ($data == $user_data[0]) {
        if (preg_match_all($pattern, end($good), $result)) {
            $last_user = $result[3][0] ?? '';
        }
    }
}

$total = count($good);
var_dump( 'submit ' . $total . $last_user );

























