<?php
$regx = "/###([a-z._]+)###/";
// A kapott string értékét kiegészíti #-el, az adatbekéréshez. 
function wraptrans($m)
{
    return "###$m###";
}
// Egy string megkapja az oldal teljes kódját, majd a fordítási kulcsokat megtisztítja a #-től, majd vissza adja tömbként.
function extractkeys($m)
{
    global $regx;
    //Kiválogatja a fordítási kulcsokat.
    preg_match_all($regx, $m, $menutext);
    //Fordítási kulcsokat megtisztítja a #-től.
    return array_map(fn ($k) => preg_replace($regx, '$1', $k), $menutext[1]);
}
// A tömből egy visszatérési értékének rekord készül. 
function maptrans($pagetrans)
{
    $translations = [];
    foreach ($pagetrans as $value) {
        $translations[$value['text_key']] = $value['text_lang'];
    }
    return $translations;
}
// $m = weboldal kód, $n = maptrans return értéke.
function finaltrans($m, $n)
{
    global $regx;
    // Megvizsgálja az oldal kódját, majd a match-elt értékeket általakítja az adott nyelven beállított rekordban levő értékkel, ha nem match-el akkor vissza adja a $m-t.
    return preg_replace_callback(
        $regx,
        fn ($matches) => $n[$matches[1]]?? $matches[0],
        $m
    );
}
