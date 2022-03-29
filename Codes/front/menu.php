<?php
$page = "about_me";
if(isset($_GET['menu']))
{
    if(preg_match("/^\w+$/", $_GET['menu'], $menuitem))
    {
        [$page] = $menuitem;
    }
}
$content = "./front/pages/$page.php";
$p = page($page);
$title = wraptrans($p["title"]);
?>