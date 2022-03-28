<?php
require_once "./back/database.php";
/*
function Jelszo($nev, $pw)
{
    $sql="SELECT * FROM keses_admin
        WHERE uNev = ? ";
    $e = connect()->prepare($sql);
    $e->execute([$nev]);
    $result = $e->fetch(PDO::FETCH_ASSOC);
    if (isset($result['pw'])) 
    {
        return password_verify($pw, $result['pw']) ?$result["uID"]: false;
    }
    return false;
}
function userinfo()
{
    global $belepve;
    global $nev;
    if(!$belepve)
    {
        return null;
    }
    $sql="SELECT * FROM keses_admin
        WHERE uID = ? ";
    $e = connect()->prepare($sql);
    $e->execute([$nev]);
    $result = $e->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function tanulokeses()
{
    $sql = <<<SQL
    SELECT 
    t.nev as tanulonev, 
    o.nev as osztalynev,
    (SELECT 
        COUNT(ke.igazolt) 
        FROM keses ke 
        WHERE ke.igazolt = 1 
        AND ke.tanuloID = t.id) as igazolt,
    (SELECT
        COUNT(ke.igazolt) 
        FROM keses ke 
        WHERE ke.igazolt = 0 
        AND ke.tanuloID = t.id) as igazolatlan,
    t.id as id
    FROM tanulo t 
    LEFT JOIN keses k ON k.tanuloID = t.id
    LEFT JOIN osztaly o ON t.osztalyID = o.id
    GROUP BY t.id
    HAVING igazolt > 0 OR igazolatlan > 0
    ORDER BY t.nev ASC;
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchAll();
    return $result;
}
function reszletlista($id)
{
    $sql = <<<SQL
    SELECT 
    k.mikor as datum,
    k.igazolt as igazolt,
    m.megj as megjegyzes,
    k.id as id
    FROM keses k 
    LEFT JOIN megjegyzes m ON k.megjID = m.id
    WHERE k.tanuloID = $id ;
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchAll();
    return $result;
}
function reszlet($id)
{
    $sql = <<<SQL
    SELECT 
    t.tanuloazon as tazon,
    t.nev as nev,
    o.nev as onev,
    o.ofo as ofo,
    o.id as osid
    FROM tanulo t
    INNER JOIN osztaly o ON t.osztalyID = o.id
    WHERE t.id = $id ;
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function ossztanulo()
{
    $sql = <<<SQL
    SELECT 
    t.nev as nev,
    t.id as id,
    o.nev as onev
    FROM tanulo t
    INNER JOIN osztaly o ON t.osztalyID = o.id
    ORDER BY t.nev ASC;
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchAll();
    return $result;
}
function megjegyzes()
{
    $sql = <<<SQL
    SELECT 
    id,
    megj
    FROM megjegyzes
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchAll();
    return $result;
}
function osztaly()
{
    $sql = <<<SQL
    SELECT 
    nev,
    id
    FROM osztaly
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchAll();
    return $result;
}
function osztalyok($id)
{
    $sql = <<<SQL
    SELECT 
    nev,
    id,
    ofo
    FROM osztaly
    WHERE id = $id 
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function osztalyoklista($id)
{
    $sql = <<<SQL
    SELECT 
    t.nev as nev,
    t.id as id,
    (SELECT 
        COUNT(ke.igazolt) 
        FROM keses ke 
        WHERE ke.tanuloID = t.id) as ossz
    FROM tanulo t
    LEFT JOIN keses k ON t.id = k.tanuloID
    WHERE t.osztalyID = $id 
    ORDER BY t.nev ASC;
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchAll();
    return $result;
}
/*
funtion ujkeses(){
    $sql = <<<SQL
    INSERT INTO keses(mikor, tanuloID, igazolt, megjID)
    ()
    SQL;
    
}
*/
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
function about_me(){
    $sql = <<<SQL
    SELECT 
    page,
    title
    FROM page
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function menutrans($m){
    global $lang;
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

