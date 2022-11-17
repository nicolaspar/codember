<?php

$input = file_get_contents('https://codember.dev/encrypted.txt');

$ascii = [];
foreach ( range('a', 'z') as $character) {
    $ascii[] = ord($character);
}

$words = explode(' ', $input);

$new_words = '';
foreach ($words as $word) {
    resolveWord($ascii, $word, $new_words);
    $new_words .= ' ';
}

function resolveWord($ascii, &$word, &$new_words)
{
    foreach ($ascii as $c=>$code) {
        if (substr($word, 0, strlen($code)) == $code) {
            $new_words .= chr($code);
            $word = substr($word, strlen($code));
            resolveWord($ascii, $word, $new_words);
        }
    }
}

var_dump('submit '.trim($new_words));
























