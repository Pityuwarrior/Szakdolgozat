<?php
if (isset($_GET['lang'])) {
    $pa_lang = $_GET['lang'];
    setcookie('co_lang', $pa_lang, strtotime('next year'));
}
$temp_lang = $pa_lang ?? $_COOKIE['co_lang'] ?? null;
switch ($temp_lang) {
    case "hu":
    case "en":
        $lang = $temp_lang;break;
    default:
        $lang = "hu";
}
