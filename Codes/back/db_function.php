<?php
require_once "./back/database.php";
//menü adatai lekérése adatbázisból.
function menu(){
    $sql = <<<SQL
    SELECT 
    text_key,
    link
    FROM menu
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchAll();
    return $result;
}
//page adatai lekérése adatbázisból.
function page($page){
    $sql = <<<SQL
    SELECT 
    title
    FROM page
    where page = ?;
    SQL;
    $e = connect ()->prepare($sql);
    $e->execute([$page]);
    $result = $e->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//A kulcshoz lekérdezi a szöveget az adatbázisból az aktuális nyelven. 
function pagetrans($m){
    global $lang;
    //A dinamikus elemek lekéréséhez kérdő jeleké alakítja az aktuális tömb értékeit. 
    $qmarks = implode(', ', array_map(fn() => '?', $m));  
    $sql = <<<SQL
    SELECT 
    text_key,
    text_$lang as text_lang
    FROM text
    WHERE text_key IN ($qmarks);
    SQL;
    $e = connect ()->prepare($sql);
    $e->execute($m);
    $result = $e->fetchAll();
    return $result;
}

