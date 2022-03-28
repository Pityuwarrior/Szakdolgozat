<?php
$regx = "/###([a-z.]+)###/";
function wraptrans($m)
{
    return "###$m###";
}
function extractkeys($m)
{
    global $regx;
    preg_match_all($regx, $m, $menutext);
    return array_map(fn ($k) => preg_replace($regx, '$1', $k), $menutext[1]);
}
function maptrans($menutrans)
{
    $translations = [];
    foreach ($menutrans as $value) {
        $translations[$value['text_key']] = $value['text_lang'];
    }
    return $translations;
}
function finaltrans($m, $n)
{
    global $regx;
    return preg_replace_callback(
        $regx,
        fn ($matches) => $n[$matches[1]]?? $matches[0],
        $m
    );
}
